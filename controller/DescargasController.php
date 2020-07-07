<?php
class DescargasController
{
    private $renderer;
    private $usuarioModel;
    private $tcpdf;
    private $notaModel;
    private $publicacionModel;
    private $seccionModel;
    private $revistaModel;
    private $sucripcionModel;
    private $comprasModel;

    private $data;

    public function __construct($tcpdf, $usuarioModel, $notaModel, $seccionModel, $revistaModel, $publicacionModel, $suscripcionModel, $comprasModel, $renderer)
    {
        ValidateSession::validarSesionAdministrador();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->tcpdf = $tcpdf;

        $this->usuarioModel = $usuarioModel;

        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->revistaModel = $revistaModel;
        $this->publicacionModel = $publicacionModel;
        $this->suscripcionModel = $suscripcionModel;
        $this->comprasModel = $comprasModel;
    }

    public function index()
    {
        echo $this->renderer->render("view/administradorViews/descargasPDFView.php", $this->data);
    }

    public function contenidistas()
    {
        $this->data['contenidistas'] = $this->usuarioModel->obtenerUsuariosContenidistas();
        $date =  date('d-m-Y');
        // Quitar header y footer por defecto
        $this->tcpdf->setPrintHeader(false);
        $this->tcpdf->setPrintFooter(false);
        // Añanir pagina
        $this->tcpdf->AddPage();
        $html =
            "<style>
                     th, td{
                        border: 1px solid black;

                    }
                    table tr th{
                        background-color: #1e67a8;
                        color: #FFF;
                    }
                </style>
                <h1>Reporte <small>$date</small></h1>
                <h2>Contenidistas</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>";
        foreach ($this->data['contenidistas'] as $contenidista) {
            $html .= "<tr>
            <td>{$contenidista['apellido']} </td>
            <td>{$contenidista['nombre']}</td>
            <td>{$contenidista['email']}</td>
            <td>{$contenidista['direccion']}</td>
            <td>{$contenidista['telefono']}</td>

        </tr>";
        }
        $html .= "</tbody>
        </table>";
        $this->tcpdf->writeHTMLCell(0, 0, '', '', $html, 0, 0);
        $this->tcpdf->Output();
    }

    public function clientes()
    {
        $usuarios = $this->usuarioModel->obtenerUsuariosLectores();
        foreach ($usuarios as $usuario) {
            $usuarios_suscr[$usuario['id']]['usuario'] = $usuario;
            $usuarios_suscr[$usuario['id']]['suscripciones'] = $this->suscripcionModel->revistasALasQueEstaSuscrito($usuario['id']);
            $usuarios_suscr[$usuario['id']]['compras'] = $this->comprasModel->obtenerComprasDelUsuario($usuario['id']);
        }

        $date =  date('d-m-Y');
        // Quitar header y footer por defecto
        $this->tcpdf->setPrintHeader(false);
        $this->tcpdf->setPrintFooter(false);
        // set margins
        $this->tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // Añanir pagina
        $this->tcpdf->AddPage();
        $html =
            "<style>
                     th, td{
                        border: 1px solid black;

                    }
                    table tr th{
                        background-color: #1e67a8;
                        color: #FFF;
                    }
                    body{
                        background-color:#d8d8d8;
                    }
                    h1{
                        background-color:#DDD;
                    }

                    h2{
                        background-color:#f44336;
                    }

                </style>
                <body>
                <h1>Reporte <small>$date</small></h1>
                <h2>Productos de usuarios</h2>
            ";
        foreach ($usuarios_suscr as $usuario_suscr) {

            $cliente = str_pad($usuario_suscr['usuario']['id'], 10, "0", STR_PAD_LEFT);
            $html .= "<h3>Cliente nro: $cliente</h3><p><b>Apellido y nombre:</b> {$usuario_suscr['usuario']['apellido']}, {$usuario_suscr['usuario']['nombre']} </p>
            <p><b>Email:</b> {$usuario_suscr['usuario']['email']}</p>
            <p><b>Domicilio:</b> {$usuario_suscr['usuario']['direccion']}</p>
            <p><b>Telefono:</b> {$usuario_suscr['usuario']['telefono']}</p>
            ";
            $html .= "<h3>Suscripciones</h3>";
            $table = "<table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            foreach ($usuario_suscr['suscripciones'] as $suscripcion) {
                $table .= "
                    <tr>
                        <td>{$suscripcion['nombre_revista']}</td>
                        <td>{$suscripcion['precio_suscripcion_mensual']}</td>
                        <td>{$suscripcion['fecha_inicio']}</td>
                        <td>{$suscripcion['fecha_fin']}</td>
                    </tr>
                ";
            }
            $table .= "</tbody> </table>";
            $html .= "$table";

            $html .= "<h3>Compras</h3>";
            $table = "<table>
                        <thead>
                            <tr>
                                <th>Revista</th>
                                <th>Nro Publicacion</th>
                                <th>Fecha</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            foreach ($usuario_suscr['compras'] as $compra) {
                $table .= "
                    <tr>
                        <td>{$compra['nombre_revista']}</td>
                        <td>{$compra['nombre_publicacion']}</td>
                        <td>{$compra['precio_publicacion']}</td>
                        <td>{$compra['fecha_publicacion']}</td>
                    </tr>
                ";
            }
            $table .= "</tbody> </table>";
            $html .= "$table";
            $html .= "<br>";
        }
        $html .= "</body>";
        $this->tcpdf->writeHTMLCell(0, 0, '', '', $html, 0, 0);
        $this->tcpdf->Output();
    }

    public function productos()
    {
        $revistas = $this->revistaModel->obtenerRevistas();
        foreach ($revistas as $revista) {
            $revistas_reporte[$revista['id']]['revista'] = $revista;
            $revistas_reporte[$revista['id']]['ediciones'] = $this->revistaModel->obtenerCantidadEdicionesPorRevista($revista['id']);
            $revistas_reporte[$revista['id']]['suscripciones'] = $this->suscripcionModel->obtenerCantidadSuscripcionesPorRevista($revista['id']);
            $revistas_reporte[$revista['id']]['compras'] = $this->comprasModel->obtenerCantidadComprasPorRevista($revista['id']);
        }
        $date =  date('d-m-Y');
        // Quitar header y footer por defecto
        $this->tcpdf->setPrintHeader(false);
        $this->tcpdf->setPrintFooter(false);
        // Añanir pagina
        $this->tcpdf->AddPage();
        $html =
            "<style>
                     th, td{
                        border: 1px solid black;

                    }
                    table tr th{
                        background-color: #1e67a8;
                        color: #FFF;
                    }

                </style>
                <h1>Reporte <small>$date</small></h1>
                <h2>Productos</h2>
                    ";

        foreach ($revistas_reporte as $revista) {

            $html .= "<h3 >Revista: {$revista['revista']['nombre']}</h3>
                       
                        ";
            foreach($revista['suscripciones'] as $suscripciones){
                $html .= "<p><b>Suscripciones:</b> {$suscripciones['suscripciones']} </p>";
            }
            foreach($revista['ediciones'] as $ediciones){
                $html .= "<p><b>Ediciones:</b> {$ediciones['ediciones']} </p>";
            }
            $html .= "<h3>Compras</h3>";
            $table = "<table>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        ";
            foreach ($revista['compras'] as $compra) {
                $table .= "
                                <tr>
                                    <td>{$compra['nombre']}</td>
                                    <td>{$compra['compras']}</td>
                                </tr>
                            ";
            }
            $table .= "</tbody> </table>";
            $html .= "$table";

            
        }
        $html .= "</body>";

        $this->tcpdf->writeHTMLCell(0, 0, '', '', $html, 0, 0);
        $this->tcpdf->Output();
    }

    // "SELECT nr.id as id_publicacion, re.nombre as nombre_revista, nr.nombre as nombre_publicacion, 
    //                                         nr.precio as precio_publicacion, nr.fecha_publicacion as fecha_publicacion

    public function modelSideBar(&$refArrayData)
    {
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}

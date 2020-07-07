{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}

    <div id="blog" class="blog col-md-9">

        <div class="section-title">
            <h2>Ventas y Suscripciones</h2>
            <p></p>
        </div>

        <div>

            <!--Load the AJAX API-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(graficoCantidadComprasPorMes);
                google.charts.setOnLoadCallback(graficoCantidadSuscripcionesPorMes);


                function graficoCantidadComprasPorMes() {
                    var data = google.visualization.arrayToDataTable([
                    ['Mes', 'Cantidad'],
                    {{#compras}}
                        ['{{mes}}', {{cantidad}}],
                    {{/compras}}  
                    ]);

                    var options = {
                    title: 'Ventas por mes en el 2020',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('compras'));

                    chart.draw(data, options);
                }
                function graficoCantidadSuscripcionesPorMes() {
                    var data = google.visualization.arrayToDataTable([
                    ['Mes', 'Cantidad'],
                    {{#suscripciones}}
                        ['{{mes}}', {{cantidad}}],
                    {{/suscripciones}}  
                    ]);

                    var options = {
                    title: 'Suscripciones por mes en el 2020',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('suscripciones'));

                    chart.draw(data, options);
                }

                
            </script>


           <div class="row">
                <!--Div that will hold the pie chart-->
                <div id="compras" class="col-6"></div>
    
                <!--Div that will hold the pie chart-->
                <div id="suscripciones" class="col-6"></div>

           </div>
        </div>


    </div>
</div>
{{> footer}}
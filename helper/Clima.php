<?php

class Clima {
    private $config;
    //private $apikey = "I0t0f6dTgRlfJzCeIK0Ts0IR8AN4r6KG";
    //private $apikey = "4dQbtVBqXnMruaDAA5gQZMZzRsR2dLYg";
    private $apikey; // = "qszJ76JUiTHBYAQxNxnMPJfM5P1kTWuD";

    private $ip;
    private $location_key;
    private $location_name;
    private $pronosticoDiario;
    private $climaActual;

    public function __construct() {
        $this->config = new Config("config/clima.ini");
        $rand_key = "apikey" . rand(1, 3);
        $this->apikey = $this->config->get("clima", $rand_key);

        $salida = self::getLocationFromCoords();
        $this->location_key = $salida["key"];
        $this->location_name = $salida["name"];

        $this->pronosticoDiario = self::getPronosticoDiario($this->location_key);
        $this->climaActual = self::getClimaActual($this->location_key);
    }

    private function getIpAddess() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP'); else if (getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR'); else if (getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED'); else if (getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR'); else if (getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED'); else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR'); else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    private function getLocationFromIp($ip) {
        // Si se trata del localhost, devuelvo la key de Bs. As. por default
        if ($ip == "127.0.0.1" or "::1") //es localhost
        {
            $salida["key"] = "7894";
            $salida["name"] = "Buenos Aires";
            return $salida;
        }

        // En un ambiente productivo, el servidor apache va a obtener la IP verdadera del cliente

        // Seteo URL para llamar a la API
        $url = "http://dataservice.accuweather.com/locations/v1/cities/ipaddress";

        // Seteo array Data con los parámetros de la API
        $data = array("apikey" => $this->apikey, "q" => $this->ip, "language" => "es");

        // Llamo a la API para obtener el location key
        $resultado = self::CallAPI("GET", $url, $data);

        // Transformo respuesta de JSON a un array
        $response = json_decode($resultado, TRUE);

        // Devuelvo de la respuesta la clave de la ubicación y el Nombre
        $salida["key"] = $response["Key"];
        $salida["name"] = $response["LocalizedName"];

        return $salida;
    }

    private function CallAPI($method, $url, $data = false) {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data) curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    private function getPronosticoDiario($location_key) {
        // Armo URL para obtener pronostico
        $url = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/" . $location_key;

        // Cargo parametros en la estructura Data
        $data = array("apikey" => $this->apikey, "detail" => "true", "language" => "es", "metric" => "true");

        // Llamo a la API
        $resultado = self::CallAPI("GET", $url, $data);

        // Transformo resultado de JSON a un array
        $response = json_decode($resultado, TRUE);

        return $response;
    }

    private function getClimaActual($location_key) {
        // Armo URL para obtener pronostico
        $url = "http://dataservice.accuweather.com/currentconditions/v1/" . $location_key;

        // Cargo parametros en la estructura Data
        $data = array("apikey" => $this->apikey, "detail" => "true", "language" => "es");

        // Llamo a la API
        $resultado = self::CallAPI("GET", $url, $data);

        // Transformo resultado de JSON a un array
        $response = json_decode($resultado, TRUE);

        return $response;
    }

    public function getClimaActualResumido() {
        $descripcion = $this->climaActual[0]["WeatherText"];

        $icono = "https://developer.accuweather.com/sites/default/files/" . str_pad($this->climaActual[0]["WeatherIcon"], 2, "0", STR_PAD_LEFT) . "-s.png";

        $temperatura = $this->climaActual[0]["Temperature"]["Metric"]["Value"] . " °C";

        $resultado = array("ubicacion" => $this->location_name, "descripcion" => $descripcion, "temperatura" => $temperatura, "icono" => $icono);
        return $resultado;

    }

    private function getLocationFromCoords() {
        $lat = $_SESSION["latitud"];
        $long = $_SESSION["longitud"];

        $q = $lat . "," . $long;

        // Seteo URL para llamar a la API
        $url = "http://dataservice.accuweather.com/locations/v1/cities/geoposition/search";

        // Seteo array Data con los parámetros de la API
        $data = array("apikey" => $this->apikey, "q" => $q, "language" => "es", "details" => "true", "toplevel" => "true");

        // Llamo a la API para obtener el location key
        $resultado = self::CallAPI("GET", $url, $data);

        // Transformo respuesta de JSON a un array
        $response = json_decode($resultado, TRUE);

        // Devuelvo de la respuesta la clave de la ubicación y el Nombre
        $salida["key"] = $response["Key"];
        $salida["name"] = $response["LocalizedName"];

        return $salida;

    }

}
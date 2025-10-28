<?php
if (!function_exists('llamarJson')) {
    function llamarJson()
    {

        $ruta_archivo = "data.json";
        $json_string = file_get_contents($ruta_archivo);
        $datos_json = json_decode($json_string, true);

        return $datos_json;
    }
}

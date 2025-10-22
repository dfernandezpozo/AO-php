<?php

require "utilities.php";

function removeTasks()
{

    echo "¿Deseas borrar alguna tarea?" . "\n";
    $verify = trim(fgets(STDIN));

    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Escriba el id que desea borrar: ";

        $eleccion = trim(fgets(STDIN));

        foreach ($datos_json[0] as $index => $tasks) {

            if ($tasks["id"] === $eleccion) {

                unset($datos_json[0][$index]);

                break;
            }
        }
        $datos_json = array_values($datos_json);
        file_put_contents('data.json', json_encode($datos_json, JSON_PRETTY_PRINT));
        echo ("Tarea borrada correctamente:\n");
        print_r($datos_json);
    } else {
        echo "No deseas borrar nada , volviendo al menu....";
    }
}

removeTasks();

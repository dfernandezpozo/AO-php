<?php

require "utilities.php";

function taskFinished()
{

    echo "¿Deseas marcar como completada/no completada alguna tarea? " . "\n";
    $verify = trim(fgets(STDIN));

    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Escriba el id de la tarea que desea marcar:" . "\n";
        $eleccion = trim(fgets(STDIN));

        $encontrado = false;

        foreach ($datos_json["tasks"] as $index => $tasks) {

            if ((string)$tasks["id"] === $eleccion) {
                $encontrado = true;

                if ($tasks["completed"] === false) {
                    echo "Tarea no completada, ¿deseas completarla? (si/no): ";
                    $respuesta = trim(fgets(STDIN));

                    if ($respuesta === "si") {

                        $datos_json["tasks"][$index]["completed"] = true;
                        echo "Tarea completada\n";


                        file_put_contents("data.json", json_encode($datos_json, JSON_PRETTY_PRINT));
                    } else {
                        echo "No se ha realizado ningún cambio\n";
                    }
                } else {

                    echo "Esa tarea ya está completada.\n";
                }


                break;
            }
        }

        if (!$encontrado) {
            echo "No se encontró ninguna tarea con ese ID.\n";
        }
    } else {
        echo "Nada marcado, volviendo al menú....\n";
    }
}

taskFinished();

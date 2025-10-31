<?php

// Función que permite al usuario borrar una tarea
// mediante su ID

function removeTasks()
{

    echo "¿Deseas borrar alguna tarea? (si/no)" . "\n";
    $verify = trim(fgets(STDIN));

    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Escriba el id que desea borrar: ";

        $eleccion = trim(fgets(STDIN));

        foreach ($datos_json["tasks"] as $index => $tasks) {

            if ($tasks["id"] === $eleccion) {

                unset($datos_json["tasks"][$index]);

                break;
            }
        }
        $datos_json["tasks"] = array_values($datos_json["tasks"]);
        file_put_contents('data.json', json_encode($datos_json, JSON_PRETTY_PRINT));
        echo ("Tarea borrada correctamente:\n");
        print_r($datos_json);
    } else {
        echo "No deseas borrar nada";
    }
}


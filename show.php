<?php

// Función que enseña todas las tareas que hay en el json
// y permite filtrar la muestra por completadas/no completadas
function showInfo()
{

    $datos_json = llamarJson();

    echo ("Mostrando todas las tareas: " . "\n");
    print_r($datos_json);

    echo "Si pulsa 1 podrá ver las tareas completadas, si pulsa 2 verá las no completadas" . "\n";

    $respuesta1 = (fgets(STDIN));

    if ((int)$respuesta1 === 1) {

        foreach ($datos_json["tasks"] as $index => $tasks) {

            if ($tasks["completed"] === true) {
                print_r($tasks);
            }
        }
    } else if ((int)$respuesta1 === 2) {
        echo "Tareas no completadas:\n";
        foreach ($datos_json["tasks"] as $task) {
            if ($task["completed"] === false) {
                print_r($task);
                echo "\n";
            }
        }
    }
}







<?php

function addTasks()
{

    echo "¿Deseas añadir una nueva tarea? (si/no)" . "\n";

    $verify = trim(fgets(STDIN));
    if ($verify === "si") {

        $datos_json = llamarJson();


        echo "Id (entero): ";
        $id = trim(fgets(STDIN));

        if (!ctype_digit($id)) {
            echo "El ID debe ser un número entero.\n";
            return;
        }


        echo "Title: ";
        $title = trim(fgets(STDIN));


        echo "Description: ";
        $description = trim(fgets(STDIN));;

        echo "Due_date ";
        $date = trim(fgets(STDIN));


        echo "Completed (1 = true o 0 = false): ";
        $completed = trim(fgets(STDIN));

        $datos_json['tasks'][] = [
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "due_date" => $date,
            "completed" => (bool)$completed
        ];
        file_put_contents('data.json', json_encode($datos_json, JSON_PRETTY_PRINT));
        echo ("Tarea añadida correctamente:\n");
        print_r($datos_json);
    } else {
        echo "Cerrando programa...";
        $mostrar = llamarJson();
        print_r($mostrar);
    }
}

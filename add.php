<?php
require "utilities.php";
function addTasks()
{

    echo "¿Deseas añadir una nueva tarea?";

    $verify = trim(fgets(STDIN));
    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Id: ";
        $id = trim(fgets(STDIN));


        echo "Title: ";
        $title = trim(fgets(STDIN));


        echo "Description: ";
        $description = trim(fgets(STDIN));;

        echo "Due_date ";
        $date = trim(fgets(STDIN));


        echo "Completed: ";
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

addTasks();

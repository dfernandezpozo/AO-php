<?php

// Función que permite al usuario editar cualquier parte de
// la tarea indicando previamente su ID.
function edit()
{

    echo "¿Deseas editar alguna tarea?(si/no) " . "\n";
    $verify = trim(fgets(STDIN));

    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Escriba el id de la tarea que deseas editar:" . "\n";
        $eleccion = trim(fgets(STDIN));
        $found = false;

        foreach ($datos_json["tasks"] as $index => $tasks) {

            if ((string)$tasks["id"] === $eleccion) {
                $found = true;
                echo "\n---Editando tarea (pulse ENTER si no desea editar algún campo)---\n";
                echo "Nuevo nombre título de la tarea: ";
                $newTask = trim(fgets(STDIN));
                if ($newTask !== "") {
                    $datos_json["tasks"][$index]["title"] = $newTask;
                }

                echo "Nueva descripción: ";
                $newDescription = trim(fgets(STDIN));
                if ($newDescription !== "") {
                    $datos_json["tasks"][$index]["description"] = $newDescription;
                }
                echo "Nueva fecha: ";
                $newDate = trim(fgets(STDIN));
                if ($newDate !== "") {
                    $datos_json["tasks"][$index]["due_date"] = $newDate;
                }
                file_put_contents("data.json", json_encode($datos_json, JSON_PRETTY_PRINT));
                print_r($datos_json["tasks"][$index]);
                break;
            }
        }
        // Si el id no existe el programa lo indicará
        if (!$found) {
            echo "No hay ninguna tarea con ese id" . "\n";
        }
    } else {
        echo "No deseas editar ninguna tarea";
    }
}




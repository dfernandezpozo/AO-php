<?php



function edit()
{

    echo "¿Deseas editar alguna tarea? " . "\n";
    $verify = trim(fgets(STDIN));

    if ($verify === "si") {

        $datos_json = llamarJson();

        echo "Escriba el id de la tarea que deseas editar:" . "\n";
        $eleccion = trim(fgets(STDIN));
        $found = false;

        foreach ($datos_json["tasks"] as $index => $tasks) {

            if ((string)$tasks["id"] === $eleccion) {
                $found = true;
                echo "\n---Editando tarea---\n";
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
        if (!$found) {
            echo "No hay ninguna tarea con ese id" . "\n";
        }
    } else {
        echo "No deseas editar ninguna tarea, volviendo al menú principal...";
    }
}




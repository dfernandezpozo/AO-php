<?php

require "utilities.php";

function taskFinished(){

    echo "¿Deseas marcar como completada/no completada alguna tarea? "."\n";

    $verify=trim(fgets(STDIN));

    if($verify==="si"){

        $datos_json=llamarJson();

        echo "Escriba la tarea que desea marcar:" . "\n";

        $eleccion = trim(fgets(STDIN));

       foreach ($datos_json as $index => $tasks) {

        if($tasks["id"]===$eleccion){

            print_r($datos_json);
        }
        else{
            echo "nada";
        }
        
       } 

    }

    else{
        echo "Nada marcado, volviendo al menú....";
    }
}

taskFinished();

?>
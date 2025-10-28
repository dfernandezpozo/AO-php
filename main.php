<?php

require_once __DIR__ . "/utilities.php";
require_once __DIR__ . "/edit.php";
require_once __DIR__ . "/add.php";
require_once __DIR__ . "/remove.php";
require_once __DIR__ . "/show.php";
require_once __DIR__ . "/taskFinished.php";


function showMenu()
{
    // while (true) {
        
        system('clear'); 

        echo "==============================\n";
        echo "     ¡Gestor de Tareas!      \n";
        echo "==============================\n";
        echo "Opciones:\n";
        echo "1. Añadir tarea\n";
        echo "2. Eliminar tarea\n";
        echo "3. Editar tarea\n";
        echo "4. Marcar tareas\n";
        echo "5. Enseñar tareas\n";
        echo "6. Salir\n";
        echo "==============================\n";
        echo "Elige una opción (1-5): ";

        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                addTasks();   
                break;
            case '2':
                removeTasks(); 
                break;
            case '3':
                edit();  
                break;
            case '4':
               taskFinished();
                break;
            case '5':
                showInfo();
                break;
            case '6':
                echo "¡Hasta luego!\n";
                exit;
            default:
                echo "Opción inválida. Presiona Enter para continuar...";
                fgets(STDIN);
        }

        echo "\nPresiona Enter para volver al menú...";
        fgets(STDIN);
    }
// }

showMenu();



?>

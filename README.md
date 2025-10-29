# AO-php
Trabajo cuya finalidad es realizar una aplicación de gestión de tareas en **php**. Tendremos varios **métodos**, cada uno en archivos distintos para establecer la funcionalidad de nuestra aplicación.
## 💻 Aplicaciones necesarias 
**💡VSCode** ⮕ Entorno recomendable para realizar nuestro código. https://code.visualstudio.com/download
**🐘PHP** ⮕ Es el lenguaje de programación en el cual está hecho el trabajo. A la hora de descargarlo `importante modificar las variables de entorno`. https://www.php.net/downloads.php
##  📁 Creación de archivos 
- Creamos nuestra carpeta **AO-php**.
- En este caso he creado un archivo con cada **método** por separado y un archivo **main** que llamará a cada uno de los métodos para ver el funcionamiento de nuestra aplicación.
- Un archivo `.json` del que recibiremos y modificaremos datos.
- ***Todo el contenido repetitivo lo he creado en utilities.php***.
## ⚙️ Métodos 
Contienen el funcionamiento `por separado` de cada parte de nuestra aplicación.
**En cada método siempre se pregunta al usuario si desea realizar esa acción y cada acción modificará el archivo** `.json` **para la** `persistencia de datos`
## 🚀 Main 
Es la parte más visual del trabajo ya que mediante el uso de un **switch** se mostrará el menú principal de la aplicación.
- Usa el `require + nombre_archivo` para poder llamar a todos los demás archivos en mi **main**.
- El usuario podrá indicar la acción que desea aplicar a las tareas , además de poder salir del menú cuándo éste lo desee.
## ➕ Add 
Función que en primera instancia nos preguntará si deseamos añadir algo.
Debemos responder `si` para que se inicie el método , en el caso contrario volverá al **menú**.
<sub>`A la hora de rellenar el apartado de completed debes poner 0 si es false y 1 si es true: `</sub>

```php
$datos_json['tasks'][] = [

"id" => $id,

"title" => $title,

"description" => $description,

"due_date" => $date,

"completed" => (bool)$completed

];
```
## 🗑️ Remove
Función que usará como filtro el **id** de la tarea que le ponga el usuario.
La tarea indica será eliminada del archivo `.json`
## ✏️ Edit
Funcionamiento similar al `remove` ya que necesitaremos indicar el `id` de la tarea que deseamos modificar.
Si el usuario usa un `id` que no existe el programa se lo indicará de manera adecuada:
```php
if (!$found) {

echo  "No hay ninguna tarea con ese id"  .  "\n";

}
```
⚠️**Si hay algún apartado que NO deseas editar simplemente pulsa** `ENTER`⚠️
## ✅ Task Finished
Esta función usa el `id` para saber la tarea que queremos marcar como **completada** `PERO` mediante un bucle interno se comprueba si dicha tarea está en `true` ⮕ **completada** o `false` ⮕ **no completada**.
- En caso **afirmativo** indicará que la tarea está hecha.
- En caso **negativo** preguntará al usuario si desea marcarla como realizada. Si acepta pasará a completarse de manera automática.
```php
foreach ($datos_json["tasks"] as $index => $tasks) {

  

if ((string)$tasks["id"] === $eleccion) {

$encontrado = true;

  

if ($tasks["completed"] === false) {

echo  "Tarea no completada, ¿deseas completarla? (si/no): ";

$respuesta = trim(fgets(STDIN));

  

if ($respuesta === "si") {

  

$datos_json["tasks"][$index]["completed"] = true;

echo  "Tarea completada\n";

  
  

file_put_contents("data.json", json_encode($datos_json, JSON_PRETTY_PRINT));

} else {

echo  "No se ha realizado ningún cambio\n";

}

} else {

  

echo  "Esa tarea ya está completada.\n";

}

  
  

break;

}

}
```
## 👁️ Show
Es un método que simplemente nos muestra todas las tareas que tenemos actualmente con el añadido de que si el usuario **pulsa** `1` verá las `completadas` y si **pulsa** `2` se mostrarán las no completadas.
## 🛠️ Utilities
Contiene un función que lee nuestro archivo `.json` y le devuelve como un `array` para poder manejar los datos de una manera más adecuada.
**Como es llamada en todos los demás métodos es mejor tenerla en un archivo a parte para evitar la repetición de código**.




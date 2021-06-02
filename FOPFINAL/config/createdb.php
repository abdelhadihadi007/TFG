<?php 
$servername = "localhost";
$username = "root";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

$dbname = "fopdb";
$sql = "DROP DATABASE IF EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
	echo "Se ha borrado la base de datos " . $dbname . "<br>";
}else{
	echo("Connection failed: " . $conn->connect_error);
}

//Creando la base de datos
$sql ="CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

if (mysqli_query($conn, $sql)){
	echo "Se ha ceado la base de datos " . $dbname . "<br>";
}else{
	echo "Error al crear la base de datos " . mysqli_error($error);
}

mysqli_select_db($conn, $dbname);

/*fecha_registroU timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,*/

//Creando tabla usuario
$dbtable_users = "usuarios";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_users (
ID_usuario int(5) unsigned NOT NULL AUTO_INCREMENT,
DNI varchar(10) UNIQUE NOT NULL DEFAULT '',
nombre varchar(50) NOT NULL DEFAULT '',
apellido varchar(50) NOT NULL DEFAULT '',
correoElectronico varchar(250) UNIQUE NOT NULL DEFAULT '',
password varchar(50) NOT NULL DEFAULT '',
nombreRol varchar(50) NOT NULL DEFAULT 'usuario',
bloqueado varchar(20) NOT NULL DEFAULT 'NO',
provincia varchar(200) NOT NULL DEFAULT '',
ciudad varchar(200) NOT NULL DEFAULT '',
direccion varchar(250) NOT NULL DEFAULT '',
codPostal varchar(10),
PRIMARY KEY (ID_usuario)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_users . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}

//Creando tabla mascota
$dbtable_mascota = "mascotas";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_mascota (
ID_mascota int(5) unsigned NOT NULL AUTO_INCREMENT,
tipo varchar(50) NOT NULL DEFAULT '',
descripcion varchar(500) NOT NULL DEFAULT '',
imagen varchar(250) NOT NULL DEFAULT '',
PRIMARY KEY (ID_mascota)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_mascota . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}


//Creando tabla productos
$dbtable_productos = "productos";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_productos (
ID_producto int(5) unsigned NOT NULL AUTO_INCREMENT,
nombre varchar(50) UNIQUE NOT NULL DEFAULT '',
descripcion varchar(500) NOT NULL DEFAULT '',
imagen varchar(250) NOT NULL DEFAULT 'public/img/productos/notimagen.png',
marca varchar(100) NOT NULL DEFAULT '',
categoria varchar(100) NOT NULL DEFAULT '',
precio int(6),
stock int(10) NOT NULL DEFAULT 0,
numeroDeVentas int(10) NOT NULL DEFAULT 0,
fecha_publicacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
ID_mascota int(5) unsigned NOT NULL DEFAULT '1',
PRIMARY KEY (ID_producto),
FOREIGN KEY (ID_mascota) REFERENCES mascotas(ID_mascota)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_productos . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}

//Creando tabla logErrores
$dbtable_log = "logErrores";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_log (
ID_error int(5) unsigned NOT NULL AUTO_INCREMENT,
type varchar(50) NOT NULL DEFAULT '',
localizacion varchar(500) NOT NULL DEFAULT '',
descripcion varchar(500) NOT NULL DEFAULT '',
fechaHora varchar(100) NOT NULL DEFAULT '',
PRIMARY KEY (ID_error)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_log . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}

//Creando tabla comentarios
$dbtable_comentarios = "comentarios";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_comentarios (
ID_comentario int(5) unsigned NOT NULL AUTO_INCREMENT,
ID_usuario int(5) unsigned NOT NULL,
ID_producto int(5) unsigned NOT NULL,
contenido varchar(500) NOT NULL DEFAULT '',
fecha_comentario timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (ID_comentario),
FOREIGN KEY (ID_usuario) REFERENCES usuarios(ID_usuario),
FOREIGN KEY (ID_producto) REFERENCES productos(ID_producto)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_comentarios . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}

//Creando tabla puntuaciones
$dbtable_puntuaciones = "puntuaciones";

$sql = "CREATE TABLE IF NOT EXISTS $dbtable_puntuaciones (
ID_puntuacion int(5) unsigned NOT NULL AUTO_INCREMENT,
ID_usuario int(5) unsigned NOT NULL,
ID_producto int(5) unsigned NOT NULL,
voto varchar(1),
fecha_puntuacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (ID_puntuacion),
FOREIGN KEY (ID_usuario) REFERENCES usuarios(ID_usuario),
FOREIGN KEY (ID_producto) REFERENCES productos(ID_producto)
)";

if ($conn->query($sql) === TRUE){
	echo "Tabla creada correctamente " .$dbtable_puntuaciones . "<br>";
}else{
	echo("Error al crear la tabla: " . $conn->error);
}


//Creando usuario administrador.
mysqli_select_db($conn, $dbname);

$sql= "INSERT INTO usuarios(nombre, correoElectronico, password, nombreRol, bloqueado) VALUES ('Abdelhadi', 'fopadmin@gmail.com', 'hadi23admin', 'administrador', 'NO');";

if ($conn->query($sql) === TRUE){
		echo "Administrador creado correctamente" . "<br>";
		
	}else{
		echo("Error al insertar los datos: " . $conn->error);
	}


//Creando inicializadores.
mysqli_select_db($conn, $dbname);

//Usuarios
$sql = "INSERT INTO usuarios(DNI, nombre, apellido, correoElectronico, password, nombreRol, bloqueado, provincia, ciudad, direccion, codPostal) VALUES ('45308659Q', 'Abdelhadi', 'Hadi', 'hadi@gmail.com', 'hadi23user', 'usuario', 'NO', 'Melilla', 'Melilla', 'C/Alamo nº25', '52003');";
$sql .= "INSERT INTO usuarios(DNI, nombre, apellido, correoElectronico, password, nombreRol, bloqueado, provincia, ciudad, direccion, codPostal) VALUES ('45320945C', 'Mohamed', 'Hadi', 'mohamed@gmail.com', 'benaissa1234', 'usuario', 'NO', 'Melilla', 'Melilla', 'C/Alamo nº25', '52003');";

//Mascotas
$sql .= "INSERT INTO mascotas(tipo, descripcion, imagen) VALUES ('Caninos', 'Toda clase de perros', 'public/img/perro01.png');";
$sql .= "INSERT INTO mascotas(tipo, descripcion, imagen) VALUES ('Felinos', 'Toda clase de gatos', 'public/img/gato01.jpg');";

//Productos Perros
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Mini Sterilised Adulto 8KG', 'Para perros de raza pequeña esterilizados de más de 10 meses de edad. Royal Canin Mini Sterilised es indicado para el control de peso, ya que después de la esterilización tienden a engordar. Gracias a su bajo nivel de grasa, que junto al nivel óptimo de fibra, ayudan a que el animal se sacie y no tenga sensación de hambre.', 'public/img/productos/miniSterilised.jpeg', 'Royal Canin', 'Alimentación', 45.80, 10, 100, 1);";
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Canine Medium Senior 3KG', 'Indicado para perros de raza mediana desde los 10kg, a partir de los 7 años. Alimento completo que ayuda a reducir los problemas de articulaciones debidos a la edad. Su croqueta se adapta perfectamente a la mandíbula y dientes de razas medianas.', 'public/img/productos/caninemediumsenior.jpeg', 'Advance', 'Alimentación', 15.63, 10, 100, 1);";
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Atopic Champú para perros 300ml', 'Champú dermatológico especial para perros con pieles delicadas o sensibles. Gracias a su composición, los baños frecuentes con Advance Atopic favorecen la recuperación de los perros con dermatitis atópica. Con triple acción: antiirritante, reestructurante y antiséptica. Formato: 300 ml.', 'public/img/productos/atopiccChampuperros.jpeg', 'Advance', 'Higiene', 12.76, 10, 100, 1);";
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Collar antiparasitario contra pulgas y garrapatas Negro', 'Collar antiparasitario para perros de razas grandes. Actúa contra las pulgas y las garrapatas. Es totalmente resistente al agua y tiene una fuerte eficacia durante 5 meses. A partir de 1 año de edad. Medidas: 70 cm. Color: Negro.', 'public/img/productos/collarAntiperros.jpg', 'Trixie', 'Higiene', 5.09, 10, 100, 1);";
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Bozal Flexible de Silicona para Perros L-Xl', 'Bozal Flexible de Trixie que impide morder pero le da una comodidad suficiente como para jadear, beber y tomar golosinas. Est? formado por un triple cierre y sus materiales son la silicona, el nylon y el neopreno. Disponible en seis medidas.', 'public/img/productos/bozal-flexible.jpeg', 'Trixie', 'Accesorio', 18.61, 10, 23, 1);";
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Caseta Desmontable', 'Medidas:50*50*60cm Color:Azul Oscuro Beige.', 'public/img/productos/caseta-desmontableperro.jpeg', 'Trixie', 'Accesorio', 55.99, 10, 5, 1);";

//Productos Gatos
$sql .= "INSERT INTO productos(nombre, descripcion, imagen, marca, categoria, precio, stock, numeroDeVentas, ID_mascota) VALUES ('Renal Select Feline', 'Pienso Royal Canin para gatos con insuficiencia renal crónica o temporal, también indicado para minimizar la formación de cálculos de oxalato. Renal Select contiene proteínas de calidad para bajar la carga renal, estimula el apetito gracias a su sabor y croquetas con doble textura, y limita la pérdida de peso. Formato: 2 kg', 'public/img/productos/royalcaninfeline.jpg', 'Royal Canin', 'Alimentación', 18.94, 10, 5, 2);";


if ($conn->multi_query($sql) === TRUE) {
    echo "Datos inializadores creados correctamente" . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
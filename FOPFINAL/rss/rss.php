<?php

/* NOTA IMPORTANTE */
// Este archivo PHP debe guardarse con encoding UTF8"

/*+++++++++++++++++++++++++++++++++++++++++++++++++/
/*++++++++++++++++++ DB CONNECTION ****************/
/**************************************************/

$servername = "localhost";
$username = "root";
$password = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$conn->select_db("fopdb");

/* cambiar el conjunto de caracteres a utf8 */
$conn->set_charset("utf8_unicode_ci");

/*+++++++++++++++++++++++++++++++++++++++++++++++++/
/**************************************************/

// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function sanitize($str) {
	$str=str_replace("&","&amp;",$str);
	$str=str_replace("\"","&quot;",$str);
	$str=str_replace("'","&apos;",$str);
	$str=str_replace(">","&gt;",$str);
	$str=str_replace("<","&lt;",$str);
	$str=str_replace("€","&lt;",$str);
	return $str;
}




$sql = "SELECT * FROM productos ORDER BY fecha_publicacion DESC LIMIT 10";


$result = $conn->query($sql);



//comienzo a escribir el código del RSS
$data = '<?xml version="1.0" encoding="UTF-8" ?>';

//Cabeceras del RSS
$data .= '<rss version="2.0">';


//Datos generales del Canal. Edítalos conforme a tus necesidades
$titulo_canal="PRODUCTOS FOPETZ";         
$link_canal = "http://fop.com";
$descripcion_canal="Canal para exponer los productos de la web fop.com";
$idioma_canal = "es-es";
$copyright_canal = "&copy; FOP";


$data .= "<channel>\n";
$data .= "<title>".sanitize($titulo_canal)."</title>";
$data .= "<link>".$link_canal."</link>";
$data .= "<description>".sanitize($descripcion_canal)."</description>";
$data .= "<language>".$idioma_canal."</language>";
$data .= "<copyright>".htmlentities($copyright_canal)."</copyright>\n";

if ($result->num_rows > 0) 
{
	
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        //elimino caracteres extraños en campos susceptibles de tenerlos
	   $title=sanitize($row["nombre"]);         
	   $descripcion=sanitize($row["descripcion"]);
	   $marca=sanitize($row["marca"]);         
	   $precio=sanitize($row["precio"]);
	   
	   
	   

	   $data .= "<item>\n";
	   $data .= "<title>".$title."</title>\n";
	   $data .= "<descripcion>".$descripcion."</descripcion>\n";
	   $data .= "<marca>" . $marca . "</marca>\n";
	   $data .= "<precio>" . $precio . "</precio>\n";
	   $data .= "</item>\n";
    }
}

//cierro las etiquetas del XML
$data .= "</channel>";
$data .= "</rss>";


//creo cabeceras desde PHP para decir que devuelvo un XML
header("Content-type: text/xml;charset=utf-8");

echo $data;

?>

<?php
class ConexionBD//creamos una clase  Siempre la primera letra despues de class es en mayuscula
{
  private static	$dbhost="localhost";//Aqui ponemos las varibles privadas esto siempre va a ir estatico
  private static	$dbname="vinixcode";
  private static	$dbuser="root";
  private static	$bdpass="";
  private static	$conn=null;//asemos lo mismo con esta variable pero la inicializamos null para seguridad
	public static function AbrirBD(){//aqui creamos un metodo en el cual vamos a ejecutar la conexion a la base de datos
		if (self::$conn== null) {//aqui preguntamos si la variable $conn esta null, entre y ejecute la conexion
			try {//siempre va con el try para la seguridad
				self::$conn= new PDO('mysql:host='.self::$dbhost.';dbname='.self::$dbname.'',self::$dbuser,self::$bdpass);//aqui hacemos la conexion para la base de datos donde es .self::$dbname y demas son las variables que se traen de arriba y se concatena (estandar)
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Esto es para la seguridad (estandar)
			} catch (PDOException $e) {//esto es para si saca error la conexion
				echo $e->getMessage();// muestra el erro q se generoo
			}
		return self::$conn;
		}
	}
	public static function DesconectarBD(){//este metodo es para cerrar la conexion a la base de datos
		self::$conn=null;//ponemos la variable null
	}
}
?>
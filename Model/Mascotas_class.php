<?php
class Mascotas_class
{	
	function AgregarMascota($idCategoria,$identificacion,$nombre,$urlFoto,$estado){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "INSERT INTO mascotas (idCategoria, identificacion, nombre, urlFoto, estado) VALUES (?,?,?,?,?)";
		$query= $pdo->prepare($sql);
		$query->execute(array($idCategoria,$identificacion,$nombre,$urlFoto,$estado));
		ConexionBD::DesconectarBD();
		return "200";
	}

  	function consultarCategoria(){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "SELECT * FROM categoria WHERE estado=1";
		$query= $pdo->prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_BOTH);
		ConexionBD::DesconectarBD();
		return $results;
    }
    
    function consultarMascotas(){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "SELECT id, identificacion, nombre, urlFoto, estado FROM mascotas WHERE estado!=3";
		$query= $pdo->prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_BOTH);
		ConexionBD::DesconectarBD();
		return $results;
    }
    
    function consultarId($id){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "SELECT id, identificacion, nombre, urlFoto, estado FROM mascotas WHERE identificacion = ? AND estado!=3";
		$query= $pdo->prepare($sql);
		$query->execute(array($id));
		$results=$query->fetchAll(PDO::FETCH_BOTH);
		ConexionBD::DesconectarBD();
		return $results;
	}

	function modificarMascotas($nombre,$estado,$id){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql= "UPDATE mascotas SET nombre=?, estado=? WHERE id=?";
		$query= $pdo->prepare($sql);
		$query->execute(array($nombre,$estado,$id));
		//$results=$query->fetchAll(PDO::FETCH_BOTH);
		ConexionBD::DesconectarBD();
		return "200";
	}

	function EliminarMascota($id){
		$pdo = ConexionBD::AbrirBD();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql= "UPDATE mascotas SET estado=3 WHERE id=?";
		$query= $pdo->prepare($sql);
		$query->execute(array($id));
		//$results=$query->fetchAll(PDO::FETCH_BOTH);
		ConexionBD::DesconectarBD();
		return "200";
	}
}
?>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
    // echo "Conectado";
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<?php
	$URL='http://localhost/Biblioteca/';
	class crud{//Create-Read-Update-Delete
		private $servidor = "localhost";//Nombre del servidor
		private $usuario = "root";//Nombre de usuario
		private $bd = "biblioteca";//Nombre de Base de Dato
		private $password = "";//Contraseña

	// 	$URL='https://bibliotec14.000webhostapp.com//';
	// class crud{//Create-Read-Update-Delete
	// 	private $servidor = "localhost";//Nombre del servidor
	// 	private $usuario = "id21003629_colegio14";//Nombre de usuario
	// 	private $bd = "id21003629_biblioteca14";//Nombre de Base de Dato
	// 	private $password = "C@legio14";//Contraseña

		public function conectar(){//Conexion con CRUD
			$conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
			return $conexion;
		}

		public function insertarDatos($datos){//Create
			//CONEXION
			$con = $this->conectar();
			//Cargar PDF
			$Libro=$_POST["Libro"];
			$Portada=$Libro.'.'.'pdf'; 	
			
			if(isset($_FILES['Portada'])&& $_FILES['Portada']['type']=='application/pdf'){
				move_uploaded_file($_FILES['Portada']["tmp_name"],"../../Public/File/Fisico/$Portada");
			}
			
			//Subir a base de datos
			$sql = "INSERT INTO Inventario(Materia, Libro, Portada)  VALUES ('$datos[0]', '$datos[1]', '$Portada')";			
			$rs = mysqli_query($con, $sql);
			//
			header('location:../../Layout/Admin/Altas.Php');
		}

		public function mostrarDatos($id){//Read
			$con = $this->conectar();
			if ($id==0) {
				$sql = "SELECT * FROM inventario";
				$rs = mysqli_query($con, $sql);
				return $fila = mysqli_fetch_all($rs, MYSQLI_ASSOC);
			}
			else {
				$sql = "SELECT * FROM inventario WHERE Id=$id";
				$rs = mysqli_query($con, $sql);
				return $fila = mysqli_fetch_array($rs, MYSQLI_ASSOC);
			}		
		}
		
		public function actualizarDatos($id, $datos){//Update
			$con = $this->conectar();
			include "../../App/Config/config.php";
			
			$Libro=$_POST["Libro"];
			$Formato=$_POST["Formato"];
			$Portada=$Libro.'.'.'pdf';
			$base_dir=realpath($_SERVER["DOCUMENT_ROOT"]);
			$file_delete =  "$base_dir/Biblioteca/Prueba/Biblioteca2/Public/File/";
			$Fisico=$file_delete."Fisico/".$Portada;
			
			
			if(isset($_FILES['Portada'])&& $_FILES['Portada']['type']=='application/pdf'){
							unlink($Fisico);
							move_uploaded_file($_FILES['Portada']["tmp_name"],"../../Public/File/Fisico/$Portada");
							$sql = "UPDATE Inventario SET Materia = '$datos[0]', Libro = '$datos[1]', Portada = '$Portada' WHERE Id=$id";
							$rs = mysqli_query($con, $sql);
						}
				}
			
		

			// Actualizar Datos
			
		

		public function eliminarDatos($id){//Delete
			$con = $this->conectar();

			$sql = "DELETE FROM Inventario WHERE Id=$id";
			
			$rs = mysqli_query($con, $sql);
			}
		}
	
?>
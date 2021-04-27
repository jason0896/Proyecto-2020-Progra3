
<?php
$alert ='';
if(!empty($_POST))
{
  
	if(isset($_POST["usuario"]) &&isset($_POST["password"])){
		if($_POST["usuario"]!=""&&$_POST["password"]!=""){
			include "Conectar.php";
			
			$user_id=null;
			$sql1= "select * from usuario where (`Usuario`=\"$_POST[usuario]\" ) and `Contraseña`=\"$_POST[password]\" ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["idUsuario"];
				break;
			}
			if($user_id==null){
                          
                           print "<script>alert(\"Acceso invalido.\");window.location='../InicioSesion.html';</script>";
			}else{
                        
                            session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../events.html';</script>";				
			}
		}
	}

    
 print "<script>alert(\"Acceso invalido.\");window.location='../InicioSesion.html';</script>";
}

?>
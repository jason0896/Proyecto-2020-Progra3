<?php
include 'Conectar.php';




   
if (!$con) {
	die('No se ha podido conectar a la base de datos');
      echo ' Eroro de conexion ';
}

if(!empty($_POST))
    {
    $subs_name = ($_POST['Nombre']);
    $subs_last = ($_POST['Apellido']);
    $Fech_Nac = ($_POST['Fec_Nac']);
    $direc = ($_POST['Direccion']);
    $email = ($_POST['email']);
    $Num_tel = ($_POST['Telefono']);
    $usua= ($_POST['usuario']);
    $contra =  ($_POST['Contraseña']);  

    $sql= $con->query("SELECT * FROM usuario WHERE usuario = '$usua'") ; 
    $sql= mysqli_num_rows($sql);
  
    if ($sql >= 1 ){

            echo ' Ya existe ';

            } else {

            $sqlinsert1 = $con->query ("insert into `chat_experto`.`persona`
                        ( `Activo`, `Nombre`, `Apellido`, `Fecha_Nacimiento`, `Direcion`, `Telefono`,`Correo`)
                        values
                        (1 , '$subs_name','$subs_last','$Fech_Nac','$direc','$Num_tel','$email')");

    
                        $sqlinsert2 =$con->query ("insert into `chat_experto`.`usuario`
                        ( `Usuario`, `Activo`, `Contraseña`, `Tipo_Usuario`, `Persona_idPersona`)
                        values
                        ( '$usua',1,'$contra','Usuario',1);");
    

    
                        header('Location: ../InicioSesion.html');

            }

    }   

print "<script>alert(\"No se ha digitado nada.\");window.location='../Registro.html';</script>";


?>

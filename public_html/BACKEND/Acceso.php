<?php
include 'Conectar.php';

if (!$con) {
	die('No se ha podido conectar a la base de datos');
      
}


$subs_name = ($_POST['Nombre']);
$subs_last = ($_POST['Apellido']);
$Fech_Nac = ($_POST['Fec_Nac']);
$direc = ($_POST['Direccion']);
$email = ($_POST['email']);
$Num_tel = ($_POST['Telefono']);

 $sql = 'SELECT * FROM usuarios'; 
 $rec = mysql_query($sql); 

 if (mysql_num_rows($rec)>0)
{
header('Fallido');

} else {
 header('Fallido 2');
    $insert_value =  'INSERT INTO `' . $chat_experto . '`.`'.$persona.'` (`idPersona`,`Activo`,`Nombre`, `Apellido`, `Fecha_Nacimiento`,`Direcion`,`Telefono`,`Correo`) VALUES (2,1,"' . $subs_name . '", "' . $subs_last . '", "' . $Fech_Nac . '","' . $direc  . '","' . $email . '","' . $Num_tel . '")';

 mysql_select_db($chat_experto, $con);
$retry_value = mysql_query($insert_value, $con);
 if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: ../events.html');
}
 mysql_close($con);
?>

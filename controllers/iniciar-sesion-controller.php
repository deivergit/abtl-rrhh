<?php

if (!empty($_POST["btn-entrar"])) {
    if (empty($_POST["numero_documento"]) and empty($_POST["contraseña"])) {
        echo "<div class='login-validation-box'>LOS CAMPOS ESTAN VACIOS</div>";
    } else {
        session_start();
        
        $numero_documento = $_POST["numero_documento"];
        $contraseña = md5($_POST["contraseña"]);
        $consulta = mysqli_query($conn,"SELECT usuario_id, numero_documento, contraseña, estatus_usuario FROM usuarios u
        INNER JOIN estatus_usuarios eu ON u.usuario_id = eu.usuario_fk
        WHERE numero_documento = '$numero_documento' AND contraseña = '$contraseña' AND estatus_usuario = 'ACTIVO'");
         
        if ($row = mysqli_fetch_array($consulta)) {
            session_start();
            $_SESSION['usuario_id'] =$row['usuario_id']; 
            header("location:./trabajadores.php");
                  
            } else {
                echo "<div class='login-validation-box'>CONTRASEÑA O USUARIO INCORRECTO</div>";
            }
    }
}

?>
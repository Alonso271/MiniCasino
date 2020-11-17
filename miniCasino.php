<?php

define('MAXFALLOS', 6);

include_once 'funcionesCasino.php';
session_start();
$visitas=0;

    $visitas = $_COOKIE['visitas'];
if (! isset($_SESSION['saldo'])) {
    echo " NUEVA PARTIDA <br>";
    include_once 'inicio.html';
    $_SESSION['saldo']=$_REQUEST['saldo']; 
        echo " Has visitado esta pagina $visitas veces.<br>";
}
else {   
    include_once 'apuesta.html';
        if (verificarApuesta()==false) {
            echo "no tienes tanto dinero";
        }else{
            if (obtenerResultado()==false) {
                echo "Has perdido".$_SESSION['saldo'];
            }else{
                echo "Has ganado".$_SESSION['saldo'];
            }
            if ($_REQUEST['abandonar']) {
                session_destroy();
            }
        }
    
}

$visitas++;
setcookie("visitas",$visitas, time()+ 31*24*3600);
?>

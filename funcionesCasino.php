<?php
function verificarApuesta() {
   $resu = false;
    if ($_REQUEST['apostado']>$_SESSION['saldo']) {

    }else{
        $_SESSION['saldo']=$_SESSION['saldo']-$_REQUEST['apostado'];
        $resu=true; 
    }
    return $resu;
}

function obtenerResultado() {
    $n = random_int(1, 2);
    $resu=false;
    if ($n%2==0 && $_REQUEST['parimpar']==1||$n%2!=0 && $_REQUEST['parimpar']==2) {
        $_SESSION['saldo']=$_SESSION['saldo']+2*$_REQUEST['apostado'];
       $resu=true;

    }
    return $resu;
}

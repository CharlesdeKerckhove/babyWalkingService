<?php 
$_SESSION['loggedin'] = 'true';

include('includes/db.php');
include('includes/carerheader.php');  

    if(!empty($_GET['p'])){
        require_once('pages/'.$_GET['p'].'.php');
    }else{
        require_once('pages/carerarea.php');
    }

include('includes/carerfooter.php');
?>
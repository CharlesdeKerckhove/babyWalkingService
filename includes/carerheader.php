<?php
if (isset($_GET['logout'])){
    //Remove all Global Variables
	$_SESSION = [];
	//Destroy Session
	session_destroy();
	echo "<script> window.location.assign('index.php?p=home'); </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel = "stylesheet" href = "fontawesome/css/all.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
  <title>Baby Walking Service</title>
</head> 

<body> 
<header>
    <a href = "carer.php?p=carerarea"><img  alt = "baby walking service logo" id = "logo" src = "images/logo.png"/></a>
    <h3 class = "loginBtn"><a href='index.php?logout=true'>Log out &nbsp;</a> <i class="fal fa-user-circle"></i></h3>

</header>
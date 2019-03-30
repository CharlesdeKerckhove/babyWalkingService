<?php
	if($_SESSION['loggedin']=='true'){
		echo "<h3 id=loggedin>You are logged in!</h3>";
        $FirstName = $DBH->prepare('SELECT FirstName FROM `carer` WHERE `Email`=:email');
        $FirstName->execute(array(':email' => $_SESSION['email']));
        $firstname = $FirstName->fetch();
	}
    else {
        echo "You are not logged in! :(";
    }
?>

<div class = "content">
    <h1 id = "hometitle">Welcome <?php if(!empty($firstname)){ echo $firstname['FirstName'];} ?></h1>
    <h2 id = "homesubtitle">Are you ready to finally relax?</h2>
    
    <button class = "booknow" id = "homebookbtn"><a href = "carer.php?p=booking">Book Now</a></button>
    
    <h2 id = "homeaward">The #1 <br> Baby Walking Service </h2>
</div>
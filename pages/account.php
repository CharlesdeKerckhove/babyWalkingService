<?php 
$detailsquery = $DBH->prepare('SELECT FirstName, LastName, PhoneNumber, Email FROM `carer` WHERE `Email`=:email');
$detailsquery->execute(array(':email' => $_SESSION['email']));
$user = $detailsquery->fetch();
?>
<div class = "content">
<h2>Your account details</h2>
<div id = "accountcont">
    <table class = "accounttbl">
        <tr>
            <th>First name</th>
            <td><?php echo $user['FirstName'] ?></td> 
            <td class = "accicon"><i class="fal fa-pencil"></i></td>
        </tr>
            <tr>
            <th>Last name</th>
            <td><?php echo $user['LastName'] ?></td> 
            <td class = "accicon"><i class="fal fa-pencil"></i></td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td><?php echo $user['PhoneNumber'] ?></td> 
            <td class = "accicon"><i class="fal fa-pencil"></i></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['Email'] ?></td> 
            <td class = "accicon"><i class="fal fa-pencil"></i></td>
        </tr>
    </table>
</div>
<h2>Change your password</h2>
<form class="regform" action="carer.php?p=account" method="post">
    <?php if(!empty($error)){
    echo '<h2 class="errormsg">Error: '.$error.'<br><br></h2>';} ?>
    <div id = "errors"></div>
        <h3>Current Password</h3>
        <input type = "password" class = "bookingInput" name = "curpassword" placeholder = "Enter Current Password">
        <h3>New Password</h3>
        <input type = "password" class = "bookingInput" name = "newpassword" placeholder = "Enter New Password">
        <h3>Confirm New Password</h3>
        <input type = "password" class = "bookingInput" name = "newpassword2" placeholder = "Confirm New Password">

    <button type = "submit" class = "booknow" id = "submitbtn">Change Password</button>
</form>
</div>
<?php 
    $email = $_SESSION['email'];
    $query = 'SELECT * FROM `child` WHERE CarerID IN(
    SELECT CarerID FROM `carer` WHERE Email =:email)';
    $carerschild = $DBH->prepare($query);
    $carerschild->bindParam(':email', $email);
    $carerschild->execute();
    
    $query2 = 'SELECT * FROM `service`';
    $service = $DBH->prepare($query2);
    $service->execute();
?>
<div class = "content">
<form id = "bookingForm" action = "includes/addbooking.php" method = "POST">
    <div id = "errors"></div>
    <h3>Service</h3>
        <select id = "service">
            <?php
            while($row2 = $service->fetch(PDO::FETCH_ASSOC)) { 
                echo "<option>".$row2['ServiceName']."&#160;".$row2['Length']." hour &#163;".$row2['Price']."</option>";
            }
            ?>
        </select>
    <h3>Date</h3>
        <input type = "date" class = "bookingInput" name = "date" placeholder = "Select Date" required>
    <h3>Time</h3>
        <input type = "time" class = "bookingInput" name = "time" placeholder = "Select Time" required>
    <h3>Child</h3>
        <select id = "service">
            <option>Select Child</option>
        <?php
            if ($carerschild->rowCount() == 0){
                echo "<option>Please register a child on the page below</option>";
            }else{
                while($row = $carerschild->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$row['FirstName']."</option>";
                }
            }
        ?>
        </select>
    <button type = "submit" class = "booknow" id = "submitbtn">Book Now</button>
</form>
</div>
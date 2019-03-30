<?php
    $smt = $DBH->prepare('SELECT * FROM allergylist');
    $smt->execute();
    $allergies = $smt->fetchAll();

    $query2 ='SELECT * FROM `child` WHERE CarerID IN (SELECT CarerID FROM carer WHERE Email = :email)';
    $smt3 = $DBH->prepare($query2);
    $smt3->bindParam(':email', $_SESSION['email']);
    $smt3->execute();
?>
<div class = "content">
    
<div class="tab-group">

<!-- start tab-1 -->
<div class="tab">
    <input class="tabinputs" id="tab-1" type="radio" name="tabs" checked>
    <label for="tab-1"><h2>Registered children</h2></label>
    <div class="tab-content">
        <div id = "childrencont">
            <table class = "accounttbl">
                <?php if($smt3->rowCount()>0){while($row=$smt3->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr><td><br></td></tr>
                <tr>
                    <th>Child&#39;s Name</th>
                    <td><!--?php while($row=$smt3->fetch(PDO::FETCH_ASSOC)){
                        echo "<li>".$row['FirstName']."</li>";} ?> -->
                        <?php echo $row['FirstName'] ?>
                    </td> 
                </tr>
                <tr>
                    <th>Child&#39;s Age</th>
                    <td><!--?php while($row=$smt3->fetch(PDO::FETCH_ASSOC)){ -->
                        <?php echo $row['Age']; ?>
                    </td> 
                </tr>
                <tr>
                    <th>Child&#39;s Allergies</th>
                    <td><?php 
                         $stmt=$DBH->prepare('SELECT AllergyName FROM allergylist WHERE allergiesID IN (SELECT allergiesID FROM childallergies WHERE ChildID=:cid)');
                         $stmt->bindParam(':cid',$row['ChildID']);
                        $stmt->execute();
                        while($rows=$stmt->fetch(PDO::FETCH_ASSOC)){
                        echo $rows['AllergyName']."&#160;";} 
                        ?>
                    </td>
                </tr>
                <?php }}else{ $zerochildren = "No children registered to this account";} ?>
            </table>
        </div>
    <?php if(!empty($zerochildren)){
            echo '<h2 class="errormsg">'.$zerochildren.'<br><br></h2>';} ?>
    </div>
</div>
<!-- end tab-1 -->

<!-- start tab-2 -->
<div class="tab">
    <input class="tabinputs" id="tab-2" type="radio" name="tabs">
    <label for="tab-2"><h2>Register new child</h2></label>
    <div class="tab-content">
        <form class="newchildform" action="carer.php?p=children" method="post">
        <?php if(!empty($error)){
        echo '<h2 class="errormsg">Error: '.$error.'<br><br></h2>';} ?>
        <div id = "errors"></div>
        <h3>Child&#39;s Name</h3>
        <input type = "text" class = "bookingInput" name = "childname" placeholder = "Enter Child&#39;s Name">
        <h3>Enter Child&#39;s Age</h3>
        <select>
        <?php
            for ($i=1; $i<=16; $i++)
            {
                ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
            }
        ?>
        </select>
        <h3>Select Allergies</h3>
        <div id = "checkbxscont">
            <?php foreach ($allergies as $row) {
                echo '<h4 class = "checkbxs"><input type="checkbox" name="allergies[]" value="' . $row["AllergiesID"] . '" />&#160;' . $row['AllergyName'] . '</h4>';
            } ?>
        </div>
            <br><br>
        <button type = "submit" class = "booknow" id = "registerchildbtn">Register Child</button>
    </form>
    </div>
</div>
<!-- end tab-2 -->   
</div>
    
</div>
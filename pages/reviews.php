<div class = "content">
<h2>Leave us a review</h2>
<form class="regform" action="carer.php?p=reviews" method="post">
        <?php if(!empty($error)){
        echo '<h2 class="errormsg">Error: '.$error.'<br><br></h2>';} ?>
        <div id = "errors"></div>
        <h3>First Name</h3>
            <input type = "text" class = "bookingInput" name = "fname" placeholder = "Enter First Name">
        <h3>Rate Us</h3>
        <div class="rating">
            <label>
            <input type="radio" name="stars" value="1" />
            <span class="icon">★</span>
            </label>
            <label>
            <input type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            </label>
            <label>
            <input type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
            </label>
            <label>
            <input type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            </label>
            <label>
            <input type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            </label>
        </div>
        <h3>Tell us your thoughts</h3>
            <input type = "text" class = "bookingInput" name = "comments" placeholder = "Tell us your thoughts">

        <button type = "submit" class = "booknow" id = "submitbtn">Submit</button>
	</form>
</div>
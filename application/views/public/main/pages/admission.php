    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-full.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-theme.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-full-mobile.min.css" type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-theme-mobile.min.css" type="text/css" media="only screen and (max-width: 768px)" />
    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

    <div class="columns_wrap margin_bottom_2_5em_imp sc_columns columns_nofluid sc_columns_count_2 content_container gallery_item ">
        <p style="background-color:#e4e4e4">Basic Information:</p>
    	<div class="column-1_2 sc_column_item sc_column_item_1 sc_info_st1 odd first admission_form ">
    		<form action="/action_page.php">
              <div>
                <label for="email"><b>Name </b></label>
                <input style="background: #fff !important; border: 1px solid" type="text" placeholder="Enter Name" name="email" id="email" required>
                <label for="email"><b>Health Condition</b></label>
                <input stle="border: 1px solid;" type="text" placeholder="Health Condition" name="email" id="birth_certi_id" required>
                
                <label for="email"><b>Email </b></label>
                <input 	style="background: #fff !important; border: 1px solid" type="text" placeholder="Enter Email" name="email" id="email" required>
                <label for="email"><b>Phone </b></label>
                <input style="background: #fff !important; border: 1px solid" type="text" placeholder="Enter Phone Number" name="email" id="phone" required>
                <label for="email"><b>Birth Certificate ID  </b></label>
                <input style="background: #fff !important; border: 1px solid" type="text" placeholder="Enter Phone Number" name="email" id="birth_certi_id" required>
                <label for="birthday">Birthday:</label>
                <input style="width:100%; margin-top: 6px border-radious: 4px" type="date" id="birthday" name="birthday">
                 <label for="email"><b>Photo</b></label>
                <input type="file" placeholder="Enter your photo" name="email" id="photo" required>
            
                <label for="cars">Gender </label>
                <select style=width:100%; name="cars" id="cars">
                    <option value="volvo">Male</option>
                    <option value="saab">Female</option>
                 </select>
                 <label for="cars">Blood Group</label>
                <select style=width:100%; name="cars" id="cars">
                    <option value="volvo">A+</option>
                    <option value="saab">B+</option>
                    <option value="opel">O+</option>
                    <option value="audi">AB+</option>
                 </select>
                 <label for="cars">Religion</label>
                <select style=width:100%; name="cars" id="cars">
                    <option value="volvo">Islam</option>
                    <option value="saab">Hindu</option>
                 </select>
                 <button type="submit" class="registerbtn">Register</button>
               
              </div>
            </form>
    	</div>
    	
    </div>
    
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
    
    
    
    
    
    
    
    
    
    




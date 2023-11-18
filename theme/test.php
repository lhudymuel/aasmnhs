<form onsubmit="return validateUsername() && validatePassword(); return false;" action="" class="form-horizontal well" method="post">
    <!-- Username and password fields -->
    <tr>
        <td><label>Username</label></td>
        <td colspan="2">
            <input required="true" class="form-control input-md" id="USER_NAME" name="USER_NAME" placeholder="Username" type="text" value="<?php echo isset($_SESSION['USER_NAME']) ? $_SESSION['USER_NAME'] : ''; ?>">
        </td>

        <style>
            .valid {
                color: green;
            }

            .invalid {
                color: red;
            }

            .error-message {
                color: red;
                display: none;
            }
        </style>

        <td><label>Password</label></td>
        <td colspan="2">
            <div class="input-group">
                <input required="true" class="form-control input-md" id="PASS" name="PASS" placeholder="Password" type="password" value="<?php echo isset($_SESSION['PASS']) ? $_SESSION['PASS'] : ''; ?>" oninput="checkPassword()">
                <div class="input-group-addon">
                    <button onclick="togglePassword()" style="border: none; outline: none;"><i class="fa fa-eye" aria-hidden="true"></i></button>
                </div>
            </div>
            <span id="error-message" class="error-message">Password must be 8 characters or more</span>
        </td>
    </tr>

    <!-- Submit button -->
    <tr>
        <td></td>
        <td colspan="5">
            <button class="btn btn-success btn-lg" onclick="revealForm()" type="button">Submit</button>
        </td>
    </tr>

    <!-- Rest of the form (hidden initially) -->
    <div id="fullForm" style="display: none;">
        <!-- The rest of your form content goes here -->
        <div class="table-responsive">
	    <div class="col-md-8"><h2><img style="width: 60px; height: 60px; margin-top: -30px;" src="img/logonbg.png" alt="">Enrollment Form</h2></div>
    	<div class="col-md-4"><label>Academic Year: <?php echo $_SESSION['SY'] ; ?></label></div>

        <table class="table">
            <!-- ... Rest of the form content ... -->
            <tr>
				<td><label>Id</label></td>
				<td >
					<input class="form-control input-md" readonly id="IDNO" name="IDNO" placeholder="Student Id" type="text" value="<?php echo isset($_SESSION['STUDID']) ? $_SESSION['STUDID'] : $autonum->AUTO; ?>">
				</td>
				<td colspan="4"></td>

			</tr>
			<tr>
				<td><label>Firstname</label></td>
				<td>
					<input required="true"   class="form-control input-md" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo isset($_SESSION['FNAME']) ? $_SESSION['FNAME'] : ''; ?>">
 				</td>
				<td><label>Lastname</label></td>
				<td colspan="2">
					<input required="true"  class="form-control input-md" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo isset($_SESSION['LNAME']) ? $_SESSION['LNAME'] : ''; ?>">
				</td> 
				<td>
					<input class="form-control input-md" id="MI" name="MI" placeholder="MI"  maxlength="1" type="text" value="<?php echo isset($_SESSION['MI']) ? $_SESSION['MI'] : ''; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td colspan="5"  >
				<input required="true"  class="form-control input-md" id="PADDRESS" name="PADDRESS" placeholder="Permanent Address" type="text" value="<?php echo isset($_SESSION['PADDRESS']) ? $_SESSION['PADDRESS'] : ''; ?>">
				</td> 
			</tr>
			<tr>
				<td ><label>Sex </label></td> 
				<td colspan="2">
					<label>
						<input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female 
						 <input id="optionsRadios2" name="optionsRadios" type="radio" value="Male"> Male
					</label>
				</td>
				<td ><label>Date of birth</label></td>
				<td colspan="2"> 
				<div class="input-group" >
                  <div class="input-group-addon"> 
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  required="true" name="BIRTHDATE"  id="BIRTHDATE"  type="text" class="form-control input-md"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo isset($_SESSION['BIRTHDATE']) ? $_SESSION['BIRTHDATE'] : ''; ?>">
				   </div>             
				</td>
				 
			</tr>
			<tr><td><label>Place of Birth</label></td>
				<td colspan="5">
				<input required="true"  class="form-control input-md" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" type="text" value="<?php echo isset($_SESSION['BIRTHPLACE']) ? $_SESSION['BIRTHPLACE'] : ''; ?>">
			   </td>
			</tr>
			<tr>
				<td><label>Nationality</label></td>
				<td colspan="2"><input required="true"  class="form-control input-md" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality" type="text" value="<?php echo isset($_SESSION['CONTACT']) ? $_SESSION['CONTACT'] : ''; ?>">
							</td>
				<td><label>Religion</label></td>
				<td colspan="2"><input  required="true" class="form-control input-md" id="RELIGION" name="RELIGION" placeholder="Religion" type="text" value="<?php echo isset($_SESSION['RELIGION']) ? $_SESSION['RELIGION'] : ''; ?>">
				</td>
				
			</tr>
			<tr>
			<td><label>Contact No.</label></td>
				<td colspan="6"><input required="true"  class="form-control input-md" id="CONTACT" name="CONTACT" placeholder="Contact Number" type="number" maxlength="11" value="<?php echo isset($_SESSION['CONTACT']) ? $_SESSION['CONTACT'] : ''; ?>">
							</td>
				
			</tr>
			<tr>
			<td><label>Strand/Year</label></td>
				<td colspan="2">
					
					<select class="form-control input-sm" name="COURSE">
								<?php
								if(isset($_SESSION['COURSEID'])){
									$course = New Course();
  								    $singlecourse = $course->single_course($_SESSION['COURSEID']);
  								    echo '<option value='.$singlecourse->COURSE_ID.' >'.$singlecourse->COURSE_NAME.'-'.$singlecourse->COURSE_LEVEL.' </option>';

								}else{
									echo '<option value="Select">Select</option>';
								}
								
								?>
								<?php 

								$mydb->setQuery("SELECT * FROM `course` WHERE COURSE_LEVEL=1");
								$cur = $mydb->loadResultList();

								foreach ($cur as $result) {
								  echo '<option value='.$result->COURSE_ID.' >'.$result->COURSE_NAME.'-'.$result->COURSE_LEVEL.' </option>';

								}
								?>
				    </select> 


				</td>
				
			 
				<td><label>Civil Status</label></td>
				<td colspan="2">
					<select class="form-control input-sm" name="CIVILSTATUS">
						<option value="<?php echo isset($_SESSION['CIVILSTATUS']) ? $_SESSION['CIVILSTATUS'] : 'Select'; ?>"><?php echo isset($_SESSION['CIVILSTATUS']) ? $_SESSION['CIVILSTATUS'] : 'Select'; ?></option>
						 <option value="Single">Single</option>
						 <option value="Married">Married</option> 
						 <option value="Widow">Widow</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td colspan="2">
				  <input required="true"  class="form-control input-md" id="USER_NAME" name="USER_NAME" placeholder="Username" type="text"value="<?php echo isset($_SESSION['USER_NAME']) ? $_SESSION['USER_NAME'] : ''; ?>">
				</td>

				<style>
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }
		.error-message {
            color: red;
            display: none;
        }
              </style>

				<td><label>Password</label></td>
				<td colspan="2">
				<div class="input-group">
				<input required="true"  class="form-control input-md" id="PASS" name="PASS" placeholder="Password" type="password"value="<?php echo isset($_SESSION['PASS']) ? $_SESSION['PASS'] : ''; ?>" oninput="checkPassword()">
        <div class="input-group-addon">
		<button  onclick="togglePassword()" style="border: none; outline: none;"><i class="fa fa-eye" aria-hidden="true"></i></button>
        </div>
    </div>
            	<span id="error-message" class="error-message">Password must be 8 characters or more</span>
			</tr>
			<tr>
				<td><label>Gaurdian</label></td>
				<td colspan="2">
					<input required="true"  class="form-control input-md" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name" type="text"value="<?php echo isset($_SESSION['GUARDIAN']) ? $_SESSION['GUARDIAN'] : ''; ?>">
				</td>
				<td><label>Contact No.</label></td>
				<td colspan="2"><input  required="true" class="form-control input-md" id="GCONTACT" name="GCONTACT" placeholder="Contact Number" type="number" value="<?php echo isset($_SESSION['GCONTACT']) ? $_SESSION['GCONTACT'] : ''; ?>"></td>
			</tr>

			<style>
        .notificationagg {
            color: green;
            font-size: 12px;
            display: none;
        }
    </style>

			<td><label>User Agreement</label></td>
	<td colspan="5">
        <label><input required="true" type="checkbox" onchange="acceptAgreement()"> By Sign up you are agree with our <a class="pull-right login"><a style="color:blue;" data-target="#PrivacyM" data-toggle="modal" href="">Data Privacy Statement</a></label>
        <div class="notificationagg" id="notificationagg">Agreement accepted!</div>

        <script>
            function acceptAgreement() {
                var notification = document.getElementById('notificationagg');
                var checkbox = document.querySelector('input[type="checkbox"]');
                if (checkbox.checked) {
                    notification.style.display = 'block';
                  
                    // Add code here to handle the user's acceptance, such as setting a cookie or changing a user setting in your system.
                } else {
                    notification.style.display = 'none';
                }
            }
        </script>
    </td>
<!-- Modal Agreement -->
<style>
    .modal-content {
      text-align: center;
    }
  </style>
<div class="modal fade" id="PrivacyM" tabindex="-1" >
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button class="close" data-dismiss="modal" type=
					"button">×</button>

					<h4 class="modal-title" id="myModalLabel">Privacy Agreement</h4>
					</div>

					<form action="" enctype="multipart/form-data" method="post">
		<div class="modal-body">
			<div class="pv">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8" >
							<p>This Privacy Agreement is made effective between Anselmo A. 
								Sandoval Memorial National High School Enrollment System, located at Brgy. 
								Pulong Niogan, Mabini Batangas, and the Users.</p>

								<h1>Purpose</h1>
                            <p>This Agreement outlines the privacy policy that governs the use and handling of information 
	                           entered into the system provided by Anselmo A. Sandoval Memorial National High School 
	                           Enrollment System. The primary purpose of this Agreement is to ensure the confidentiality 
	                           and secure management of all data and information provided by the users.</p>
                               <h1>Privacy Policy</h1>
						    <p>Information Collection: Anselmo A. Sandoval Memorial National High School Enrollment 
								System collects information solely for the purpose of providing services within the 
								System. This information may include but is not limited to personal data, contact 
								information, and other data necessary for the effective functioning of the System.</p>
							
						    <p>Use of Information: Information provided by the User will only be used within the 
								System. Anselmo A. Sandoval Memorial National High School Enrollment System will 
								not disclose, distribute, or sell any personal information to third parties without 
								the User's explicit consent, except where required by law.</p>

							<p>Data Security: Anselmo A. Sandoval Memorial National High School Enrollment System 
								is committed to maintaining the security of all data and information provided by 
								the User. Appropriate measures will be taken to safeguard data against unauthorized 
								access, disclosure, or destruction.</p>

							<p>Access to Information: Users have the right to access, modify, or delete their information 
								within the System. Requests for data access or modification can be made by contacting 
								Anselmo A. Sandoval Memorial National High School Enrollment System at 09827381273/aasmnhs@gmail.com.</p>

							<p>Data Retention:Anselmo A. Sandoval Memorial National High School Enrollment System will retain 
								User data only for as long as necessary to fulfill the purposes outlined in this Agreement. 
								Upon termination of use of the System, User data will be securely deleted or anonymized, in 
								accordance with applicable laws and regulations.</p>
								<h1>Agreement Acceptance</h1>
							<p>By using the System, the User acknowledges that they have read and understood the terms of this 
								Privacy Agreement and agree to be bound by its provisions.</p>
								<h1>THANK YOU</h1>

							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-default" data-dismiss="modal" type="button">OK, I read the Agreement</button>
		
		</div>
	</form>

				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<tr>
			<td></td>
				<td colspan="5">	
					<button class="btn btn-success btn-lg" name="regsubmit" type="submit">Submit</button>
				</td>
			</tr>
        </table>
    </div>

    <script>
        // Function to toggle the visibility of the form elements
        function revealForm() {
            // Get the username and password input values
            var username = document.getElementById("USER_NAME").value;
            var password = document.getElementById("PASS").value;

            // Check if both username and password are filled
            if (username !== "" && password !== "") {
                // Show the rest of the form
                document.getElementById("fullForm").style.display = "block";
            } else {
                // Handle the case where either username or password is not filled
                alert("Please fill in both username and password.");
            }
        }
    </script>
</form>

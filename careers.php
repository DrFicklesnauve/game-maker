<?php

define('TITLE', 'Careers');
include('templates/header.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(move_uploaded_file ($_FILES['fileToUpload']['tmp_name'], "uploads/".$_FILES['fileToUpload']['name'])){
        print '<p>Your file has been uploaded.</p>';
    }else{
        print '<p style="color: red;">Your file could not be uploaded because: ';
		
		switch ($_FILES['fileToUpload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'No file was uploaded';
				break;
			case 6:
				print 'The temporary folder does not exist.';
				break;
			default:
				print 'Something unforeseen happened.';
				break;
		}
		
		print '.</p>';
    }
}

?>

	<h1 class="text-center">Careers - SignUp</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-lg-6 col-sm-12 col-xs-12">
					<form method="post" action="careers.php" enctype="multipart/form-data">
						<table class="table table-hover">
							<div class="form-group">
								<tr>
									<td><label for="fName">First Name:</label></td>
									<td><input id="fName" name="fName" type="text"></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="lName">Last Name:</label></td>
									<td><input id="lName" name="lName" type="text"></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="emailAdd">Email Address:</label></td>
									<td><input id="emailAdd" name="emailAdd" type="text"></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="streetAdd">Street Address:</label></td>
									<td><input id="streetAdd" name="streetAdd" type="text"></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="city state zip">City:</td>
									<td><input id="city" name="city" type="text">
								</tr>
								<tr>
									<td><label for="state">State:</label></td>
									<td><select id="state" name="state">
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select></td>
									</tr>
									<tr>
										<td><label for="zip">Zip Code:</label></td>
										<td><input id="zip" name="zip" type="text"></td>
									</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="phoneNum">Phone Number:</label></td>
									<td><input placeholder="(xxx)xxx-xxxx" id="phoneNum" name="phoneNum" type="text" pattern="(0-9]{3}[0-9]{3}[0-9]{4}"></td>
								</tr>
							</div>
							<div class="form-group">
								<tr>
									<td><label for="uploadResume">Upload your Resume:</label></td>
									<td><input type="file" id="fileToUpload" name="fileToUpload"></td>
								</tr>
								
								
								
							</div>

						</table>
						<input type="submit" class="submit-button" value="Submit" name="submit">
					</form>
			</div>
		</div>
	</div>

<?php

include('templates/footer.php');

?>
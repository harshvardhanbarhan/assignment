<?php
include_once('header.php');
?>
<style>
	span{
		font-size: 12px;
	}
</style>
<div class="container">
	<div class="final_message">
		
	</div>
	<div class="row">
		<div class="col-lg-11">
			<h5 class="card-title">Register User</h5>
		</div>
		<div class="col-lg-1">
			<a href="index.php"><button class="btn btn-sm btn-info">Back</button></a>
		</div>
	</div>
	<form id="registration_form" action="javascript:void(0)">
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control">
			<span style="color:red;" id="first_name"></span>
		</div>

		<div class="form-group">
			<label>Middle Name</label>
			<input type="text" name="middle_name" class="form-control">
			<span style="color:red;" id="middle_name"></span>
		</div>

		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control">
			<span style="color:red;" id="last_name"></span>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
			<span style="color:red;" id="email"></span>
		</div>
	
		<div class="form-group">
			<label>Phone Type</label>
			<select class="form-control" name="phone_type">
				<option value="mobile">Mobile</option>
				<option value="landline">Landline</option>
			</select>
			<span style="color:red;" id="phone_type"></span>
		</div>
	
		<div class="form-group">
			<label>Mobile No.</label>
			<input type="number" name="mobile" class="form-control">
			<span style="color:red;" id="mobile"></span>
		</div>
			
		<div class="form-group">
			<label>Landline No.</label>
			<input type="number" name="landline" class="form-control">
			<span style="color:red;" id="landline"></span>
		</div>

		<div class="form-group">
			<label>Gender</label><br>
			<input type="radio" name="gender" value="Male" checked>Male
			<input type="radio" name="gender" value="Female">Female
			<input type="radio" name="gender" value="Transgender">Transgender
			<br>
			<span style="color:red;" id="gender"></span>
		</div>

		<div class="form-group">
			<label>Education</label>
			<select name="education[]" class="form-control" placeholder="Select Education" multiple>
				<option value="10th">10th</option>
				<option value="12th">12th</option>
				<option value="Graduation">Graduation</option>
				<option value="Post Graduation">Post Graduation</option>
			</select>
			<span style="color:red;" id="education"></span>
		</div>

		<label>Vehicle</label>
		<div>
		  	<input name="vehicle[]" type="checkbox" value="Motorcycle">Motorcycle&nbsp;&nbsp;&nbsp;&nbsp;
		  	<input name="vehicle[]" type="checkbox" value="Car">Car&nbsp;&nbsp;&nbsp;&nbsp;
		  	<input name="vehicle[]" type="checkbox" value="Scooter">Scooter&nbsp;&nbsp;&nbsp;&nbsp;
		  	<input name="vehicle[]" type="checkbox" value="Bus">Bus
		  	<br>
		  	<span style="color:red;" id="vehicle"></span>
		</div>

		<div class="form-group">
			<label>Profile Image</label>
			<input type="file" name="profile_image" class="form-control">
			<span style="color:red;" id="profile_image"></span>
		</div>

		<div class="form-group">
			<label>Driving Licence</label>
			<input type="file" name="driving_licence" class="form-control">
			<span style="color:red;" id="driving_licence"></span>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-success submit_btn ">	
		</div>
	</form>
</div>


<?php
include_once('footer.php');
?>
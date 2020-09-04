<?php 
include_once('db.php');
if(isset($_POST) && !empty($_POST)){
	$status = 0;
	$err = [];

	$first_name = '';
	if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
		$first_name = $_POST['first_name'];
	}else{
		$err['first_name'] = "First Name can not be empty";
	}

	$middle_name = '';
	if(isset($_POST['middle_name']) && !empty($_POST['middle_name'])){
		$middle_name = $_POST['middle_name'];
	}else{
		$middle_name = '';
	}

	$last_name = '';
	if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
		$last_name = $_POST['last_name'];
	}else{
		$err['last_name'] = "Last Name can not be empty";
	}

	$email = '';
	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];
		// check for already email
		$query = "SELECT * FROM users WHERE email = '".$email."'";
		$result = $connection->query($query);
		if($result->num_rows > 0){
			$err['email'] = 'Email already exist';
		}
	}else{
		$err['email'] = 'Email can not be empty';
	}



	$phone_number = '';
	$phone_type = '';
	if(isset($_POST['phone_type']) && !empty($_POST['phone_type'])){
		$phone_type = $_POST['phone_type'];
		if($phone_type == 'mobile'){
			if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
				$phone_number = $_POST['mobile'];
			}else{
				$err['mobile'] = "Mobile no can not be empty";
			}
		}else{
			if(isset($_POST['landline']) && !empty($_POST['$landline'])){
				$phone_number = $_POST['landline'];
			}else{
				$err['landline'] = "Landline no can not be empty";
			}
		}
	}

	$gender = '';
	if(isset($_POST['gender']) && !empty($_POST['gender'])){
		$gender = $_POST['gender'];
	}else{
		$err['gender'] = "Gender can not be empty";
	}

	$education = '';
	if(isset($_POST['education']) && !empty($_POST['education'])){
		$education_ar = $_POST['education'];
		$education = implode(',', $education_ar);
	}else{
		$err['education'] = "Education can not be empty";
	}

	$vehicle = '';
	if(isset($_POST['vehicle']) && !empty($_POST['vehicle'])){
		$vehicle_ar = $_POST['vehicle'];
		$vehicle = implode(',', $vehicle_ar);
	}else{
		$err['vehicle'] = "Vehicle can not be empty";
	}

	// Check for Files now
	$profile_image = '';
	if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name'] != ''){

		// check for file type
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$detectedType = exif_imagetype($_FILES['profile_image']['tmp_name']);
		$error = !in_array($detectedType, $allowedTypes);
		if($error){
			$err['profile_image'] = "Only jpeg, png and gif files are allowed";
		}else{
			$file_name = $_FILES['profile_image']['name'];
			$file_tmp = $_FILES['profile_image']['tmp_name'];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$newname = uniqid().$file_name.'.'.$file_ext;
			$target_1 = 'images/'.$newname;

			if(move_uploaded_file($file_tmp,$target_1)){
				$profile_image = $target_1;
			}
		}
	}else{
		$err['profile_image'] = "Profile Image can not be empty";
	}

	$driving_licence = '';
	if(isset($_FILES['driving_licence']) && $_FILES['driving_licence']['name'] != ''){

		// check for file type
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$detectedType = exif_imagetype($_FILES['driving_licence']['tmp_name']);
		$error = !in_array($detectedType, $allowedTypes);
		if($error){
			$err['driving_licence'] = "Only jpeg, png and gif files are allowed";
		}else{
			$file_name = $_FILES['driving_licence']['name'];
			$file_tmp = $_FILES['driving_licence']['tmp_name'];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$newname = uniqid().$file_name.'.'.$file_ext;
			$target = 'images/'.$newname;

			if(move_uploaded_file($file_tmp,$target)){
				$driving_licence = $target;
			}
		}
	}else{
		$err['driving_licence'] = "Driving Licence Image can not be empty";
	}

	if(!empty($err)){
		$status = 0;
		$arr = [
			'status' => $status,
			'error' => $err,
			'message' => 'User not registered',
		];
		echo json_encode($arr);
	}else{ 
		// insert data now
		$query = "INSERT INTO `users`(`first_name`, `middle_name`, `last_name`, `email`, `phone_type`, `phone_number`, `gender`, `education`, `vehicle`, `profile_image`, `drivinng_licence`) VALUES ('".$first_name."','".$middle_name."','".$last_name."','".$email."','".$phone_type."','".$phone_number."','".$gender."','".$education."','".$vehicle."','".$profile_image."','".$driving_licence."')";
		
		if ($connection->query($query) === TRUE) {
  			$message = "User Registered Successfully";
		} else {
 	 		$message = "User not registered";
		}

		$status = 1;
		$arr = [
			'status' => $status,
			'error' => $err,
			'message' => 'User Registered Successfully',
		];
		echo json_encode($arr);
	}
}
?>
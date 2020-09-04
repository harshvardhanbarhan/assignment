<?php
include_once('db.php');
include_once('header.php');
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = ".$id;
$result = $connection->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
	?>
	<center>
		<div class="card" style="width: 50rem;">
		  	<div class="card-body">
		  		<div class="row">
		  			<div class="col-lg-11">
		  				<h5 class="card-title">User Details</h5>
		  			</div>
		  			<div class="col-lg-1">
		  				<a href="index.php"><button class="btn btn-sm btn-info">Back</button></a>
		  			</div>
		  		</div>
		    	<hr>
		    	<div class="row">
		    		<div class="col-lg-6">
		    			Id
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['id']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Full Name
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['first_name']." ".$row['middle_name']." ".$row['last_name']?>
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Email
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['email']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Phone Number
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['phone_number']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Gender
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['gender']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Education
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['education']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Vehicle
		    		</div>
		    		<div class="col-lg-6">
						<?=$row['vehicle']?>		    			
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Profile Image
		    		</div>
		    		<div class="col-lg-6">
						<img style="height:100px;width:100px;" src="<?=$row['profile_image']?>">		
		    		</div>
		    	</div>

		    	<div class="row">
		    		<div class="col-lg-6">
		    			Driving Licence
		    		</div>
		    		<div class="col-lg-6">
		    			<img style="height:100px;width:100px;" src="<?=$row['drivinng_licence']?>">		
		    		</div>
		    	</div>

		  	</div>
		</div>
	</center>
	<?php
	}
}
?>
<div clas="card">
	
</div>
<?php
include_once('footer.php');
?>
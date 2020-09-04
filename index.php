<?php 
include_once('db.php');
include_once('header.php');
?>
<!DOCTYPE html>


<center>
	<div class="card" style="width: 80rem;">
		<div class="card-body">
			<div class="row">
	  			<div class="col-lg-10">
	  				<h5 class="card-title">User List</h5>
	  			</div>
	  			<div class="col-lg-2">
	  				<a href="register_form.php"><button class="btn btn-sm btn-info">Register User</button></a>
	  			</div>
	  		</div>
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM users";
						$result = $connection->query($query);
						if ($result->num_rows > 0) {
							$count = 0;
							while($row = $result->fetch_assoc()) {
					    		?>
					    		<tr>
					    			<td><?=++$count?></td>
					    			<td><?=$row['first_name']." ".$row['middle_name']." ".$row['last_name']?></td>
					    			<td><?=$row['email']?></td>
					    			<td><?=$row['phone_number']?></td>
					    			<td><a href="details.php?id=<?=$row['id']?>"><button class="btn btn-sm btn-success">view</button></a></td>
					    		</tr>
					    		<?php
					  		}
						}else{
							echo 'No Record Found';
						}
					?>
				</tbody>	
			</table>
		</div>
	</div>
</center>


<?php
include_once('footer.php');
?>
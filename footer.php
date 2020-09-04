</body>
<script>
	$(document).ready(function() {
    	$('.table').DataTable();
    	$("select[name='education[]']").select2();
	} );

	$("#registration_form").on('submit',function(e){
		e.preventDefault();
		var status = 1;

		var first_name = $("input[name='first_name']").val();
		if(first_name == ''){
			status = 0;
			$("#first_name").text('');
			$("#first_name").text('First name can not be empty');
		}else{
			$("#first_name").text('');
			status = 1;
		}

		var last_name = $("input[name='last_name']").val();
		if(last_name == ''){
			status = 0;
			$("#last_name").text('');
			$("#last_name").text('Last name can not be empty');
		}else{
			$("#last_name").text('');
			status = 1;
		}

		var email = $("input[name='email']").val();
		if(email == ''){
			status = 0;
			$("#email").text('');
			$("#email").text('Email can not be empty');
		}else if(!validateEmail(email)){
			$("#email").text('Please provide proper email ID');
		}else{
			$("#email").text('');
			status = 1;
		}

		var gender = $("input[name='gender']").val();
		if(gender == ''){
			status = 0;
			$("#gender").text('');
			$("#gender").text('Gender can not be empty');
		}else{
			$("#gender").text('');
			status = 1;
		}

		var phone_type = $("select[name='phone_type']").val();
		if(phone_type == 'mobile'){
			var mobile = $("input[name='mobile']").val();
			if(mobile == ''){
				$("#mobile").text('');
				$("#landline").text('');
				$("#mobile").text('Mobile can not be empty');		
			}else if(!validateNo(mobile)){
				$("#mobile").text('Should be atleast 10 Digits');
			}else{
				$("#mobile").text('');
				$("#landline").text('');
				status = 1;
			}
		}

		if(phone_type == 'landline'){
			var landline = $("input[name='landline']").val();
			if(landline == ''){
				$("#mobile").text('');
				$("#landline").text('');
				$("#landline").text('Landline can not be empty');		
			}else if(!validateNo(landline)){
				$("#landline").text('Should be atleast 10 Digits');
			}else{
				$("#mobile").text('');
				$("#landline").text('');
				status = 1;
			}
		}

		var education = $("select[name='education[]']").val();
		if(education.length == 0){
			status = 0;
			$("#education").text('');
			$("#education").text('Education can not be empty');
		}else{
			$("#education").text('');	
			status = 1;
		}
		
		var vehicle = [];
		$('input[name="vehicle[]"]:checked').each(function() {
			vehicle.push(this.value);
		});
		if(vehicle.length == 0){
			status = 0;
			$("#vehicle").text('');
			$("#vehicle").text('Vehicle can not be empty');
		}else{
			$("#vehicle").text('');
			status = 1;
		}

		var profile_image = $("input[name='profile_image']").val();
		if(profile_image == ''){
			status = 0;
			$("#profile_image").text('');
			$("#profile_image").text('Profile image can not be empty');
		}else{
			$("#profile_image").text('');
			status = 1;
		}

		var driving_licence = $("input[name='driving_licence']").val();
		if(driving_licence == ''){
			status = 0;
			$("#driving_licence").text('');
			$("#driving_licence").text('Driving Licence can not be empty');
		}else{
			$("#driving_licence").text('');
			status = 1;
		}

        var formData = new FormData(this);
        if(status === 1){
        	$.ajax({
	            type:'POST',
	            url: 'registration.php',
	            data:formData,
	            cache:false,
	            contentType: false,
	            processData: false,
	            success:function(data){
	                var result = JSON.parse(data);
	                console.log(result);
	                if(result['status'] == 0){
	                	var err = result['error'];
	                	$.each( err, function( key, value ) {
	  						$("#"+key).text('');
	  						$("#"+key).text(value);
						});
	                }else{
	                	$(".final_message").text('');
	              		$(".final_message").text(result['message']);
	              		$("#registration_form").get(0).reset()
	                }
	            },
	        });
        }else{
        	return false;
        }
	});


	function validateEmail(email) {
  		const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  		return re.test(email);
	}

	function validateNo(number){
		if(number.length < 10){
			return false
		}else{
			return true;
		}
	}

</script>
</html>

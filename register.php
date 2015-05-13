<html>
	<head>
		<title>Information Gathered</title>
	</head>
	
	
	<body>
	<?php
	    $lastName=$_POST['lastname'];
		$firstName=$_POST['firstname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		//new branch check 
		
	 if (isset($_POST['insert'])){
		echo 'You have clicked Insert button </br>';
		require_once('mysql_connect.php');
		
	
		$query="INSERT INTO users (LastName, FirstName, email, username,encrypted_password)"."VALUES ('".$lastName."','".$firstName."','".$email."','".$username."','".$password."');";
		if (mysqli_query($dbc, $query)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($dbc);
			}

		mysqli_close($dbc);
	}else if (isset($_POST['show'])){
	
	   echo 'You have clicked show button </br>';
	   require_once('mysql_connect.php');
		$query="SELECT * FROM users";
		$response=@mysqli_query($dbc,$query);
		if($response){
			echo '
				<table align ="left" cellspacing="5" cellpadding="8">
					<tr>
						<td align ="left"><b>First Name</b></td>
						<td align ="left"><b>Last Name</b></td>
						<td align ="left"><b>Email</b></td>
						<td align ="left"><b>UserName</b></td>
					</tr>
				
			';
			while($row=mysqli_fetch_array($response)){
				echo '<tr><td align ="left">'.
						$row['firstname'].'</td><td align ="left">'.
						$row['lastname'].'</td><td align ="left">'.
						$row['email'].'</td><td align ="left">'.
						$row['username'].'</td>'.
					'</tr>'
				;
		
			}
			echo '</table>';
		}
	}
	
	?>
	
	
	</body>

</html>

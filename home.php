<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     
<?php
$api_url = 'https://dummy.restapiexample.com/api/v1/employees';

$json_data = file_get_contents($api_url);

$response_data = json_decode($json_data);

$user_data = $response_data->data;

$user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
//print_r($user_data);

foreach ($user_data as $user) {
	echo "name: ".$user->employee_name;
	echo "<br />";
	echo "age: ".$user->employee_age;
	echo "<br /> <br />";
}

?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
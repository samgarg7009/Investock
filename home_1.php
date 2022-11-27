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
     <p>
          stockname: <input id="stockName" type="text" value="  " onchange="changeHandler()"></input>
          <button id="submit"> submit</button> 
     </p>
     <script>
          var input;
          var url;
          var button = d=select('#submit');
          button.mousePressed(getInfo);
          input = select('#stockName');
          function getInfo(){
               url = api + input.value();
          }
     </script>    
     <h1>Hello, 
<?php
//forcast
$api_ = 'http://54.188.231.51:5000/Get_Forecast/?ticker=';

$json_data = file_get_contents($url);

$response_data = json_decode($json_data);
//$user_data = $response_data->data;

$user_data = array_slice($response_data, 0, 20,TRUE);
?>

<table>
<?php

foreach ($user_data as $user) {   
     ?>
     <tr>
          <td>
               <?php
                    echo $user->forecast_date;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->forecast_value;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->forecast_ticker;
               ?>
          </td>
     </tr>
     <?php
	
}

?>
</table>

</h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
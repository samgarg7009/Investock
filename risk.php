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
    

    </br>

    <h1>Investock</h1>
    <a href="logout.php">Logout</a>
     <form name="form" action="" method="get">
          Stockname: <input name="stockName" id="stockName" type="text"/>
          <input type="submit"> 
     </form>

     <!-- <script>
          var value = "";
          
          function changeHandler(e){
               value = e.target.value
          }
          
     </script> -->
     >

     <h1> 


<?php
//risk value
$api3 = 'http://54.188.231.51:5000/Risk_Value/?ticker=';
$url3 = $api3.''.$_GET['stockName'];
$json_data3 = file_get_contents($url3);

$response_data3 = json_decode($json_data3);
//$user_data = $response_data->data;

#$user_data3 = array_slice($json_data3, 0, 20,TRUE);
?>
    <h1>Risk Factor</h1>
<?php

echo"Risk value: ".$response_data3->risk_val;
?>
    </br>
    <h3>risk value is calculated as standard deviation of price</h3>
    </h1>   
</body>
</html>

<?php 

}else{
     header("Location: index.php");
     exit();
}
 ?>
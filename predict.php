<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        background: #263060;
        display: flex;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }
    .htable {
        margin: -10px 44px 4px 4px;
    }
     table, th, td {
          border:1px solid black;
     }
     </style>
</head>

<body>
    <h1>Investock</h1>
<a href="logout.php">Logout</a>
     <form name="form" action="" method="get">
          Stockname: <input name="stockName" id="stockName" type="text"/>
          <input type="submit"> 
     </form>
     <h1 class="htable">
<?php
//forcast
$api = 'http://54.188.231.51:5000/Get_Forecast/?ticker=';
$url = $api.''.$_GET['stockName'];
$json_data = file_get_contents($url);

$response_data = json_decode($json_data);
//$user_data = $response_data->data;

$user_data = array_slice($response_data, 0, 20,TRUE);
?>
<h1>Forcasted value:<?php echo $_GET['stockName']?></h1>

<table>
     <tr>
          <th>Forcast Date</th>
          <th>Predicted Value</th>
          <th>Stock</th>
     </tr>

<?php


foreach ($user_data as $user) {   
     ?>
     <tr>
          <td>
               <?php
                    echo $user->forecast_date;
               ?>
          </td>
          <td>
               <?php
                    echo $user->forecasted_value;
               ?>
          </td>
          <td>
               <?php
                    echo $user->ticker;
               ?>
          </td> 
     </tr>
     <?php
	
}

?>
</table>

</h1>   
</body>
</html>

<?php 


}else{
     header("Location: index.php");
     exit();
}
 ?>
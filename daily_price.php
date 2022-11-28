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
     table, th, td {
          border:1px solid black;
     }
    </style>
</head>
<body>
    
    </br>
    <h1>Investock</h1>
    <a href="logout.php">Logout</a>
    <form name="form" action="" method="get">
          Stockname: <input name="stockName" id="stockName" type="text"/>
          Start Date: <input name="startDate" id="startDate" type="date"/>
          End Date: <input name="endDate" id="endDate" type="date"/>
          <input type="submit"> 
     </form>

     <!-- <script>
          var value = "";
          
          function changeHandler(e){
               value = e.target.value
          }
          
     </script> -->

     <h1> 
<?php
//daily time series
$api2 = 'http://54.188.231.51:5000/Stock_Price_Time_Series_Daily/?ticker=';
$url2 = $api2.''.$_GET['stockName'].'&start_date='.$_GET['startDate'].'&end_date='.$_GET['endDate'];
$json_data2 = file_get_contents($url2);

$response_data2 = json_decode($json_data2);
//$user_data = $response_data->data;

$user_data2 = array_slice($response_data2, 0, 20,TRUE);
?>
<h1>Daily Time Series<?php $_GET['stockName']; ?></h1>
<table>
      <tr>
          <th>Stock Name</th>
          <th>Trade date</th>
          <th>Volume</th>
     </tr>
<?php

foreach ($user_data2 as $user) {
     
     ?>
     <tr>
          <td>
               <?php
                    echo $user->ticker;
               ?>
          </td>
          <td>
               <?php
                    echo $user->tradedate;
               ?>
          </td>
          <td>
               <?php
                    echo $user->volume;
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
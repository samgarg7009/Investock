<?php
//weekly time series
$api_url1 = 'http://54.188.231.51:5000/Stock_Price_Time_Series_Weekly/?ticker=ABB.BSE&start_date=2022-10-01&end_date=2022-10-10';

$json_data1 = file_get_contents($api_url1);

$response_data1 = json_decode($json_data1);
//$user_data = $response_data->data;

$user_data1 = array_slice($response_data1, 0, 20,TRUE);
?>

<table>
<?php
foreach ($user_data1 as $user) {    
     ?>
     <tr>
          <td>
               <?php
                    echo $user->adjustedclose;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->ticker;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->tradedate;
               ?>
          </td>
     </tr>
     <tr>
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

<?php
//daily time series
$api_url2 = 'http://54.188.231.51:5000/Stock_Price_Time_Series_Daily/?ticker=ABB.BSE&start_date=2022-10-01&end_date=2022-10-10';

$json_data2 = file_get_contents($api_url2);

$response_data2 = json_decode($json_data2);
//$user_data = $response_data->data;

$user_data2 = array_slice($response_data2, 0, 20,TRUE);
?>

<table>
<?php


foreach ($user_data2 as $user) {
     
     ?>
     <tr>
          <td>
               <?php
                    echo $user->ticker;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->tradedate;
               ?>
          </td>
     </tr>
     <tr>
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

<?php
//risk value
$api_url3 = 'http://54.188.231.51:5000/Risk_Value/?ticker=ABB.BSE';

$json_data3 = file_get_contents($api_url3);

$response_data3 = json_decode($json_data3);
//$user_data = $response_data->data;

$user_data3 = array_slice($response_data3, 0, 20,TRUE);
?>
<?php


foreach ($user_data3 as $user) {
     echo"Risk value".$user->risk_val;
     echo"Stock Name".$user->ticker_val;
}
?>

<?php
//alert
$api_url4 = 'http://54.188.231.51:5000/Get_Alert/?tickers=3MINDIA.BSE,ABB.BSE';

$json_data4 = file_get_contents($api_url4);

$response_data4 = json_decode($json_data4);
//$user_data = $response_data->data;

$user_data4 = array_slice($response_data4, 0, 20,TRUE);
?>

<table>
<?php

foreach ($user_data as $user) {  
     ?>
     <tr>
          <td>
               <?php
                    echo $user->changepercent;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->ticker;
               ?>
          </td>
     </tr>
     <tr>
          <td>
               <?php
                    echo $user->tradedate;
               ?>
          </td>
     </tr>
     <?php
	
}

?>
</table>

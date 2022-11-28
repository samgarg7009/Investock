<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="style.css" type="text/css">
     <style>
          body {
               background: #263060;
               display: flex;
               align-items: center;
               height: 100vh;
               flex-direction: column;
          }
          header {
               display: flex;
               top: 0;
               justify-content: space-between;
               align-items: center;
               background-color: #dca4f3;
               padding: 0 4.8rem;
          }

          .proname {
               height: 2.2rem;
          }

          .main_nav_list {
               list-style: none;
               display: flex;
               align-items: center;
               gap: 3.2rem;
          }
          header nav ul li a {
               display: inline-block;
               text-decoration: none;
               color: #333;
               font-size: 1.8rem;
               font-weight: 700;
               transition: all 0.3s;
          }
          nav {
               display:block;
          }
          li {
               display: list-item;
          }
</style>
</head>

<body>
<header class="header">
     <h1 class="proname">Investock </h1>
     <nav class="main_nav">
          <ul class="main_nav_list">
               <li>
                   <a class="main_nav_link" href="predict.php">Predict Future</a> 
               </li>
               <li>
                    <a class="main_nav_link" href="daily_price.php">Daily Report</a>
               </li>
               <li>
                    <a class="main_nav_link" href="week_price.php">Weekly Report</a>
               </li>
               <li>
                   <a class="main_nav_link" href="risk.php">Are u in risk?</a> 
               </li>
               <li>
                    <a class="main_nav_link" href="logout.php">Logout</a>
               </li>
          </ul>
     </nav>
</header>

     <!-- <script>
          var value = "";
          
          function changeHandler(e){
               value = e.target.value
          }
          
     </script> -->     
</body>
</html>

<?php 


}else{
     header("Location: index.php");
     exit();
}
 ?>
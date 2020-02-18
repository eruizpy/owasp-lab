<!DOCTYPE html>
<html>
<head>
  <title>
    IR432 Admin Login Check
  </title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <div class="container">
    <?php

      include("config.php");

      $db_connection = new mysqli($db_servername,$db_username,$db_password,$db_database);

      if($db_connection->connect_error){
        echo "<h1>Database connection not available.";
        echo $db_connection->connect_error;
        exit();
      }else{
        $sql = "SELECT * from web_login WHERE username = '".$_POST['db_user']."' AND password = '".$_POST['db_pass']."'";
        $data = ($db_connection->query($sql));

        if($data->num_rows>0){ # we got results, show them:
          # Let's also set a cookie to hack:
          if (!isset($_COOKIE['login'])){
            setcookie("login",$_POST['db_user']);
          }
          while($row = $data->fetch_assoc()){
            echo "ID: ".$row['id']." USERNAME: ".$row['username']." PASS: ".$row['password']."<br />";
          }
          if($data->num_rows>1){
            echo "<h3 class='success'>Congratulations, you just exploited and SQL Injection Vulnerability.</h1>";
          }
          echo "<hr/>From the site cookie \"login\":<br />";
          $sql = "SELECT * from secrets WHERE user = '".$_COOKIE['login']."'";
          $data = ($db_connection->query($sql));

          if($data->num_rows>0){
            while($row = $data->fetch_assoc()){
              echo "USER: ".$row['user']." SECRET: ".$row['secret']."<br />";
            }
          }

        }else{
          echo "Login Failed.";
          exit();
        }
      }
      $db_connection->close(); # close up the connection.
    ?>
  </div>
</body>
</html>

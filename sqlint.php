<!DOCTYPE html>
<html>
<head>
  <title>IR432 - Access a record from an SQL table</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <div class="container">
    <div class='blog_post'>
      <?php
      if(isset($_GET['id'])){

        include("config.php");

        $db_sql = "SELECT * from blog where id = ".$_GET['id'];

        $db_connection = new mysqli($db_servername, $db_username, $db_password, $db_database);

        if($db_connection->connect_error){
          echo "<span class='fail'>Database is offline or cannot be accessed.</span>";
        }else{
          $db_records = $db_connection->query($db_sql);
          if($db_records->num_rows>0){
            while ($db_row = $db_records->fetch_assoc()){
              echo "<div class='blog_post'>";
              echo "POST DATE: ".$db_row['date']."<br />";
              echo "POST BY: ".$db_row['posted_by']."<br /><hr />";
              echo $db_row['post']."<br /><hr />";
            }
          }else{
            echo "There are no web blog posts at this time.";
          }

        }
      }else{
        echo "<h1 class='fail'>No ID Provided.</h1>";
      }
      ?>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>IR432 - XSS Testing Page</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <div class="container">
    <div class="blog_post">
      <?php
        echo "Your ID is: ".$_GET['id'];
        ?>
    </div>
</body>
</html>

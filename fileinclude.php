<!DOCTYPE html>
<html>
<head>
  <title>IR432 - File Inclusion Test</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <div class="container">
    <?php
      include($_GET['file']);
      ?>
  </div>
  <?php
    # Show the class this method: php://filter/convert.base64-encode/resource=
    ?>
</body>

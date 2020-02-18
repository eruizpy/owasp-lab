<!DOCTYPE html>
<html>
  <head>
    <title>IR432 CMD INJECTION TEST</title>
    <link rel="stylesheet" href="styles/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="blog_post">
        <?php
          if(isset($_GET['filename'])){
            $lines = exec("wc -l ".$_GET['filename']);
            echo "<span class='success'>The number of lines in file: <span class='fail'>".$_GET['filename']."</span> is <span class='fail'>".$lines."</span></span>";
          }else{
            echo "<span class='fail'>No file name given.</span>";
          }
          ?>
      </div>
    </div>
  </body>
</html>

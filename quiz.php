<?php
require "courses.csv";
?>
<html>
  <head>
    <title>Courses</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="container">
      <h1>Courses</h1>
      <?php
        $m = filter_input(INPUT_GET,"m");
        if ($m==1) {
          echo '<p class="success">Your response has been recorded.</p>';
        }
      ?>
      
      <h1>View our courses below:</h1>
      <?php
         $fp = @fopen($courses['db'],"r"); // the @ symbol suppresses any error messages
         if ($fp && file_get_contents($courses['db'])!="") {
            while (($data = fgetcsv($fp)) !== FALSE) {
              echo "<li>{$data[0]}: {$data[1]}</li>\n";
            }
            fclose($fp);
         } else {
           echo "There are no current entries. Be the first!";
         }
      ?>
    </div>
  </body>
</html>
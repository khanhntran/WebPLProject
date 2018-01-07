<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .back {
      background-color: white;
      border: 2px solid orange;
      color: black;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .back:hover {
      background-color: red;
      color: white;
    }

    </style>
  </head>
  <body>
    <?php
      $filename= "data/data.txt";
      $data="";
      foreach($_POST as $key =>$val)
      {
        $data=$data.$val;
        $data=$data.PHP_EOL;
      }

      if(!empty($data))
      {
        $file = fopen($filename, "a");
        chmod($filename,0777);
        fputs($file, $data.PHP_EOL);
        fclose($file);
      }

     ?>
     <center>
       <h1>You have successfully submitted your question!</h1>
       <h3>If you would like to add another, click the button below.</h3>
       <input type="button" class="back" value="Submit another question" onClick="location.href='http://plato.cs.virginia.edu/~knt3tb/hw2/main.php'">
     </center>
     <script>
     function back()
     {
       window.history.go(-2);
     }
     </script>
  </body>
</html>

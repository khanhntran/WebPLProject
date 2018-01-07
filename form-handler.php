<html>
<head>
  <title>Simple form handler</title>

  <style>
  .back {
    background-color: white;
    border: 2px solid red;
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

  .submit {
    background-color: white;
    border: 2px solid green;
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

  .submit:hover {
    background-color: green;
    color: white;
  }

  </style>


</head>

<body bgcolor="#EEEEEE">
  <h1 align="center" style="margin-top:50px">Question and Answer Confirmation Page</h1>
  <p align="center">
    <h3><center><font color="purple"; font size ="5"><b>Please double-check your question and answer(s) and then click Confirm</b></font></center></h3>
  </p>

  <center>
    <table cellSpacing=1 cellPadding=1 width="75%" border=1 bgColor="lavender">
      <tr bgcolor="#FFFFFF">
        <td align="center" style="color:red; font-size:200%"><b>Question</b></td>
        <td align="center" style="color:red; font-size:200%"><string>Answer(s)</ststring></td>
        </tr>

      <?php

      $quest;
      $filename= "data/data.txt";
      //print_r($_POST);

      # determines which of the three question types was selected
      reset($_POST);
      $type = key($_POST);

      if ($type == "SAQuestion") {
        $quest = $_POST['SAQuestion'];
      }elseif ($type == "multQuestion") {
        $quest = $_POST['multQuestion'];
      }elseif ($type == "tfQuestion") {
        $quest = $_POST['tfQuestion'];
      }else {
        echo "Invalid Question Type";
      }

      ?>

      <?php
      function print_ans($arr) {

        $ind = array_keys($arr);

        #echo $ind[0];
        #echo $arr[$ind[1]];

        if ($ind[0] == "SAQuestion" || $ind[0] == "tfQuestion") {
          foreach (array_slice($arr, 1)  as $key => $value) {

            echo $value;
            echo "<br>";
          }
        }
        else
        {

          if ($arr[$ind[1]] == "ans1") {
            echo "[Answer] " .  $arr[$ind[2]];
            echo "<br>";
            echo  $arr[$ind[3]];
            echo "<br>";
            echo  $arr[$ind[4]];
            echo "<br>";
            echo  $arr[$ind[5]];
          }elseif ($arr[$ind[2]] == "ans2") {
            echo  $arr[$ind[1]];
            echo "<br>";
            echo  "[Answer] " .  $arr[$ind[3]];
            echo "<br>";
            echo  $arr[$ind[4]];
            echo "<br>";
            echo  $arr[$ind[5]];
          }elseif ($arr[$ind[3]] == "ans3") {
            echo  $arr[$ind[1]];
            echo "<br>";
            echo  $arr[$ind[2]];
            echo "<br>";
            echo  "[Answer] " . $arr[$ind[4]];
            echo "<br>";
            echo  $arr[$ind[5]];
          }elseif ($arr[$ind[4]] == "ans4") {
            echo  $arr[$ind[1]];
            echo "<br>";
            echo  $arr[$ind[2]];
            echo "<br>";
            echo  $arr[$ind[3]];
            echo "<br>";
            echo  "[Answer] " . $arr[$ind[5]];
          }else {

          }
        }
      }

      ?>

      <tr>
        <td style="font-size:150%; padding:15px"><?php echo htmlspecialchars($quest)?></td>
        <td style="font-size:150%; padding:15px"><?php echo htmlspecialchars(print_ans($_POST))?></td>
      </tr>
    </table>

  </center>
  <div style="text-align:center; margin-top:100px">
    <input type="button" class="back" value="Go Back and Edit" onClick=history.back()>
    <form action="confirm-handler.php" method="post">
      <?php
        echo "<input name='question' value='question:' type='hidden'>";
        foreach($_POST as $key =>$val)
        {
          echo "<input name='".$key."' value='" . $val . "' type='hidden'>";
        }
      ?>
      <input type="submit" class="submit" value="Confirm">
    </form>
  </div>


</body>
</html>

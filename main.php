<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Jeopardy Game Assignment</title>

  <style>

  ol {
    list-style-position: inside;
    font-size: 105%;
    color: red;
  }

  li{
    margin-top: 10px;
  }

  .reset {
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

  .reset:hover {
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

  .ansForm {
    display: inline-block;
    border: 2px solid black;
    margin-top: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 5px;
  }

  </style>

  <script type="text/javascript">

  function update_screen() {
    //alert("update_screen works!");

    var question_type = document.getElementById("questions").value;
    //alert(question_type);
    if (question_type == "short_answer") {
      //alert("settingvisibile")
      document.getElementById("shortAnsForm").style.display = "";
      document.getElementById("multAnsForm").style.display = "none";
      document.getElementById("tfAnsForm").style.display = "none";
      document.getElementById("none_msg").innerHTML ="";
      //alert("settedvisible")
    }else if (question_type == "multiple_choice"){
      //alert("Does not exist yet")
      document.getElementById("multAnsForm").style.display = "";
      document.getElementById("shortAnsForm").style.display = "none";
      document.getElementById("tfAnsForm").style.display = "none";
      document.getElementById("none_msg").innerHTML ="";

    }else if (question_type == "true_false") {
      //alert("Also does not exist yet")
      document.getElementById("tfAnsForm").style.display = "";
      document.getElementById("shortAnsForm").style.display = "none";
      document.getElementById("multAnsForm").style.display = "none";
      document.getElementById("none_msg").innerHTML ="";

    }else {
      document.getElementById("none_msg").innerHTML ="Please select an option";
      document.getElementById("shortAnsForm").style.display = "none";
      document.getElementById("multAnsForm").style.display = "none";
      document.getElementById("tfAnsForm").style.display = "none";
    }

  }

  function eraseText() {
    document.getElementById("SAQuestion").value = "";
    document.getElementById("satext").value = "";
  }

  function validateInput() {
    var type = document.getElementById("questions").value;
    //alert(type);

    //var test = document.getElementById("questions");
    //alert(test.value)

    if (type == "short_answer") {
      //alert("goes into if")
      var ques = document.getElementById("SAQuestion");
      //var ques = document.shortAnsForm.SAQuestion;
      var ans = document.getElementById("satext");
      //var ans = document.shortAnsForm.satext;
      //alert(ques.value);
      //alert(ans.value);

      if (ques.value == "" || ans.value == "") {
        document.getElementById("sa_msg").innerHTML = "Don't leave anything blank";
        return (false);
      }


    }else if (type == "multiple_choice"){
      //var ques = document.multAnsForm.multQuestion;
      //var ans = document.shortAnsForm.satext;
      var ques = document.getElementById("multQuestion");
      var ans = document.getElementsByName("multans");
      var ans1 = document.getElementById("txtans1");
      var ans2 = document.getElementById("txtans2");
      var ans3 = document.getElementById("txtans3");
      var ans4 = document.getElementById("txtans4");
      // alert("question = " + ques.value);
      //alert("ans = " + ans.value);
      // alert("box1 = " + ans1.value);
      // alert("box2 = " + ans2.value);
      // alert("box3 = " + ans3.value);
      // alert("box4 = " + ans4.value);

      if (ques.value == "" || !isChecked() || ans1.value == "" || ans2.value == "" || ans3.value == "" || ans4.value == "") {
        document.getElementById("mult_msg").innerHTML = "Don't leave anything blank";
        return (false);
      }


    }else if (type == "true_false") {
      //var ques = document.tfAnsForm.tfQuestion;
      //var ans = document.shortAnsForm.satext;
      var ques = document.getElementById("tfQuestion");
      var ans = false;
      if (document.getElementById("truebutton").checked) {
        ans = true;
      }else if (document.getElementById("falsebutton").checked){
        ans = true;
      } else false;
      //alert(ques.value);
      //alert(ans);

      if (ques.value == "" || ans != true) {
        document.getElementById("tf_msg").innerHTML = "Don't leave anything blank";
        return (false);
      }


    }else {

    }


  }

  function isChecked() {
    var boxes = document.getElementsByName("multans");

    for (var i = 0; i < boxes.length; i++) {
      if (boxes[i].type == 'radio' && boxes[i].checked) {
        return true;
      }
    }
    return false;
  }

  </script>

</head>

<body onload="update_screen()">
  <center>
    <h1> Jeopardy Assignment Page </h1>
    <h2> By Khanh Tran (knt3tb) and Seven Starosta (sbs3bx) </h2>
    <h3> Use this question form to create jeopardy questions for your game! </h3>
    <h3> <font color="red"> Instuctions: </font></h3>

    <ol>
      <li> Select the question type you would like to create. </li>
      <li> Enter your question in the first field and the answer in the second. <br> Multiple choice or True/False: Make sure to select the button associated with the correct answer. </li>
      <li> Click on Submit Question to save your question or Reset if you would like to clear the form. </li>
    </ol>

    <h4> <font color="blue">Choose the type of question you'd like to create. </font></h4>
    <b>Question type:<b><br>
    <form action="form-handler.php" method="post" id="questionform" onchange="update_screen()"/>
    <select id="questions" name="questions">
      <option value="nah">Select Option</option>
      <option value="short_answer">Short-Answer</option>
      <option value="multiple_choice">Multiple Choice</option>
      <option value="true_false">True/False</option>
    </select>
  </form>
  <span id="none_msg" style="color:red; font-style:italic; font-size:80%"></span>
</center>

<center>
  <form action="form-handler.php" class="ansForm" method="post" id="shortAnsForm" style="display:none" onSubmit="return (validateInput())">
    <h1 align="center">Enter Short Answer Question</h1>
    <table>
      <tr>
        <td>Question: <td><input type="text" id="SAQuestion" name="SAQuestion" value="" placeholder="Type your question here" style="width: 370px"/>
        </td>
      </tr>
      <tr>
        <td>Answer: <td>
          <br>
          <textarea placeholder="Type the answer here" rows="4" cols="50" id="satext" name="satext" action="form-handler.php" method="post"></textarea>
        </td>
      </tr>
      <span id="sa_msg" style="color:red; font-style:italic; font-size:100%"></span>

      <tr>
        <td></td>
        <td>
          <br>
          <input type="button" value="Reset" class="reset" onClick="eraseText();"/>
          &nbsp; &nbsp; &nbsp; &nbsp;
          <input type="submit" class="submit" value="Submit Question">
        </td>
      </tr>
    </table>


  </form>
</center>

<center>
  <form action="form-handler.php" method="post" class="ansForm" id="multAnsForm" style="display:none" onSubmit="return (validateInput())">
    <h1 align="center">Enter Multiple-Choice Question</h1>
    <table>
      <tr>
        <td>Question: <td><input type="text" id="multQuestion" name="multQuestion" value="" placeholder="Type your question here"; style="width: 372px">
        </td>
      </tr>
      <tr>
        <td>Answer: <td>
          <br>
          <input type="radio" name="multans" value="ans1"><input type="text" id="txtans1" name="txtans1" action="form-handler.php" method="post" placeholder="Insert answer option here" style="width: 350px"/><br>
          <input type="radio" name="multans" value="ans2"><input type="text" id="txtans2" name="txtans2" action="form-handler.php" method="post" placeholder="Insert answer option here" style="width: 350px"/><br>
          <input type="radio" name="multans" value="ans3"><input type="text" id="txtans3" name="txtans3" action="form-handler.php" method="post" placeholder="Insert answer option here" style="width: 350px"/><br>
          <input type="radio" name="multans" value="ans4"><input type="text" id="txtans4" name="txtans4" action="form-handler.php" method="post" placeholder="Insert answer option here" style="width: 350px"/><br>
        </td>
      </tr>

      <span id="mult_msg" style="color:red; font-style:italic; font-size:100%"></span>

      <tr>
        <td></td>
        <td>
          <br>
          <input type="reset" class="reset" value="Reset" />
          &nbsp; &nbsp; &nbsp; &nbsp;
          <input type="submit" class="submit" value="Submit Question">
        </td>
      </tr>
    </table>
  </form>
</center>

<center>
  <form action="form-handler.php" method="post" class="ansForm" id="tfAnsForm" style="display:none" onSubmit="return (validateInput())">
    <h1 align="center">Enter True/False Question</h1>
    <table>
      <tr>
        <td>Question: <td><input type="text" id="tfQuestion" name="tfQuestion" value="" placeholder="Type your question here" style="width: 370px">
        </td>
      </tr>
      <tr>
        <td>Answer: <td>
          <br>
          <input type="radio" name="tfans" value="True" id="truebutton" > True <br>
          <input type="radio" name="tfans" value="False" id="falsebutton" > False <br>
        </td>
      </tr>

      <span id="tf_msg" style="color:red; font-style:italic; font-size:100%"></span>

      <tr>
        <td></td>
        <td>
          <br>
          <input type="reset" class="reset" value="Reset" />
          &nbsp; &nbsp; &nbsp; &nbsp;
          <input type="submit" class="submit" value="Submit Question">
        </td>
      </tr>
    </table>
  </form>
</center>

</body>

</html>

<?php
  if ($_POST['process'] === 1) {
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);
    if (empty($last_name)){
      echo "<p class=\"error\">Your last name cannot be blank</p>";
    } else {
      echo "<p>Hello there, ".$first_name." ".$last_name."</p>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form validation example</title>
    <style>
      .error{color:red;}
      input{display:block; margin-bottom:10px;}
    </style>
  </head>

  <body>
    <h1>Form Validation Example</h1>
    <h2>Please enter your name</h2>

    <form action="validation_example_2.php" method="post">
      <label for="first_name">First name:</label>
      <input name="first_name" id="first_name" type="text" value="<?php echo($first_name); ?>" />

      <label for="last_name">Last name:</label>
      <input name="last_name" id="last_name" type="text" value="<?php echo($last_name); ?>" />

      <input type="hidden" name="process" value="1" />
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>

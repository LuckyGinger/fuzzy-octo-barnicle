<?php
    if (isset($_POST["sign_up"])) {

    }

 ?>



<!DOCTYPE html>
<html>
<head>
    <title>.::Passwords::.</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        function validation_sign_up() {
            if ($("#email").val() == "" ){
                $("#email").css("background-color", "pink");
            } else {
                $("#email").css("background-color", "white");

            }
            if ($("#pwd").val() == "" ) {
                $("#pwd").css("background-color", "pink");
            } else {
                $("#pwd").css("background-color", "white");

            }
            if ($("#comf_pwd").val() == "" ) {
                $("#comf_pwd").css("background-color", "pink");
            } else {
                $("#comf_pwd").css("background-color", "white");
            }
            if ($("#comf_pwd").val() != "" && $("#pwd").val() != "" && $("#email").val() != "" && $("#pwd").val() == $("#comf_pwd").val()) {
                return true;
            }
            return false;
        }
    </script>
</head>
<body>
    <form action="login.php" method="POST" onsubmit="return validation_sign_up()">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email"/>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd"/>
      </div>
      <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" id="comf_pwd"/>
      </div>
      <input type="submit" name="sign_up" class="btn btn-default" value="submit"/>
    </form>

</body>
</html>

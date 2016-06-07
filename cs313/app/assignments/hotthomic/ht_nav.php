<?php session_start() ?>

<script type="text/javascript">
  var sign_up = function() {
    if ($("#login_floater").is(':visible')) {
      $("#login_floater").hide()
    }
    $("#signup_floater").show()
  }

  var login = function() {
    if ($("#signup_floater").is(':visible')) {
      $("#signup_floater").hide()
    }
    $("#login_floater").show()
  }
</script>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/cs313/app/index.php">HotThomics</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a class="assign" href="/cs313/app/assign.php">Assignments</span></a></li>
      </ul>
      <ul class="logout_buttons nav navbar-nav navbar-right">
        <li><a href="./auth_user.php?auth=logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>

      </ul>
      <ul class="sign_up_buttons nav navbar-nav navbar-right">
        <li><a onclick="sign_up()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a onclick="login()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

      </ul>
      <div class="navbar-brand navbar-right">
        <?php if (isset($_SESSION["first_name"])): ?>
            Hello, <?php echo $_SESSION['first_name'] ?>
            <script>$(".sign_up_buttons").hide()</script>
        <?php else: ?>
            <script>$(".logout_buttons").hide()</script>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<script>

function isComplete() {
  var fn = $("#first_name")//.val();
  var ln = $("#last_name")//.val();
  var gender = $("input[val='gender']:checked").val();
  var un = $("#user_name")//.val();
  var pwd = $("#pwd")//.val();
  var conf = $("#conf_pwd")//.val();

  console.log(gender)
  if (fn.val() == "" || ln.val() == "" || un.val() == "" || pwd.val() == "" || conf.val() == "" || conf.val() != pwd.val()) {
    if (fn.val() == "") {
      fn.css('background-color', 'red')
      $(".error1").show()
    } else {
      fn.css('background-color', 'white')
      $(".error1").hide()
    }

    if (ln.val() == "") {
      ln.css('background-color', 'red')
      $(".error2").show()
    } else {
      ln.css('background-color', 'white')
      $(".error2").hide()
    }


    // if (gender) {
    //   $(".error3").hide()
    // } else {
    //   $(".error3").show()
    // }

    if (un.val() == "") {
      un.css('background-color', 'red')
      $(".error4").show()
    } else {
      un.css('background-color', 'white')
      $(".error4").hide()
    }

    if (conf.val() != pwd.val() || pwd.val() == "" || conf.val() == "") {
      pwd.css('background-color', 'red')
      conf.css('background-color', 'red')
      $(".error5").show()
      $(".error6").show()
    } else {
      pwd.css('background-color', 'white')
      conf.css('background-color', 'white')
      $(".error5").hide()
      $(".error6").hide()
    }
    return false;
  } else {
    return true;
  }


  // console.log(fn)
  // console.log(ln)
  // console.log(un)
  // console.log(pwd)
  // console.log(conf)

}
</script>

<div id="signup_floater">
  <h1>Sign Up</h1>
  <form action="auth_user.php?auth=sign_up" method="post" onsubmit="return isComplete(this)">
    <table class="table">
      <tbody>
        <tr>
          <th><span class="error1 error">*</span> First Name:</th>
          <th><input type="text" id="first_name" name="first_name"></th>
        </tr>
        <tr>
          <th><span class="error2 error">*</span> Last Name:</th>
          <th><input type="text" id="last_name" name="last_name"></th>
        </tr>
        <tr>
          <tbody>
            <th><span class="error3 error">*</span> Gender:</th>
            <th class="pull-left"><label for="male">Male</label> <input type="radio" id="male" name="gender" value="0"></th>
            <th class="pull-left"><label for="female">Female</label> <input type="radio" id="female" name="gender" value="1"></th>
          </tbody>
        </tr>
        <tr>
          <th><span class="error4 error">*</span> User Name:</th>
          <th><input type="text" id="user_name" name="user_name"></th>
        </tr>
        <tr>
          <th><span class="error5 error">*</span> Password:</th>
          <th><input type="password" id="pwd" name="pwd"></th>
        </tr>
        <tr>
          <th><span class="error6 error">*</span> Confirm Password:</th>
          <th><input type="password" id="conf_pwd" name="conf_pwd"></th>
        </tr>


      </tbody>
    </table>
    <button type="submit" id="sign_up_submit" class="btn btn-primary btn-lg btn-block">Submit!</button>
  </form>
</div>
<script type="text/javascript">
  $("#signup_floater").hide()
  $(".error1").hide()
  $(".error2").hide()
  $(".error3").hide()
  $(".error4").hide()
  $(".error5").hide()
  $(".error6").hide()

</script>

<div id="login_floater">
  <h1>Login</h1>
    <form action="auth_user.php?auth=login" method="post">
    <table class="table">
      <tbody>
        <tr>
          <th>User Name:</th>
          <th><input type="text" id="user_name" name="user_name"></th>
        </tr>
        <tr>
          <th>Password:</th>
          <th><input type="password" id="pwd" name="pwd"></th>
        </tr>
      </tbody>
    </table>
    <button type="submit" id="sign_up_submit" class="btn btn-primary btn-lg btn-block">Submit!</button>
  </form>
</div>
<script type="text/javascript">$("#login_floater").hide()</script>







<!--Start of header part-->
<?php
include('./dbConnection.php');
include('./MainInclude/header.php');
?>
<!--End of header part-->

<!--Start Course page banner-->
<div class="container-fluid bg-dark">
    <div class="row">
      <img src="./image/coursebg.jpg" alt="Courses" style="height:500px; width:100%; object-fit:covers; box-shadow:10px;" />
    </div>

</div><br>
<!--End Course page banner-->

<!--Content-->
<div class="container jumnotron mb-5">
  <div class="row">
    <div class="col-md-4">
        <h5 class="mb-3">If Already Registered !! Login</h5>
    <form role="form" id="LoginForm">
        <div class="form-group">
          <label for="logemail" class="pl-2 font-weight-bold">Email</label>
          <small id="statusLogMsg1"></small>
          <input type="email" class="form-control" placeholder="Email" id="logemail" name="logemail">
      </div>  
      <div class="form-group">
          <label for="logpwd" class="pl-2 font-weight-bold">Password</label>
          <input type="password" class="form-control" placeholder="Password" id="logpwd" name="logpwd">
      </div> 
    <button type="button" class="btn btn-primary" id="userLoginBtn" onclick="checkLogin()">Login</button>
    </form><br/>
    <small id="statusLogMsg"></small>
  </div>

<div class="col-md-6 offset-md-1">
    <h5 class="mb-3">New User</h5>
    <form role="form" id="RegForm">
    <div class="form-group">
      <label for="reguname" class="pl-2 font-weight-bold">Username:</label>
      <small id="statusMsg1"></small>
      <input type="text" class="form-control" id="reguname" placeholder="Enter username" name="reguname" required>
    </div>
    <div class="form-group">
      <label for="regemail" class="pl-2 font-weight-bold">Email</label>
      <small id="statusMsg2"></small>
      <input type="email" class="form-control" id="regemail" placeholder="Enter Email" name="regemail" required>
    </div>
    <div class="form-group">
      <label for="regpwd" class="pl-2 font-weight-bold">Password:</label>
      <small id="statusMsg3"></small>
      <input type="password" class="form-control" id="regpwd" placeholder="Enter password" name="regpwd" required>
    </div>
    <button type="button" class="btn btn-primary" onclick="adduser()" id="signup">Sign Up</button>
  </form><br>
  <small id="successMsg"></small>
</div>
</div><!--div row close from header-->
</div><!--div container-fluid close from header -->
<hr/>
<?php 
include('./contact.php');
?>
<!--Start of footer part-->
<?php
include('./MainInclude/footer.php');
?>
<!--End of footer part-->

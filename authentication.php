<?php 
session_start();


if (isset($_SESSION['login_user'])) {
    header('Location:index.php');
}
?>
<!doctype html>
<html lang="en">
<?php 
  include ('x-head.php')
?>
  <body>
     <?php 
 include('x-header.php');
 ?>


    <div class="container">
      <div class="row">
    <div class="col" style=" border: 1px solid #1d8f1d; border-radius:5px 0px 0px 5px">
    
    <div class="text-center" style="padding:20%">
      <h2>SAKA</h2>
      <img src="img/icon1.png" width="80%">
    </div>
    </div>
    <div class="col" style=" background-color: #f0f0f0; border: 1px solid #1d8f1d; border-radius:0px 5px 5px 0px;" >
         <form class="form-signin" id="authentication_form" method="POST">
  <div class="text-center mb-4">
    <img class="mb-4"  src="img/logo.png" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="inputEmail">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <input type="hidden" name="operation" value="submit_login">
  <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1d8f1d" name="submit_login">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; <?php
            $fromYear = 2019; 
            $thisYear = (int)date('Y'); 
            echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> CVSU Main Indang - Saka, All rights reserved</p>
</form>
    </div>
  </div>

    </div>

</body>
<?php 
include('x-script.php');
?>
<script type="text/javascript">
   $(document).on('submit', '#authentication_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"data-login.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                type:  'html',
                success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                      alert(newdata.success);
                     window.location.assign("dashboard/");
                  }
                  else{
                    alert(newdata.error);
                  }
                }
              });
           
          });
</script>
</html>

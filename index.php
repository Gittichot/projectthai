<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Main Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/login.css">   
</head>

<body >
<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="./Check.php" method="POST">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text" name="username"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password" name="password"  Placeholder="Password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and lowercase letter, and at least 8 or more characters" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Login"></span>
                            </div>
                            

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">ThaiOrange Store
          
          <div class="clearfix"></div>
      </div>
      
      </div>
      <footer class="text-white">Powered by Harit Kumsan Software Engineering LPRU</footer>
</center>
    </div>

</div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="./js/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="./DataTables/datatables.min.js" crossorigin="anonymous"></script>
    <script src="./js/DataTable.js"></script>
    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script> 
    
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
        function varticalCenterStuff() {
    var windowHeight = $(window).height();
    var loginBoxHeight = $('.login-box').innerHeight();
    var welcomeTextHeight = $('.welcome-text').innerHeight();
    var loggedIn = $('.logged-in').innerHeight();
  
    var mathLogin = (windowHeight / 2) - (loginBoxHeight / 2);
    var mathWelcomeText = (windowHeight / 2) - (welcomeTextHeight / 2);
    var mathLoggedIn = (windowHeight / 2) - (loggedIn / 2);
    $('.login-box').css('margin-top', mathLogin);
    $('.welcome-text').css('margin-top', mathWelcomeText);
    $('.logged-in').css('margin-top', mathLoggedIn);
}
$(window).resize(function () {
    varticalCenterStuff();
});
varticalCenterStuff();

// awesomeness
$('.btn-login').click(function(){
    $(this).parent().fadeOut(function(){
        $('.login-box').fadeIn();
    })
});

$('.btn-cancel-action').click(function(e){
    e.preventDefault();
    $(this).parent().parent().parent().fadeOut(function(){
        $('.welcome-text').fadeIn();
    })
});

$('.btn-login-submit').click(function(e){
  e.preventDefault();
 
  var element = $(this).parent().parent().parent();
  
  var usernameEmail = $('#username-email').val();
  var password = $('#password').val();
  
  if(usernameEmail == '' || password == ''){
    
    // wigle and show notification
    // Wigle
    var element = $(this).parent().parent().parent();
    $(element).addClass('animated rubberBand');  
    $(element).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(element).removeClass('animated rubberBand');
    });
    
    // Notification
    // reset
    $('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.login-alert').addClass('notification-show animated bounceInRight');
    
    $('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.login-alert').addClass('animated bounceOutRight');
        }, 2000);
    });
  }else{
    $(element).fadeOut(function(){
      $('.logged-in').fadeIn();
    });
  }//endif
});


$('.btn-logout').click(function(){
   $('.logged-in').fadeOut(function(){
     $('.welcome-text').fadeIn();
     // Notification
     $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.logged-out').addClass('notification-show animated bounceInRight');
    
    $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.logged-out').addClass('animated bounceOutRight');
        }, 2000);
    });
     
   });
});
    </script>
</body>

</html>
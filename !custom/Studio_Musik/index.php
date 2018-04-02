<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/regis.css"/>
    

</head>

<body>
  <nav>
      <ul>
        <div id="warna">
        <h2><b>STUDIO OF MUSIC</b></h2></div>
        <li><a href="#">Login</a></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
  </nav>

  <div class="form">
    <div id="login">   
    <h1>Welcome!</h1>
          
      <form action="/" method="post">
      <div class="field-wrap">
        <label>
        Email Address<span class="req">*</span>
        </label>
        <input type="email"required autocomplete="off"/>
      </div>
          
      <div class="field-wrap">
        <label>
        Password<span class="req">*</span>
        </label>
        <input type="password"required autocomplete="off"/>
        <br>

		<input type="checkbox" name="remember" id="remember" class="vhide">
    	<label for="remember">
      	<i class="octicon octicon-check"></i> Remember all the things
    	</label>


       <p><label class="checkbox"></p>
        

        </br>
        </label>
      </div>
                
      
        <button class="button button-block"/>Log In</button>
        <br>
          <div class="or-box">
            <span class="or">OR</span>
          <div class="row"></br>

          <ul class="tab-group">
          <li class="tab active"><a href="#Regis Pemilik">Regis Pemilik</a></li>
          <li class="tab"><a href="#Regis User">Regis User</a></li>
          </ul>
      
          </div>
          </div>
          
          
      </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
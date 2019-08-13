<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
   <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="resources/css/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="resources/css/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="resources/css/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="resources/css/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="resources/css/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="resources/css/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="resources/css/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="resources/css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="resources/css/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body style="background: #F7F7F7;">
    
    <div class="container">
      <div class="row text-center ">
        <div class="col-md-12">
          <br /><br />
          <h2>Login Page</h2>
          
          <br />
        </div>
      </div>
      
      <div class="row"> 
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <strong>   Masukan Username dan Password </strong>
            </div>
            <div class="panel-body text-center">
              <form role="form" action="proses_login.php" method="POST">
                <br />
                
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                  <input type="text" name="username" class="form-control" placeholder="Your Username " required
                  oninvalid="this.setCustomValidity('Username Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                </div>
                
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                  <input type="password" name="password" class="form-control"  placeholder="Your Password" required
                  oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong !')" oninput="setCustomValidity('')"/>
                </div>
                
                <input type="submit" name="login" value="Login Now" class="btn btn-primary">
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
  </body>
</html>
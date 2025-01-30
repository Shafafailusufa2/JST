<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" type="image/png" href="<?php base_url() ?>assets/images/jst.png">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jaringan Syaraf Tiruan bBackpropagation">
    <meta name="author" content="Arman Septian">
    <link rel="stylesheet" href="<?php base_url();?>assets/css/mycss.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/css/mycss.css">
   

</head>
<body class=" theme-blue">
    
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <span class="navbar-brand"><img src='<?php base_url()?>assets/images/kareem.jpg' height='30' width='40'></span></div>
          <span id="spanSMK" class="navbar-brand"> Aplikasi Prediksi Jumlah Calon Santri Yayasan Kareem Bil Qur'an Depok</span>
        <div class="navbar-collapse collapse" style="height: 1px;">
        </div>
      </div>
    </div>

    <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Login</p>
            <div class="panel-body">
            <form id="form_user" method="post" enctype="multipart/form-data" action="<?php base_url();?>login/cek_login/">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="usernameLogin" placeholder="Username" class="form-control" 
                    required="required" oninvalid="this.setCustomValidity('Masukan username anda')" oninput="this.setCustomValidity('')" />
                </div> 
                
                <div class="input-group top15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="passwordLogin"  placeholder="Password" class="form-control" 
                    required="required" oninvalid="this.setCustomValidity('Masukan password anda')" oninput="this.setCustomValidity('')"/>
                </div>

                <input id="login-btn" type="submit" class="btn btn-primary pull-right" value="Login" name="submit">
            </form>
            </div>
    </div>
    <!-- <p class="pull-right" style=""><a href="http://gmail.com" target="blank" style="font-size: .75em; margin-top: .25em;">Design by alternate.septian@gmail.com</a></p> -->
</div>

<!-- Css Login Validation -->
<style type="text/css">

        .panel-body{
            padding: 20px;

        }

        .input-group{
            margin-top: 20px;
        }


        #login-btn{
            margin-top: 20px;
        } 
</style>

<!-- Php Javascript dialog pesan error -->
<?php
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
        
        echo '<script language="javascript">';
        echo 'var a = confirm("Username atau Password salah");';
        echo 'if(a === true){';
        echo 'window.location="login";';
        echo '}else{';
        echo 'console.log("Cancel");';
        echo "}";
        echo "</script>";
    }
}
?>

</body></html>

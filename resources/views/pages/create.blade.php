<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DuGiaMusic | Đăng ký</title>
  <base href="{{asset('')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="admin_asse/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_asse/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin_asse/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asse/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin_asse/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{'indexx'}}"><b>DuGiaMusic</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Đăng ký thành viên mới</p>
    <?php if (count($errors) > 0): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors->all() as $err): ?>
          <li>{{$err}}</li>
        <?php endforeach?>
      </div>
    <?php endif ?>
    <?php if (session('message')): ?>
      <div class="alert alert-info">
        {{session('message')}}
      </div>
    <?php endif?>
    <form action="createacc" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}" pattern=".{2,}" required title="Tên của bạn phải có từ 2 ký tự trở lên">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="tel" pattern="^[0-9\-\+\s\(\)]*$" class="form-control" placeholder="Số điện thoại" name="phone" value="{{old('phone')}}" required title="Số điện thoại chỉ bao gồm số.">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Địa chỉ"  name="address" value="{{old('address')}}"  required>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="Email" value="{{old('Email')}}"  required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" pattern=".{6,32}" required title="Mật khẩu phải có từ 6 đên 32 ký tự">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu" name="ConfirmPassword"  required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block ">Đăng ký</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
   <hr>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="admin_asse/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin_asse/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="admin_asse/plugins/iCheck/icheck.min.js"></script>

<!-- confirm password -->
<script type="text/javascript">
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Nhập lại mật khẩu không đúng");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>

<script>
    $(".alert").delay(3000).slideUp();
</script>


</body>
</html>

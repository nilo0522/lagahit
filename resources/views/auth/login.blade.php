
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Biker</b>RENTAL</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="Login()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
     

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    const  Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
  const Login = async () =>
  {
    let email = $('#email').val()
    let password = $('#password').val()
    if(email === '')
    {
        Toast.fire({
        icon: 'error',
        title: ' <span class="text-danger ml-3">Email is required*</span>'
      })
        return false
    }
    if(password === '')
    {
        Toast.fire({
        icon: 'error',
        title: ' <span class="text-danger ml-3">Password is required*</span>'
      })
        return false
    }
    
    let data = new FormData()
     data.append('email',email)
     data.append('password',password)
     try{
      axios.post('api/login',data).then(response =>{
        window.localStorage.setItem(response.data.role,response.data.access_token)
        Swal.fire(
                'Login Successfull',
                ' ',
                'success',
                )
               
        switch(response.data.role)
            {
                case 'Admin':
                    window.location.href="admin"
            }
                
     }).catch(function(error){
        if (error.response) {
           if(error.response.status == 500)
           {
            Toast.fire({
                icon: 'error',
                title: ' <span class="text-danger ml-3">Ooops no connection</span>'
            }) 
            return false
           }
           
           Toast.fire({
                icon: 'error',
                title: ' <span class="text-danger ml-3">'+error.response.data.message+'</span>'
            })
    }
     })  
     }
     catch (error)
     {
        console.log(error.toJson.data)
     }
  }
    

</script>
</body>
</html>

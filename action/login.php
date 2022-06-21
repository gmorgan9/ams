<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/bell-regular.svg"> -->

    <!-- Custom Styles -->
    <link rel="stylesheet" href="../assets/css/style.css?v=2.0">

    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login - AMS</title>

    <style>
        body {
          background: #ABCDEF;
          font-family: Assistant, sans-serif;
          display: flex;
          min-height: 90vh;
        }
        .login {
    color: white;
    background: #136a8a;
    background: 
      -webkit-linear-gradient(to right, #267871, #136a8a);
    background: 
      linear-gradient(to right, #267871, #136a8a);
    margin: auto;
    box-shadow: 
      0px 2px 10px rgba(0,0,0,0.2), 
      0px 10px 20px rgba(0,0,0,0.3), 
      0px 30px 60px 1px rgba(0,0,0,0.5);
    border-radius: 8px;
    padding: 50px;
  }
  .login .head {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .login .head .title {
    font-size: 2.2em;
  }
  .login .msg {
    text-align: center;
  }
  .login .form input[type=text].text {
    border: none;
    background: none;
    box-shadow: 0px 2px 0px 0px white;
    width: 100%;
    color: white;
    font-size: 1em;
    outline: none;
  }
  .login .form .text::placeholder {
    color: #D3D3D3;
  }
  .login .form input[type=password].password {
    border: none;
    background: none;
    box-shadow: 0px 2px 0px 0px white;
    width: 100%;
    color: white;
    font-size: 1em;
    outline: none;
    margin-bottom: 20px;
    margin-top: 20px;
  }
  .login .form .password::placeholder {
    color: #D3D3D3;
  }
  .login .form .btn-login {
    background: none;
    text-decoration: none;
    color: white;
    box-shadow: 0px 0px 0px 2px white;
    border-radius: 3px;
    padding: 5px 2em;
    transition: 0.5s;
  }
  .login .form .btn-login:hover {
    background: white;
    color: dimgray;
    transition: 0.5s;
  }
  .login .forgot {
    text-decoration: none;
    color: white;
    float: right;
  }
    </style>
</head>
<body>

<section class="login" id="login">
  <div class="head">
  <h1 class="title">Universe Explorer</h1>
  </div>
  <p class="msg">Welcome back</p>
  <div class="form">
    <form action="login.php" method="post">
  <input type="text" placeholder="Enter Username..." class="text" id="username" required><br>
  <input type="password" placeholder="Enter Password..." class="password"><br>
  <a href="#" class="btn-login" id="do-login">Login</a>
  <a href="#" class="forgot">Forgot?</a>
    </form>
  </div>
</section>
    
</body>
</html>
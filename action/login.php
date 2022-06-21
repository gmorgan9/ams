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
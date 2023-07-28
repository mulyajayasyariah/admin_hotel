<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Syariah Group - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
    body {
      background-image: url('background-image.jpg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }

    .login-form {
      width: 300px;
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      margin-top: 100px;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      background: #f2f2f2;
      border: none;
      border-radius: 5px;
      margin-bottom: 20px;
      box-sizing: border-box;
      color: #333;
    }

    .login-form input[type="text"]::placeholder,
    .login-form input[type="password"]::placeholder {
      color: #999;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      background: #4caf50;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    .login-form button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h2>Login</h2>
    <input type="text" placeholder="Username" />
    <input type="password" placeholder="Password" />
    <button>Login</button>
  </div>
</body>

</html>
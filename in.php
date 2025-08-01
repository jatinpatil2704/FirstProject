
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background: #fff;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      border-radius: 10px;
      width: 300px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-container input[type="text"],
    .login-container input[type="Password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-container input[type="submit"] {
      width: 100%;
      background: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-container input[type="submit"]:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form action="validate.php" method="POST">
      <input type="text" name="Username" placeholder="Username" required />
      <input type="Password" name="Password" placeholder="Password" required />
      <input type="submit"  value="Login" >
    </form>
  </div>

</body>
</html>
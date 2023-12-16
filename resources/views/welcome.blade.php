<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChatApp - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
    
    
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" id="icon" alt="User Icon" />
      </div>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('chat') }}">
        @csrf
        <input type="text" id="login" class="fadeIn second shadow mb-4" name="username" placeholder="Enter User Name">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
  
    </div>
  </div>


    
</body>
</html>
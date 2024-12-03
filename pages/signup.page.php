<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/signin.css">
</head> 
<body>

    <div class="card">
      <div class="bg">
      <form action="../config files/signup.inc.php" method="post">
        <div id="signup-card" class="info-card">
          <h1 class="title">SIGNUP</h1>
          <div class="group">
      <svg class="icon" width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#000000" fill="none"><circle cx="32" cy="18.14" r="11.14"/><path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"/></svg>
      <input class="input" type="text" placeholder="username" name="username" required>
    </div>
      
    <div class="group">
      <svg class="icon" width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#000000" fill="none"><circle cx="32" cy="18.14" r="11.14"/><path d="M54.55,56.85A22.55,22.55,0,0,0,32,34.3h0A22.55,22.55,0,0,0,9.45,56.85Z"/></svg>
      <input class="input" type="email" placeholder="Email" name="email" required>
    </div>
      <div class="group">
        <svg stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="icon">
        <path d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" stroke-linejoin="round" stroke-linecap="round"></path>
      </svg>
      <input required id="passInput" class="input" type="password" placeholder="password" name="password">    </div>
      <button class="signBtn" type="submit" name="submit" value="submit">Sign up</button>
      <p class="member">Are you a member?? <a href="login.page.php">Login here</a></p>

        </div>
      </form>
        
      </div>
      <div class="blob"></div>
    </div>
    
    
</body>
<script src="index.js"></script>
</html>
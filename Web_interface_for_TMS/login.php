<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="Login_Style.css" />
<title>Login page</title>
</head>
<body>
<div class="general_Div">
  <header><h1>Transportation Management System</h1></header>
  <div class="left_div"><img src="images/Bus.jpg" alt="" class="img_left" /></div>
  <div class="right_div">
    <div class="login_here"><h1>Login here</h1></div>
    <div class="enternal_div">
      <form id="loginForm" action="authenticate.php" method="POST" onsubmit="return showSpinner()">
        <select name="role" id="role" class="user_option" required>
          <option value="">Select Role</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
        <div class="e_p_div">
          <label class="User_label">User Name</label><br />
          <input class="uesr_inp" type="text" id="username" name="username" required /><br />
          <label class="password_label">Password</label><br />
          <input class="pass_inp" type="password" id="password" name="password" required />
        </div>
        <div class="login_div">
          <button type="submit" class="login">Login</button>
          <p id="error" class="error"></p>
        </div>
      </form>
      <div class="forget"><a href="">Forget password</a></div>
    </div>
  </div>
  <footer class="login-footer"><p>&copy; 2025 Transportation Management System | All Rights Reserved</p></footer>
</div>

<!-- Spinner Overlay -->
<div class="spinner-overlay" id="spinnerOverlay">
  <div class="spinner"></div>
  <div class="welcome-text">connecting to server...</div>
</div>
<script>
function showSpinner() {
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();
  const role = document.getElementById("role").value;
  const error = document.getElementById("error");
  const spinner = document.getElementById("spinnerOverlay");

  if (!username || !password || !role) {
    error.textContent = "Please fill all fields.";
    return false; // prevent submission
  }

  error.textContent = "";
  spinner.classList.add("active"); // show spinner immediately

  // Wait 1 second, then submit the form to go to next page
  setTimeout(() => {
    document.getElementById("loginForm").submit();
  }, 1000);

  return false; // prevent immediate submission
}
</script>
</body>
</html>

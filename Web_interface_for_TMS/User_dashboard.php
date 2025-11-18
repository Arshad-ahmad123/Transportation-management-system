<?php
session_start();
if (!isset($_SESSION['User_Name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="user_body">
  <div class="User-container">
    <h2 class="h2_user">Welcome, <?php echo $_SESSION['User_Name']; ?> 👋</h2>
    <p>Role: <?php echo $_SESSION['Role']; ?></p>
    <p>Company ID: <?php echo $_SESSION['Com_ID']; ?></p>

    <p><b>You are logged in as a normal user.</b></p>

    <form method="post" action="logout.php">
      <button type="submit" class="btn_user">Logout</button>
    </form>
  </div>
</body>
</html>

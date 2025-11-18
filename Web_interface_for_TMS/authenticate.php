<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $query = "SELECT * FROM User_Login WHERE User_Name = ? AND Role = ?";
    $params = array($username, $role);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // 🔒 For real system use password_hash() + password_verify()
        if ($row['Password'] == $password) {
            $_SESSION['User_Name'] = $row['User_Name'];
            $_SESSION['Role'] = $row['Role'];
            $_SESSION['Com_ID'] = $row['Com_ID'];
                if ($role === "Admin") {

            header("Location: Home.php");
        } else {
            header("Location: User_dashboard.php");
        }

            exit();
        } else {
            echo "<script>alert('Invalid Password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or Role'); window.location.href='login.php';</script>";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>

<?php
if (isset($_POST['login-submit'])) {

    require "conn.php";

    $mail = $_POST['mail'];
    $password = $_POST['pwd'];
    $sql = "SELECT * FROM staff WHERE email=? AND pwd=?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $mail, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['staffid'] = $row['Staff_ID'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'Owner') {
                header("Location: ../viewstaff.php?login=success");
            }

            else {
                header("Location: ../checkin.php?login=success");
            }
        }
        else {
            header("Location: ../login.php?error=wrongpwd");
            exit();
        }

    }
}
else {
    header("Location: ../login.php");
    exit();
}

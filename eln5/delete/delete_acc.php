<?php
session_start();
$u_name = $_SESSION['u_name'];

//session idのチェック
include("funcs.php"); //今は同じ階層なのでこの書き方でOK
loginCheck();

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete your account</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
</head>

<body>

    <!-- Head[Start] -->
    <header class="h_kern">
        <h1 class="logo_title">MR.Database</h1>
        <nav class="kern_nav">
            <ul class="kern_nav_list">
                <li><a href="select_log.php">All list</a></li>
                <li><a href="kern.php">Contribute</a></li>
                <li><a href="select_u.php">Edit/Delete</a></li>
                <li><a href="user_index.php">Back to Top</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="del_acc_ex">
        <div class="del_acc_title">
            <h3>If you delete your account</h3>
            <div class="logo_cry">
            </div>
        </div>
        <ul>
            <li>You can't regain access to your account.</li>
            <li>It may take up to 90 days from the beginning of the deletion process to delete your account information. Copies of your information may also remain after the 90 days in the backup storage that we use to recover in the event of a disaster, software error, or other data loss event. Your information isn't available to you on MR.database during this time.</li>
            <li>Your contributed Kern Data will remain in MR.database. If you want to delete your contributed data, please go to <a href="select_u.php">Edit/Delete</a> and delete data that you would not like to leave.</li>
        </ul>
    </div>
    <form method="post" action="delete_acc_act.php" name="delete_acc_form" id="delete_acc_form">
        <div class="agree_btn">
            <input class="con_pass" type="text" name="u_pw" placeholder="Passward">
            <input type="submit" value="Delete my account" id="delete_acc_btn">
        </div>
    </form>
    <!-- Main[End] -->

    <script>
        $("#delete_acc_form").submit(function() {
            if ($("input[name='u_pw']").val() == '') {
                alert('Oops!! Please enter your password!');
                return false;
            } else {
                if (!confirm('Do you really want to delete your MR.database account?')) {
                    /*　キャンセルの時の処理 */
                    return false;
                } else {
                    $("#delete_acc_form-form").submit();
                }
            }

        });
    </script>

</body>

</html>
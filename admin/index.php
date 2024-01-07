<!-- including db_connect -->
<?php
    require('include/essential.php');
    require('include/db_connect.php');
    session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect(index.php);
    }
?>
<!-- head section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('include/link.php');?>
    <style>
        div.login-form {
            position: absolute ;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width:400px;
        }
    </style>
</head>
<!-- Admin Login Frontend -->
<body class="bg-light">
    <div class="login-form  text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_password" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow_none me-auto">Login</button>
                <a href="../rooms.php"  class="btn text-white custom-bg shadow_none ms-auto">Go Back</a>
            </div>
        </form>
    </div>



<!-- Admin Login -->
<?php
    if(isset($_POST['login']))
    {
        $form_data = filteration($_POST);
        $query = "SELECT * FROM `admin` WHERE `admin_name`=? AND `admin_password`=?";
        $values = [$form_data['admin_name'],$form_data['admin_password']];
        $res = select($query,$values,"ss");
        if($res->num_rows==1){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['adminLogin']=true;
            $_SESSION['adminId'] = $row['admin_serialno'];
            redirect('rooms.php');
        }
        else{
            alert('error','Login failed- Invalid Admin Name or Password');
        }
    }
?>
<?php require ('include/scripts.php');?>
</body>
</html>
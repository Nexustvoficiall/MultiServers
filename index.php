<?php
session_start();
include('includes/functions.php');

$log_check = $db->select('users', '*', 'id = :id', '', [':id' => 1]);
$loggedinuser = !empty($log_check) ? $log_check[0]['username'] : null;

if (!empty($loggedinuser) && isset($_SESSION['name']) && $_SESSION['name'] === $loggedinuser) {
    header("Location: dns.php");
    exit;
}

$data = ['id' => '1', 'username' => 'Emerson1365', 'password' => password_hash('Isah1365@', PASSWORD_DEFAULT)];
$db->insertIfEmpty('users', $data);

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $userData = $db->select('users', '*', 'username = :username', '', [':username' => $username]);
    if ($userData) {
        $storedPassword = $userData[0]['password'];
        $enteredPassword = $_POST["password"];
        if (password_verify($enteredPassword, $storedPassword)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_POST['username'];
            header('Location: dns.php');
        } else {
            header('Location: ./api/index.php');
        }
    } else {
        header('Location: ./api/index.php');
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bet3">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/multi-theme.css">
    <title>Multi Servers - Panel</title>
</head>
<style>
body{
    background-color: #181828;
    /* Prefer PNG if available, fallback to JPEG */
    background-image: url("./img/bg.png"), url("./img/bg.jpeg"), url("./img/bg.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #cfcfcf;
}

#particles-js{
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
  background: #8000FF;
  display: flex;
  justify-content: center;
  align-items: center;
}

.particles-js-canvas-el{
  position: fixed;
}
</style>
<style>
html, body { height: 100%; }
.login-wrapper{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.login-box{
    width: 100%;
    max-width: 900px;
    transform: translateY(40px);
}

.logo-img{max-width:320px;width:100%;height:auto;}
.login-panel{background: rgba(11,11,15,0.6); padding:24px; border-radius:8px; box-shadow:0 8px 30px rgba(0,0,0,0.6);} 
.login-form .form-control{font-size:1.05rem;padding:12px 14px}
.login-form .btn{font-size:1.05rem;padding:10px 14px}
</style>
</style>
<body>
<div id="js-particles"></div>
<div class="login-wrapper">
    <div class="container login-box">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img class="logo-img p-3" src="./img/ic_launcher.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="login-panel">
                    <form method="post" class="login-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <input type="submit" class="btn btn-warning btn-block" value="Log In" name="login">
                    </form>
                    <div class="text-center mt-3"><a class="list-grup-item" href="https://t.me/" target="_blank">&nbsp;&nbsp;&copy; <?=date("Y")?> Multi Servers</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="js/particles.js"></script>
</body>
</html>

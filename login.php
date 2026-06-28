<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin123"){

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;

    }else{

        echo "<script>
        alert('Username atau Password Salah!');
        </script>";

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Admin</title>

<link rel="stylesheet" href="assets/style.css">

<style>

body{
    background:#fff5f7;
}

.login-box{

    width:420px;

    margin:70px auto;

    background:white;

    padding:30px;

    border-radius:12px;

    box-shadow:0px 0px 15px rgba(0,0,0,.2);

}

.login-box h2{

    text-align:center;

    color:#800020;

    margin-bottom:25px;

}

.login-box input{

    width:100%;

    padding:12px;

    margin-top:8px;

    margin-bottom:18px;

    border:1px solid #ccc;

    border-radius:6px;

    font-size:17px;

}

.login-box button{

    width:100%;

    padding:12px;

    border:none;

    border-radius:6px;

    background:#800020;

    color:white;

    font-size:18px;

    font-weight:bold;

    cursor:pointer;

}

.login-box button:hover{

    background:#5c0017;

}

.judul{

    text-align:center;

    margin-top:30px;

    color:#800020;

}

</style>

</head>

<body>

<header>

<div class="header">

<div class="header-text">

<h1>Sistem Pendataan Buku</h1>

<p>Login Administrator</p>

</div>

</div>

</header>

<div class="login-box">

<h2>LOGIN</h2>

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
placeholder="Masukkan Username"
required>

<label>Password</label>

<input
type="password"
id="password"
name="password"
placeholder="Masukkan Password"
required>

<input type="checkbox" onclick="lihatPassword()">
Tampilkan Password

<br><br>

<button
type="submit"
name="login">

LOGIN

</button>

</form>

</div>

<footer>

<p>© 2026 Sistem Pendataan Buku</p>

</footer>

<script>

function lihatPassword(){

    var x=document.getElementById("password");

    if(x.type==="password"){

        x.type="text";

    }else{

        x.type="password";

    }

}

</script>

</body>
</html>

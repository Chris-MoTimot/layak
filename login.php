<?php
session_start();
include 'koneksi.php';

// Jika sudah login, langsung lempar ke dashboard
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']); 

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Yayasan LAYAK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #003366;
            --blue: #00a8e8;
            --orange: #e67e22;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--navy) 0%, var(--blue) 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h2 {
            color: var(--navy);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .login-container p {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 20px;
            display: block;
            text-decoration: none;
        }

        .logo-text span {
            color: var(--orange);
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 13px;
            color: var(--navy);
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: var(--blue);
        }

        button {
            width: 100%;
            padding: 12px;
            background: var(--navy);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background: var(--orange);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(230, 126, 34, 0.4);
        }

        .error-msg {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }

        .back-link:hover {
            color: var(--navy);
        }
    </style>
</head>
<body>

<div class="login-container">
    <a href="index.php" class="logo-text">LAYAK<span>.org</span></a>
    <h2>Admin Login</h2>
    <p>Silakan masuk untuk mengelola konten.</p>

    <?php if(isset($error)): ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>
        
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" name="login">Masuk ke Dashboard</button>
    </form>

    <a href="index.php" class="back-link">← Kembali ke Beranda</a>
</div>

</body>
</html>
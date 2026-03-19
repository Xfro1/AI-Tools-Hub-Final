<?php
session_start();
$lang = $_GET['lang'] ?? 'ar';
$dir = ($lang == 'ar') ? 'rtl' : 'ltr';

// نصوص الواجهة
$labels = [
    'ar' => ['title' => 'تسجيل الدخول', 'email' => 'البريد الإلكتروني', 'password' => 'كلمة المرور', 'btn' => 'دخول'],
    'en' => ['title' => 'Login', 'email' => 'Email', 'password' => 'Password', 'btn' => 'Login']
];
$l = $labels[$lang];

// عند الضغط على دخول
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['user_logged_in'] = true;
    header("Location: index.php?lang=$lang");
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $l['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: var(--bg-color); margin: 0; }
        .login-card { 
            background: var(--white); padding: 40px; border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 400px;
            border-top: 5px solid var(--primary-color);
        }
        .login-card h2 { margin-bottom: 25px; color: var(--text-dark); text-align: center; }
        .input-box { margin-bottom: 20px; text-align: <?php echo $dir == 'rtl' ? 'right' : 'left'; ?>; }
        .input-box label { display: block; margin-bottom: 8px; color: var(--text-gray); font-weight: bold; }
        .input-box input { 
            width: 100%; padding: 12px; border: 2px solid #edf2f7; 
            border-radius: 10px; box-sizing: border-box; outline: none;
        }
        .input-box input:focus { border-color: var(--primary-color); }
        .submit-btn { 
            width: 100%; padding: 14px; background: var(--secondary-gradient); 
            color: white; border: none; border-radius: 10px; font-weight: 600; 
            cursor: pointer; transition: 0.3s;
        }
        .submit-btn:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="login-card">
        <h2><?php echo $l['title']; ?></h2>
        <form method="POST">
            <div class="input-box">
                <label><?php echo $l['email']; ?></label>
                <input type="email" name="email" required placeholder="example@mail.com">
            </div>
            <div class="input-box">
                <label><?php echo $l['password']; ?></label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="submit-btn"><?php echo $l['btn']; ?></button>
        </form>
    </div>
</body>
</html>
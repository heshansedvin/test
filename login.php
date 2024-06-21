<?php
session_start();

// Initialize KeyAuth API
$KeyAuthApp = new KeyAuthApp("YOUR_APP_NAME", "YOUR_APP_SECRET");

// Check if user is logged in
if ($KeyAuthApp->validate()) {
    header("Location: index.php");
    exit;
}

// Login form
if (isset($_POST["license_key"])) {
    if ($KeyAuthApp->license($_POST["license_key"])) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid license key";
    }
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="license_key">License Key:</label>
        <input type="text" id="license_key" name="license_key"><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) {?>
        <p style="color: red;"><?php echo $error;?></p>
    <?php }?>
</body>
</html>
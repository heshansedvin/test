<?php
session_start();

// Initialize KeyAuth API
$KeyAuthApp = new KeyAuthApp("Bishan18", "uMo5GzEQ1E");

// Check if user is logged in
if (!$KeyAuthApp->validate()) {
    header("Location: login.php");
    exit;
}

// Get user data
$user_data = $_SESSION["user_data"];

// Display user data
?>
<html>
<head>
    <title>REGz CHEAT</title>
</head>
<body>
    <h1>REGz CHEAT</h1>
    <p>Username: <?php echo $user_data["username"];?></p>
    <p>Subscriptions:</p>
    <ul>
        <?php foreach ($user_data["subscriptions"] as $subscription) {?>
            <li>Subscription: <?php echo $subscription->subscription;?> - Expiry: <?php echo date("Y-m-d H:i:s", $subscription->expiry);?></li>
        <?php }?>
    </ul>
</body>
</html>
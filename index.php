<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="card">

        <h2>Create Account</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message <?= $_SESSION['type'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
        <?php endif; ?>
        
        <form action="./api/register.process.php" method="POST">
            <div class="input-group">
                <input type="text" name="fullname" placeholder="Full Name" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>


    </div>
</body>

</html>
<?php 
    //make load.php later
    require_once 'scripts/functions.php';
    require_once 'scripts/login.php';
    require_once 'config/database.php';

    $ip = $_SERVER['REMOTE_ADDR'];
    // $attempts = $_POST['hidden']; // user login attempts

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!empty($username) && !empty($password)){
            //Log user in
            $message = login($username, $password, $ip);
        }else{
            // $attempts++;
            $message = 'Please fill out the required field';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>please input login credentials</h2>


    <?php echo !empty($message)? $message: ''; ?>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="">

        <button name="submit">Login</button>
    </form>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome admin</h2>

    <?php
        //timezone config
        date_default_timezone_set('America/Toronto');


        //connecting to db
        $conn = mysqli_connect('localhost', 'root', '','db_admin_research');
        //selecting user_date (last login)
        $sql_date = mysqli_query($conn, 'SELECT user_date FROM tbl_user');
        //formating date for user 
        $res_date = mysqli_fetch_row($sql_date);
        $last_login = date('d F Y H:i', strtotime($res_date[0]));
        //displaying last login date on page
        echo '<p>Last time logged in: '.$last_login.'</p>';


        // welcome messages and current time
        $hour = date('H');
        $currentTime = date("h:i a");

        if($hour < 11){
            echo '<h3> good morning </h3>
            <p>the current time is: '.$currentTime.'</p>';
        }if($hour >= 11 && $hour < '17'){
            echo '<h3> good afternoon </h3>
            <p>the current time is: '.$currentTime.'</p>';
        }else{
            echo '<h3> good evening </h3>
            <p>the current time is: '.$currentTime.'</p>';
        }
        

        // update user_date
        $currentDate = date('Y-m-d H:i:s');
        mysqli_query($conn, "UPDATE tbl_user SET user_date='".$currentDate."'");
        exit;


    ?>


</body>
</html>
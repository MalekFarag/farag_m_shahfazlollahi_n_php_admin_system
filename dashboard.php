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
        $conn = mysqli_connect('localhost', 'root', '','db_admin_research');
        $sql_date = mysqli_query($conn, 'SELECT user_date FROM tbl_user');

        $res_date = mysqli_fetch_row($sql_date);

        echo '<p>Last time logged in: '.$res_date[0].'</p>';

        // welcome messages
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



    ?>


</body>
</html>
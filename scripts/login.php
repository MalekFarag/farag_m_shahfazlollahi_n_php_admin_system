<?php 

function login($username, $password, $ip){
    //Debug
    // $message = sprintf('You are trying to login with username %s and password %s', $username, $password);

    $pdo = Database::getInstance()->getConnection();
    $message = '';

    // check user existance
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name= :username'; // sanitation
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute( // sanitation pt2
        array(
            ':username' => $username,
        )
    );

    if($user_set->fetchColumn()>0){
        //user exist
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
        $get_user_query .= ' AND user_pass = :password';
        $user_check = $pdo->prepare($get_user_query);
        $user_check->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );
    while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
        $id = $found_user['user_id'];

        // login successful
        $message = 'logged in successfully!';
        // updating database
        $update_query = 'UPDATE tbl_user SET user_ip = :ip WHERE user_id = :id';
        $update_set = $pdo->prepare($update_query);
        $update_set->execute(
                array(
                    ':ip'=>$ip,
                    ':id'=>$id
                )

        );
    }

    // if(isset($attempts<4)){
    //     $message = 'No more login attempts remaining.'
    // }

    if(isset($id)){
        redirect_to('dashboard.php');
    }

    }else{
        //user doesn't exit
        $message = 'user doesnt exist';
    }

    return $message;
}
<?php


/**
 * Authorization account
 */
function authization(
    string $email = '',
    string $password = ''
): array {
    global $db;
    $password = md5(md5($password));
    $user = $db->query(
        "SELECT * FROM `users` 
        WHERE `user_email` = '$email' 
        AND `user_password` = '$password'"
    )->fetch_assoc();
    if($user != null) {
        $userId = $user['user_id'];
        $timestamp = date('Y-m-d H:i:s');
        $access_token = hash('sha256', $userId.':'.$user['user_email'].':'.$user['user_password'].':'.$timestamp);
        $_SESSION['access_token'] = $access_token;
        $db->query("UPDATE `users` SET `user_access_token` = '$access_token' WHERE `user_id` = '$userId'");
        header('Location: /tasks');
    }

    return array(
        'status' => 'error',
        'message' => 'Неправильный пароль или E-Mail'
    );
}

/**
 * Create new account
 */
function register(
    string $name = '',
    string $surname = '',
    string $email = '',
    string $password = '',
    string $repeatPassword = ''
): array {
    global $db;

    function realEscapeString($str) {
        return preg_replace('/[^A-Za-zА-Яа-яҰүӨөҚқҢңҒғҮұӘәҺһІіЫы0-9.@_]/u', '', $str);
    }

    $name = realEscapeString($name);
    $surname = realEscapeString($surname);
    $email = realEscapeString($email);

    if(empty($name) | empty($surname) | empty($email) | empty($password) | empty($repeatPassword)) 
        return array(
            'status' => 'error',
            'message' => 'Не все поля заполены'
        );

    if(md5(md5($password)) != md5(md5($repeatPassword))) 
        return array(
            'status' => 'error',
            'message' => 'Пароли не совпадают'
        );

    if($db->query(
        "SELECT user_id FROM users WHERE `user_email` = '$email'"
    )->fetch_assoc() != null)
        return array(
            'status' => 'error',
            'message' => 'Пользователь с таким E-Mail существует'
        );

    $password = md5(md5($password));

    return array(
        'status' => 'success',
        'message' => $db->query(
            "INSERT INTO `users`
            (`user_name`, `user_surname`, `user_email`, `user_password`) 
            VALUES ('$name','$surname','$email','$password')"
        )
    );
}

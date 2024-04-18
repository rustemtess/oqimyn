<?php

include_once './user/user.authorization.php';

if($user->isAuthorized()) header('Location: /');

if(isset($_POST['register'])) {
    $registered = register(
        $_POST['name'], 
        $_POST['surname'], 
        $_POST['email'], 
        $_POST['password'],
        $_POST['repeatpassword']
    );
    if($registered['status'] == 'success') {
        header('Location: /auth');
    }else {
        ?>
            <p class="text-base mb-5 bg-red-400 p-2 px-4 text-white rounded"><?=$registered['message']?></p>
        <?
    }
}

?>

<body class="font-sans px-2 py-4 flex flex-col justify-center items-center">

    <form method="POST" class="w-full max-w-lg h-fit flex flex-col gap-2 text-lg border-slate-100 divide-solid border rounded px-6 py-4 bg-slate-50">

        <div class="flex items-center justify-between">
            <img width="120" src="/img/logo.svg" />
            <h2 class="text-2xl my-5 font-medium text-gray-800">Регистрация</h2>
        </div>

        <p class="text-slate-600 px-1">Имя</p>
        <input name="name" placeholder="Введите имя" type="text" class="px-4 py-3 w-full rounded" />
        <p class="text-slate-600 px-1">Фамилия</p>
        <input name="surname" placeholder="Введите фамилию" type="text" class="px-4 py-3 w-full rounded" />
        <p class="text-slate-600 px-1">Электронная почта</p>
        <input name="email" placeholder="Введите почту" type="email" class="px-4 py-3 w-full rounded" />
        <p class="text-slate-600 px-1">Новый пароль</p>
        <input name="password" placeholder="Придумайте пароль" type="password" class="px-4 py-3 w-full rounded" />
        <p class="text-slate-600 px-1">Повторить пароль</p>
        <input name="repeatpassword" placeholder="Повторите пароль" type="password" class="px-4 py-3 w-full rounded" />
        <button name="register" class="mt-5 mb-2 cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg h-fit hover:bg-orange-500">Создать аккаунт</button>
        <a class="cursor-pointer text-center hover:text-slate-700 mb-3" href="/auth">У меня есть аккаунт</a>

    </form>

</body>
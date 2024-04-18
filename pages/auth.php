<?php

include_once './user/user.authorization.php';

if($user->isAuthorized()) header('Location: /');

?>

<body class="font-sans relative px-2 h-full flex flex-col justify-center items-center">

    <?
        if(isset($_POST['auth'])) {
            ?>
                <p class="text-base mb-5 bg-red-400 p-2 px-4 text-white rounded"><?=authization($_POST['email'], $_POST['password'])['message']?></p>
            <?
        }
    ?>

    <form method="POST" class="w-full max-w-lg h-fit flex flex-col gap-2 text-lg border-slate-100 divide-solid border rounded px-6 py-4 bg-slate-50">

        <div class="flex items-center justify-between">
            <img width="120" src="/img/logo.svg" />
            <h2 class="text-2xl my-5 font-medium text-gray-800">Авторизация</h2>
        </div>

        <p class="text-slate-600 px-1">Электронная почта</p>
        <input name="email" placeholder="Введите почту" type="email" class="px-4 py-3 w-full rounded" />
        <p class="text-slate-600 px-1">Пароль</p>
        <input name="password" placeholder="Введите пароль" type="password" class="px-4 py-3 w-full rounded" />
        <button name="auth" class="mt-5 mb-2 cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg h-fit hover:bg-orange-500">Войти в аккаунт</button>
        <a class="cursor-pointer text-center hover:text-slate-700 mb-3" href="/register">Создать аккаунт</a>

    </form>

</body>
<?php

include_once './components/task.php';
include_once './pages/page.module.php';
include_once './pages/page.action.php';
include_once './pages/profile/profile.action.php';

$userPermission = $user->getPermission();
$userPermissionName = $userPermission['name'];
$userPermissionPrefix = $userPermission['prefix'];
$_SESSION['demo'] = false;

?>

<body class="overflow-hidden font-sans">

    <!-- Container -->
    <div class="flex flex-row h-svh font-sans" style="background-color: #F9F9F9;">

        <!-- Left section -->
        <section id="left-section" class="flex flex-col bg-orange-50 border-slate-100 divide-solid border-r px-6 py-4 gap-4 w-full max-w-md overflow-y-auto">
            <div class="flex gap-2 items-center justify-between pt-1">
                <img onclick="document.location.href='/'" src="/img/logo.svg" width="120" />
                <button id="close" class="hidden">
                    <svg width="28px" height="28px" viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="cancel_outline_28">
                                <rect x="0" y="0" width="28" height="28"></rect>
                                <path fill="rgb(51, 65, 85)" d="M6.29289322,6.29289322 C6.68341751,5.90236893 7.31658249,5.90236893 7.70710678,6.29289322 L7.70710678,6.29289322 L14,12.585 L20.2928932,6.29289322 C20.6533772,5.93240926 21.2206082,5.90467972 21.6128994,6.20970461 L21.7071068,6.29289322 C22.0976311,6.68341751 22.0976311,7.31658249 21.7071068,7.70710678 L21.7071068,7.70710678 L15.415,14 L21.7071068,20.2928932 C22.0675907,20.6533772 22.0953203,21.2206082 21.7902954,21.6128994 L21.7071068,21.7071068 C21.3165825,22.0976311 20.6834175,22.0976311 20.2928932,21.7071068 L20.2928932,21.7071068 L14,15.415 L7.70710678,21.7071068 C7.34662282,22.0675907 6.77939176,22.0953203 6.38710056,21.7902954 L6.29289322,21.7071068 C5.90236893,21.3165825 5.90236893,20.6834175 6.29289322,20.2928932 L6.29289322,20.2928932 L12.585,14 L6.29289322,7.70710678 C5.93240926,7.34662282 5.90467972,6.77939176 6.20970461,6.38710056 Z" id="↳-Icon-Color" fill="currentColor" fill-rule="nonzero"></path>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col w-full items-center mt-10 gap-2">
                <div class="flex w-full px-4 py-2 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(51, 65, 85)" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" d="m24 11.15-8.9-8.5c-.6-.6-1.6-.6-2.3 0l-8.9 8.5c-.6.6-.9 1.4-.9 2.2v8.6c0 1.4 1.1 2.5 2.5 2.5h6c.6 0 1-.4 1-1v-7h3v7c0 .6.4 1 1 1h6c1.4 0 2.5-1.1 2.5-2.5v-8.6c0-.8-.4-1.6-1-2.2Zm-1 10.8c0 .3-.2.5-.5.5h-5v-7c0-.6-.4-1-1-1h-5c-.6 0-1 .4-1 1v7h-5c-.3 0-.5-.2-.5-.5v-8.6c0-.3.1-.5.3-.7l8.7-8.3 8.7 8.3c.2.2.3.5.3.7v8.6Z"/></svg>
                    <a class="text-left w-full text-xl text-slate-700" href="/">Главная</a>
                </div>
                <div class="flex w-full px-4 py-3 rounded-lg duration-200 justify-between gap-3 bg-white">
                    <svg width="28px" height="28px" viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="user_circle_outline_28">
                                <polygon points="0 0 28 0 28 28 0 28"></polygon>
                                <path fill="rgb(51, 65, 85)" d="M14,2 C20.627417,2 26,7.372583 26,14 C26,20.627417 20.627417,26 14,26 C7.372583,26 2,20.627417 2,14 C2,7.372583 7.372583,2 14,2 Z M14,20.5 C11.9140585,20.5 9.92003841,21.0819877 8.20321268,22.1490263 C9.83817315,23.3145604 11.8390401,24 14,24 C16.1605163,24 18.1610053,23.3148418 19.7960379,22.1499545 C18.0794784,21.0818382 16.0856823,20.5 14,20.5 Z M14,4 C8.4771525,4 4,8.4771525 4,14 C4,16.6156772 5.00425519,18.9967981 6.64822833,20.7788253 C8.78562177,19.3081977 11.3309834,18.5 14,18.5 C16.6692926,18.5 19.214928,19.3083599 21.3526704,20.7774111 C22.9961172,18.995915 24,16.6151922 24,14 C24,8.4771525 19.5228475,4 14,4 Z M14,7.5 C16.6241597,7.5 18.75,9.62584025 18.75,12.25 C18.75,14.8741597 16.6241597,17 14,17 C11.3758403,17 9.25,14.8741597 9.25,12.25 C9.25,9.62584025 11.3758403,7.5 14,7.5 Z M14,9.5 C12.4804097,9.5 11.25,10.7304097 11.25,12.25 C11.25,13.7695903 12.4804097,15 14,15 C15.5195903,15 16.75,13.7695903 16.75,12.25 C16.75,10.7304097 15.5195903,9.5 14,9.5 Z" id="↳-Icon-Color" fill="currentColor" fill-rule="nonzero"></path>
                            </g>
                        </g>
                    </svg>
                    <a class="text-left cursor-default w-full text-xl text-slate-700">Профиль</a>
                </div>
                <div class="flex w-full px-4 py-3 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(51, 65, 85)" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" fill-rule="evenodd" d="M13.263 2.661a1.75 1.75 0 0 1 1.473 0l10.25 4.752c1.352.626 1.352 2.548 0 3.175l-10.25 4.755a1.75 1.75 0 0 1-1.472 0L3.016 10.595C1.664 9.97 1.663 8.048 3.014 7.42l10.25-4.759ZM14 4.524 4.346 9.007 14 13.48 23.656 9 14 4.524Zm11.91 9.526a1 1 0 0 1-.486 1.328l-10.686 4.961a1.75 1.75 0 0 1-1.473 0l-10.68-4.945a1 1 0 0 1 .84-1.815L14 18.476l10.582-4.912a1 1 0 0 1 1.328.486Zm-.481 6.252a1 1 0 1 0-.852-1.81L14 23.472 3.429 18.508a1 1 0 1 0-.85 1.81l10.677 5.015a1.75 1.75 0 0 0 1.49 0l10.682-5.03Z" clip-rule="evenodd"/></svg>
                    <a href="/tasks" class="text-left w-full text-xl text-slate-700">Все курсы</a>
                </div>
                <div class="flex w-full px-4 py-2 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(51, 65, 85)" viewBox="0 0 28 28"><path fill-rule="evenodd" fill="rgb(51, 65, 85)" d="M10.357 3H13a1 1 0 1 1 0 2h-2.6c-1.137 0-1.929 0-2.546.051-.605.05-.953.142-1.216.276a3 3 0 0 0-1.311 1.311c-.134.263-.226.611-.276 1.216C5.001 8.471 5 9.264 5 10.4v7.2c0 1.137 0 1.929.051 2.546.05.605.142.953.276 1.216a3 3 0 0 0 1.311 1.311c.263.134.611.226 1.216.276.617.05 1.41.051 2.546.051H13a1 1 0 1 1 0 2h-2.643c-1.084 0-1.958 0-2.666-.058-.728-.06-1.369-.185-1.96-.487a5 5 0 0 1-2.186-2.185c-.302-.592-.428-1.232-.487-1.961C3 19.6 3 18.727 3 17.643v-7.286c0-1.084 0-1.958.058-2.666.06-.728.185-1.369.487-1.96A5 5 0 0 1 5.73 3.544c.592-.302 1.233-.428 1.961-.487C8.4 3 9.273 3 10.357 3Zm8.936 6.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L21.586 15H12a1 1 0 1 1 0-2h9.586l-2.293-2.293a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"/></svg>
                    <a class="text-left w-full text-xl text-slate-700" href="/exit">Выход</a>
                </div>
            </div>
        </section>

        <!-- Right section -->
        <section class="flex flex-col gap-1 w-full overflow-auto relative mb-6">
            
            <div class="p-4 pt-3 border-slate-100 border-b flex justify-between items-center sticky top-0 w-full z-10" style="backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8);">
                <div class="flex items-center gap-3">
                    <button id="open" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" d="M23 20a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2h18Z"/></svg>
                    </button>
                    <h3 id="page-title" class="text-2xl">Профиль</h3>
                </div>
                <nav class="flex gap-2.5 items-center cursor-default justify-end">
                    <?
                        $profileName = mb_substr(
                            $user->getFullName()['surname'], 0, 1
                        ).mb_substr(
                            $user->getFullName()['name'], 0, 1
                        );
                    ?>
                    <a class="border border-slate-200 bg-gray-100 px-2.5 py-2 text-slate-600 font-medium rounded text-lg h-fit"><?=$profileName?></a>
                    <div class="cursor-pointer flex flex-col items-start">
                        <p class="cursor-pointer text-slate-500" style="margin-top: -2px;"><?=$user->getEmail()?></p>
                        <p class="cursor-pointer bg-slate-100 text-slate-500 px-3 rounded py-0.5" style="margin-top: -1px; font-size: 13px;"><?=$userPermissionPrefix?></p>
                    </div>
                </nav>
            </div>
            <div class="px-4">
                <div class="flex flex-col gap-4 w-full items-center pt-4">
                    
                    <div class="flex flex-col w-full items-start bg-white px-3 py-4 rounded">
                        <p class="text-slate-600">Мои данные</p>
                        <hr class="my-4 border-slate-100 w-full" />
                        <div class="flex flex-col gap-5">
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-slate-600">Имя</p>
                                    <h2 class="text-2xl text-slate-700 font-medium"><?=$user->getFullName()['name']?></h2>
                                </div>
                                <div>
                                    <p class="text-slate-600">Фамилия</p>
                                    <h2 class="text-2xl text-slate-700 font-medium"><?=$user->getFullName()['surname']?></h2>
                                </div>
                            </div>
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-slate-600">Электронная почта</p>
                                    <h2 class="text-lg text-slate-700 font-medium"><?=$user->getEmail()?></h2>
                                </div>
                            </div>
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-slate-600">Статус</p>
                                    <h2 class="text-lg text-slate-700 font-medium"><?=$userPermissionPrefix?></h2>
                                </div>
                            </div>
                        </div>
                        <?
                            if(isset($_SESSION['superMode']) && $_SESSION['superMode']) {
                                ?>
                                <hr class="my-4 border-slate-100 w-full" />
                                <form method="POST" class="flex flex-wrap gap-2">
                                    <button name="change_perm" value="1" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">Режим пользователя</button>
                                    <button name="change_perm" value="2" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">Режим администратора</button>
                                    <button name="change_perm" value="3" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">Режим супер администратора</button>
                                </form>
                                <?
                            }

                        ?>
                    </div>

                </div>
                <!--<hr class="my-4 border-slate-100" /> -->
            </div>

        </section>

    </div>

</body>
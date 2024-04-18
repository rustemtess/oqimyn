<?php

include_once './components/task.php';
include_once './pages/page.module.php';
include_once './pages/page.action.php';

$lang = $_SESSION['lang'];
$_SESSION['demo'] = false;
$userPermission = $user->getPermission();
$userPermissionName = $userPermission['name'];
if($userPermissionName == 'admin') 
    include_once './components/create-component/create-component.load.php';
$userPermissionPrefix = $userPermission['prefix'];

?>
<body class="overflow-hidden font-sans">

    <!-- Container -->
    <div class="flex flex-row h-svh font-sans" style="background-color: #F9F9F9;">
        <!-- Left section -->
        <section id="left-section" class="flex flex-col bg-orange-50 border-slate-100 divide-solid border-r px-2 py-4 gap-4 w-3/6 max-w-md overflow-y-auto">
            <div class="flex gap-2 items-center justify-between px-4 pt-1">
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
            <div class="flex flex-col w-full items-center mt-10 gap-3 text-lg">
                <div class="w-full flex flex-col items-center gap-2 px-4">
                    <div class="flex w-full px-4 py-2 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(51, 65, 85)" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" d="m24 11.15-8.9-8.5c-.6-.6-1.6-.6-2.3 0l-8.9 8.5c-.6.6-.9 1.4-.9 2.2v8.6c0 1.4 1.1 2.5 2.5 2.5h6c.6 0 1-.4 1-1v-7h3v7c0 .6.4 1 1 1h6c1.4 0 2.5-1.1 2.5-2.5v-8.6c0-.8-.4-1.6-1-2.2Zm-1 10.8c0 .3-.2.5-.5.5h-5v-7c0-.6-.4-1-1-1h-5c-.6 0-1 .4-1 1v7h-5c-.3 0-.5-.2-.5-.5v-8.6c0-.3.1-.5.3-.7l8.7-8.3 8.7 8.3c.2.2.3.5.3.7v8.6Z"/></svg>
                        <a class="text-left w-full text-xl text-slate-700" href="/">Главная</a>
                    </div>
                    <div class="flex w-full px-4 py-3 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                        <svg width="28px" height="28px" viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="user_circle_outline_28">
                                    <polygon points="0 0 28 0 28 28 0 28"></polygon>
                                    <path fill="rgb(51, 65, 85)" d="M14,2 C20.627417,2 26,7.372583 26,14 C26,20.627417 20.627417,26 14,26 C7.372583,26 2,20.627417 2,14 C2,7.372583 7.372583,2 14,2 Z M14,20.5 C11.9140585,20.5 9.92003841,21.0819877 8.20321268,22.1490263 C9.83817315,23.3145604 11.8390401,24 14,24 C16.1605163,24 18.1610053,23.3148418 19.7960379,22.1499545 C18.0794784,21.0818382 16.0856823,20.5 14,20.5 Z M14,4 C8.4771525,4 4,8.4771525 4,14 C4,16.6156772 5.00425519,18.9967981 6.64822833,20.7788253 C8.78562177,19.3081977 11.3309834,18.5 14,18.5 C16.6692926,18.5 19.214928,19.3083599 21.3526704,20.7774111 C22.9961172,18.995915 24,16.6151922 24,14 C24,8.4771525 19.5228475,4 14,4 Z M14,7.5 C16.6241597,7.5 18.75,9.62584025 18.75,12.25 C18.75,14.8741597 16.6241597,17 14,17 C11.3758403,17 9.25,14.8741597 9.25,12.25 C9.25,9.62584025 11.3758403,7.5 14,7.5 Z M14,9.5 C12.4804097,9.5 11.25,10.7304097 11.25,12.25 C11.25,13.7695903 12.4804097,15 14,15 C15.5195903,15 16.75,13.7695903 16.75,12.25 C16.75,10.7304097 15.5195903,9.5 14,9.5 Z" id="↳-Icon-Color" fill="currentColor" fill-rule="nonzero"></path>
                                </g>
                            </g>
                        </svg>
                        <a href="/profile" class="text-left w-full text-xl text-slate-700">Профиль</a>
                    </div>
                    <div class="flex w-full px-4 py-3 rounded-lg duration-200 justify-between gap-3 hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(51, 65, 85)" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" fill-rule="evenodd" d="M13.263 2.661a1.75 1.75 0 0 1 1.473 0l10.25 4.752c1.352.626 1.352 2.548 0 3.175l-10.25 4.755a1.75 1.75 0 0 1-1.472 0L3.016 10.595C1.664 9.97 1.663 8.048 3.014 7.42l10.25-4.759ZM14 4.524 4.346 9.007 14 13.48 23.656 9 14 4.524Zm11.91 9.526a1 1 0 0 1-.486 1.328l-10.686 4.961a1.75 1.75 0 0 1-1.473 0l-10.68-4.945a1 1 0 0 1 .84-1.815L14 18.476l10.582-4.912a1 1 0 0 1 1.328.486Zm-.481 6.252a1 1 0 1 0-.852-1.81L14 23.472 3.429 18.508a1 1 0 1 0-.85 1.81l10.677 5.015a1.75 1.75 0 0 0 1.49 0l10.682-5.03Z" clip-rule="evenodd"/></svg>
                        <a href="/tasks" class="text-left w-full text-xl text-slate-700">Все курсы</a>
                    </div>
                </div>
                <hr class="my-2 border-slate-200" width="80%" />
                <?
                foreach(getTabs() as $tab) {
                    $tabId = intval($tab['tab_id']);
                    $firstTabPage = getPages($tabId)[0]['page_id'];
                    ?>
                        <div class="flex justify-between w-full">
                            <?
                                if(isset($_SESSION['new-tab']) && $_SESSION['new-tab'] == $tabId) {
                                    ?>
                                        <form method="POST">
                                            <textarea name="edited_tab" class="text-left divide-solid border-orange-50 border w-full text-lg hover:text-slate-800 px-4 py-3 rounded-lg duration-200"><?=$tab['tab_title']?></textarea>
                                            <button name="save_edit_tab" value="<?=$tabId?>" class="cursor-pointer bg-orange-600 px-2 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">Сохранить изменение<button>
                                        </form>
                                    <?
                                }else {
                                    if($tabId == $firstPage) {
                                        ?>
                                            <a class="text-left bg-white border-orange-50 divide-solid border w-full text-lg hover:text-slate-800 px-4 py-3 rounded-lg duration-200  cursor-default bg-orange-50"><?=$tab['tab_title']?></a>
                                        <?
                                    }
                                    
                                    if($tabId != $firstPage) {
                                        ?>
                                            <a class="text-left divide-solid border-orange-50 border w-full text-lg hover:text-slate-800 px-4 py-3 rounded-lg duration-200" href="/<?=$tabId?>/<?=$firstTabPage?>"><?=$tab['tab_title']?></a>
                                        <?
                                    }
                                }
                                
                                if($userPermissionName == 'admin') {
                                    ?>
                                    <form method="POST" class="flex flex-col ml-1 gap-0.5">
                                        <button name="delete_tab" value="<?=$tabId?>" class="cursor-pointer bg-orange-600 px-1 py-1 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 28 28"><path fill-rule="evenodd" d="M10.944 9.502a1 1 0 0 0-.943 1.053l.5 9a1 1 0 0 0 1.998-.11l-.5-9a1 1 0 0 0-1.055-.943Zm6.111 0A1 1 0 0 1 18 10.555l-.5 9a1 1 0 0 1-1.997-.11l.5-9a1 1 0 0 1 1.053-.943Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M3.5 5a1 1 0 0 0 0 2h1.096l1.298 12.823c.073.73.135 1.334.224 1.826.092.513.227.98.488 1.414a4 4 0 0 0 1.72 1.554c.458.216.936.303 1.456.344.498.039 1.106.039 1.84.039h4.757c.733 0 1.34 0 1.84-.039.519-.04.997-.128 1.455-.344a4 4 0 0 0 1.72-1.554c.261-.434.396-.901.489-1.414.088-.492.15-1.097.223-1.826L23.404 7H24.5a1 1 0 1 0 0-2h-6.111a4.502 4.502 0 0 0-8.777 0H3.5Zm4.38 14.583c.078.778.132 1.304.206 1.71.07.394.148.596.234.738a2 2 0 0 0 .86.778c.15.07.359.127.758.158.41.032.94.033 1.722.033h4.68c.782 0 1.311 0 1.723-.033.399-.031.607-.087.758-.158.356-.169.656-.44.86-.778.085-.142.162-.344.233-.738.074-.406.128-.932.206-1.71L21.395 7H6.606L7.88 19.583ZM14 3.5A2.5 2.5 0 0 0 11.708 5h4.584A2.5 2.5 0 0 0 14 3.5Z" clip-rule="evenodd"/></svg>
                                        <button>
                                        <button name="edit_tab" value="<?=$tabId?>" class="cursor-pointer bg-orange-600 px-1 py-1 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                                            <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.782 3.3354C20.9264 2.89943 19.9137 2.89943 19.0581 3.3354C18.6302 3.5534 18.2582 3.92634 17.8279 4.35782L4.67698 17.5088C4.32287 17.8628 4.06847 18.117 3.85947 18.4047C3.44206 18.9792 3.16654 19.6444 3.05545 20.3458C2.99983 20.697 2.99991 21.0567 3.00003 21.5573L3.00005 22.6L2.99985 22.681C2.99882 22.9628 2.99756 23.3091 3.09793 23.618C3.29577 24.2269 3.77314 24.7043 4.38201 24.9021C4.69094 25.0025 5.0373 25.0012 5.31907 25.0002L5.40005 25L6.44273 25C6.94338 25.0001 7.30306 25.0002 7.65425 24.9446C8.35566 24.8335 9.02081 24.558 9.59533 24.1406C9.883 23.9316 10.1373 23.6772 10.4912 23.3231L23.6422 10.1722C24.0737 9.74181 24.4466 9.36981 24.6646 8.94197C25.1006 8.08632 25.1006 7.07368 24.6646 6.21803C24.4467 5.7902 24.0737 5.41821 23.6423 4.98784L23.0122 4.35782C22.5819 3.92635 22.2099 3.5534 21.782 3.3354ZM19.9661 5.11742C20.2513 4.97209 20.5888 4.97209 20.874 5.11742C20.9796 5.1712 21.1114 5.28552 21.6928 5.867L22.133 6.30721C22.7145 6.88869 22.8288 7.02046 22.8826 7.12601C23.028 7.41123 23.028 7.74877 22.8826 8.03399C22.8288 8.13954 22.7145 8.27131 22.133 8.85279L21.275 9.71081L18.2892 6.72502L19.1473 5.867C19.7287 5.28552 19.8605 5.1712 19.9661 5.11742ZM16.875 8.13924L6.14233 18.8719C5.71687 19.2974 5.58239 19.4359 5.4775 19.5803C5.24561 19.8995 5.09254 20.269 5.03083 20.6587C5.00291 20.8349 5.00005 21.028 5.00005 21.6296V22.6C5.00005 22.797 5.00039 22.9048 5.00467 22.983L5.00536 22.9947L5.01702 22.9954C5.09529 22.9997 5.20302 23 5.40005 23H6.3704C6.97209 23 7.16513 22.9971 7.34138 22.9692C7.73105 22.9075 8.10058 22.7545 8.41976 22.5226C8.56413 22.4177 8.70266 22.2832 9.12812 21.8577L19.8608 11.125L16.875 8.13924Z" fill="currentColor"/>
                                            </svg>
                                        <button>
                                    </form>
                                    <?
                                }
                            ?>
                        </div>
                    <?
                }

                if($userPermissionName == 'admin') {
                    ?>
                        <form class="flex flex-col gap-2" method="POST">
                            <?
                                if(isset($_SESSION['editor-tab']) && $_SESSION['editor-tab']) {
                                    ?>
                                        <input name="tab-name" placeholder="Введите название вкладки" class="rounded bg-gray-100 w-full resize px-3 py-2" />
                                        <button name="save-tab" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Сохранить</button>
                                        <button name="close-tab" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Закрыть</button>
                                    <?
                                } else {
                                    ?>
                                        <button name="new-tab" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">+ вкладка</button>
                                    <?
                                }
                            ?>
                        </form>
                    <?
                }
                ?>
            </div>
        </section>

        <!-- Right section -->
        <section id="scroll" class="flex flex-col gap-1 w-full overflow-auto relative mb-6">
            
            <div class="p-4 pt-3 border-slate-100 border-b flex justify-between items-center sticky top-0 w-full z-10" style="backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8);">
                <div class="flex items-center gap-3">
                    <button id="open" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" d="M23 20a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2h18Z"/></svg>
                    </button>
                    <h3 id="page-title" class="text-2xl">👋 Привет, <?=$user->getFullName()['name']?>!</h3>
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
                    <div onclick="document.location.href = '/profile'" class="cursor-pointer flex flex-col items-start">
                        <p class="cursor-pointer text-slate-500" style="margin-top: -2px;"><?=$user->getEmail()?></p>
                        <p class="cursor-pointer bg-slate-100 text-slate-500 px-3 rounded py-0.5" style="margin-top: -1px; font-size: 13px;"><?=$userPermissionPrefix?></p>
                    </div>
                </nav>
            </div>
            <div class="px-4">
                <div class="flex flex-col gap-4 w-full items-center pt-4">
                    <div class="grid grid-cols-2 w-full justify-items-stretch">
                        <?
                            $next_page = nextPage();
                            $previous_page = previousPage();
                        ?>
                        <form method="POST" class="justify-self-start w-full flex justify-start gap-2">
                            <?
                                if($userPermissionName == 'admin') {
                                    ?>
                                    <button name="delete" class="justify-self-start cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">-</button>
                                    <?
                                }
                                if($previous_page) {
                                    ?>
                                    <a href="/<?=$firstPage?>/<?=$previous_page?>" class="justify-self-end cursor-pointer bg-orange-600 px-3 py-2.5 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500 flex items-center">
                                        <svg fill="none" height="24" viewBox="0 0 28 28" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m12.4142 14 5.7929-5.79289c.3905-.39053.3905-1.02369 0-1.41422-.3905-.39052-1.0237-.39052-1.4142 0l-6.5 6.50001c-.39053.3905-.39053 1.0237 0 1.4142l6.5 6.5c.3905.3905 1.0237.3905 1.4142 0s.3905-1.0237 0-1.4142z" fill="currentColor"/></svg>
                                    </a>
                                    <?
                                }
                                if($lang == 'kz') {
                                    ?>
                                        <button name="lang_change" value="ru" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500 flex items-center gap-1.5">
                                            <svg fill="none" height="28" viewBox="0 0 28 28" width="28" xmlns="http://www.w3.org/2000/svg"><path d="m11.7071 3.29289c-.3905-.39052-1.0237-.39052-1.4142 0l-5.00001 5c-.39052.39053-.39052 1.02369 0 1.41422l5.00001 4.99999c.3905.3905 1.0237.3905 1.4142 0s.3905-1.0237 0-1.4142l-3.2931-3.2939 6.086.001c3.0376 0 5.5 2.4624 5.5 5.5s-2.4624 5.5-5.5 5.5h-4.5c-.55228 0-1 .4477-1 1s.44772 1 1 1h4.5c4.1421 0 7.5-3.3579 7.5-7.5s-3.3579-7.5-7.5-7.5l-6.084-.001 3.2911-3.29189c.3605-.36049.3882-.92772.0832-1.32001z" fill="currentColor"/></svg>
                                            <span class="cursor-pointer">Русский</span>
                                        </button>
                                    <?
                                }
                                if($lang == 'ru') {
                                    ?>
                                        <button name="lang_change" value="kz" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500 flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill-rule="evenodd" d="M13.036 3.249a2 2 0 0 1 1.928 0l9.995 5.499A2.02 2.02 0 0 1 26 10.5V18a1 1 0 1 1-2 0v-5.22l-2 1.1v3.161c0 .425 0 .685-.014.912a7.5 7.5 0 0 1-7.033 7.033c-.317.02-.636.014-.953.014-.317 0-.636.006-.953-.014a7.5 7.5 0 0 1-7.033-7.033A16.16 16.16 0 0 1 6 17.04v-3.157l-2.967-1.631c-1.383-.76-1.383-2.746 0-3.506L13.036 3.25ZM8 14.983V17c0 .479 0 .674.01.832a5.5 5.5 0 0 0 5.158 5.158c.158.01.353.01.832.01s.674 0 .832-.01a5.5 5.5 0 0 0 5.158-5.158c.01-.158.01-.353.01-.832v-2.02l-5.036 2.771a2 2 0 0 1-1.928 0L8 14.983Zm6-9.982L3.996 10.5 14 15.999l9.995-5.499L14 5.001Z" clip-rule="evenodd"/></svg>
                                            <span class="cursor-pointer">Продолжить</span>
                                        </button>
                                    <?
                                }
                            ?>
                            
                        </form>
                        <form method="POST" class="justify-self-end w-full flex justify-end gap-2">
                            <?
                                if($next_page) {
                                    ?>
                                    <a href="/<?=$firstPage?>/<?=$next_page?>" class="justify-self-start cursor-pointer bg-orange-600 px-3 py-2.5 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500 flex items-center justify-center">
                                        <svg width="24px" height="24px" viewBox="0 0 28 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="chevron_right_outline_28">
                                                    <rect x="0" y="0" width="28" height="28"></rect>
                                                    <g id="Source" transform="translate(11.000000, 7.000000)" stroke="#8BC1FF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                        <polyline id="Path-2" points="0 0.5 6.5 7 2.84328117e-13 13.5"></polyline>
                                                    </g>
                                                    <path d="M16.0857864,14 L10.2928932,19.7928932 C9.90236893,20.1834175 9.90236893,20.8165825 10.2928932,21.2071068 C10.6834175,21.5976311 11.3165825,21.5976311 11.7071068,21.2071068 L18.2071068,14.7071068 C18.5976311,14.3165825 18.5976311,13.6834175 18.2071068,13.2928932 L11.7071068,6.79289322 C11.3165825,6.40236893 10.6834175,6.40236893 10.2928932,6.79289322 C9.90236893,7.18341751 9.90236893,7.81658249 10.2928932,8.20710678 L16.0857864,14 Z" id="↳-Icon-Color" fill="currentColor" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <?
                                }

                                if($userPermissionName == 'admin') {
                                    ?>
                                    <button name="add" class="justify-self-end cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">+</button>
                                    <?
                                }
                            ?>    
                        </form>
                    </div>
                    <?

                        foreach(getPageContent($lang) as $object) {
                            
                            $object_table = $object['object_table'];
                            $object_id = $object['object_id'];
                            $object_lang = $object['lang'];

                            if($object_lang == $lang) {
                                if($object_table == "tasks_drag") {
                                    include './components/drag/index.php';
                                }
                                if($object_table == "tasks_read") {
                                    include './components/read/index.php';
                                }
                                if($object_table == "tasks_hold") {
                                    include './components/hold/index.php';
                                }
                                if($object_table == "descriptions") {
                                    include './components/description/index.php';
                                }
                                if($object_table == "contexts") {
                                    include './components/context/index.php';
                                }
                                if($object_table == "simples") {
                                    include './components/simple/index.php';
                                }
                            }
                        
                        }
                        if($userPermissionName == 'admin' && isset($_SESSION['editor']) && !$_SESSION['editor']) {
                            ?>
                            <form method="POST">
                                <button name="open" class="justify-self-end cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">Открыть редактор страницы</button>
                            </form>
                            <?      
                        }
                    ?>
                </div>
                <!--<hr class="my-4 border-slate-100" /> -->
            </div>

        </section>

        <?
        
            if(isset($_SESSION['editor']) && $_SESSION['editor']) include_once './components/create-component/index.php';

        ?>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var savedScrollPosition = parseInt("<?php echo isset($_SESSION['scrollPosition']) ? $_SESSION['scrollPosition'] : '0'; ?>");
            var scrollElement = document.getElementById('scroll');
            scrollElement.scrollTo({
                top: savedScrollPosition, 
                behavior: 'smooth'
            });
            fetch('/scrollUpdate');
        });
    </script>

</body>
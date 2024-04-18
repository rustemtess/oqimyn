<?php

include_once './components/task.php';
include_once './pages/page.module.php';
include_once './pages/page.action.php';

$lang = $_SESSION['lang'];
$_SESSION['demo'] = true;

?>
<body class="overflow-hidden font-sans">

    <!-- Container -->
    <div class="flex flex-row h-svh font-sans" style="background-color: #F9F9F9;">

        <!-- Right section -->
        <section id="scroll" class="flex flex-col gap-1 w-full overflow-auto relative mb-6">
            
            <div class="p-4 pt-3 border-slate-100 border-b flex justify-between items-center sticky top-0 bg-white w-full z-10">
                <div class="flex items-center gap-3">
                    <button id="open" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill="rgb(51, 65, 85)" d="M23 20a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2h18Zm0-7a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2h18Z"/></svg>
                    </button>
                    <a href="/" class="text-xl">Вернуться</a>
                </div>
                <?
                    if($user->isAuthorized()) {
                        ?>
                            <nav onclick="document.location.href='/profile'" class="flex gap-2.5 items-center cursor-default justify-end">
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
                                    <p class="cursor-pointer bg-slate-100 text-slate-500 px-3 rounded py-0.5" style="margin-top: -1px; font-size: 13px;"><?=$user->getPermission()['prefix']?></p>
                                </div>
                            </nav>
                        <?
                    }else {
                        ?>
                            <a href="/auth" class="flex items-center gap-2 cursor-pointer bg-orange-600 px-2 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                                <svg fill="none" height="28" viewBox="0 0 28 28" width="28" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m17.6428 25h-2.6428c-.5523 0-1-.4477-1-1s.4477-1 1-1h2.6c1.1366 0 1.9289-.0008 2.5458-.0512.6051-.0494.9528-.1416 1.2162-.2758.5645-.2876 1.0234-.7465 1.311-1.311.1342-.2634.2264-.6111.2758-1.2162.0504-.6169.0512-1.4092.0512-2.5458v-7.2c0-1.13661-.0008-1.92892-.0512-2.54576-.0494-.60517-.1416-.95286-.2758-1.21621-.2876-.56449-.7465-1.02343-1.311-1.31105-.2634-.13418-.6111-.22636-1.2162-.2758-.6169-.0504-1.4092-.05118-2.5458-.05118h-2.6c-.5523 0-1-.44772-1-1s.4477-1 1-1h2.6428.0001c1.0838-.00001 1.9579-.00002 2.6657.05782.7289.05955 1.3691.18536 1.9614.48715.9408.47936 1.7057 1.24427 2.185 2.18508.3018.59229.4276 1.23248.4872 1.96133.0578.70788.0578 1.58203.0578 2.66582v7.2856c0 1.0838 0 1.9579-.0578 2.6658-.0596.7289-.1854 1.3691-.4872 1.9614-.4793.9408-1.2442 1.7057-2.185 2.185-.5923.3018-1.2325.4276-1.9614.4872-.7079.0578-1.582.0578-2.6658.0578zm-14.6428-11c0-.5523.44772-1 1-1h9.5858l-2.2929-2.2929c-.3905-.3905-.3905-1.02368 0-1.41421.3905-.39052 1.0237-.39052 1.4142 0l3.9993 3.99931c.0024.0024.0048.0048.0072.0073.0927.0943.1628.2025.2105.3177.0486.1171.0755.2453.0759.3798v.003.003c-.0008.2716-.1099.5178-.2864.6975-.0024.0025-.0048.0049-.0072.0073l-3.9993 3.9993c-.3905.3905-1.0237.3905-1.4142 0s-.3905-1.0237 0-1.4142l2.2929-2.2929h-9.5858c-.55228 0-1-.4477-1-1z" fill="currentColor" fill-rule="evenodd"/></svg>
                                <span class="cursor-pointer">Войти</span>
                            </a>
                        <?
                    }
                ?>
            </div>
            <div class="px-4">
                <div class="flex flex-col gap-4 w-full items-center pt-4">
                    <div class="grid grid-cols-2 w-full justify-items-stretch">
                        <form method="POST" class="justify-self-start w-full flex justify-start gap-2">
                            <?
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
                    </div>
                    <?

                        foreach(getPageContent($lang, true) as $object) {
                            
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
                    ?>
                </div>
                <!--<hr class="my-4 border-slate-100" /> -->
            </div>

        </section>

    </div>

</body>
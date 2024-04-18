<?
include_once './pages/page.action.php';
?>

<body style="height: 100%; background-color: #F9F9F9;">
    <style>
        .carousel-container {
            width: 100%;
            overflow: hidden;
            margin: 0 auto; 
        }
        .carousel-slide {
            transition: transform 0.5s ease;
        }
        .carousel-slide iframe {
            height: auto;
        }
    </style> 
    
    <div class="flex flex-col items-center relative">
        <header class="flex justify-between items-center w-full border-slate-100 sticky top-0 border-b p-4 pt-3 z-10" style="backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.8);">
            <img id="homeLogo" src="/img/logo.svg" width="120" />
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
        </header>
        <div class="w-full max-w-screen-2xl flex flex-col h-full items-center p-2 gap-36">

            <div class="flex flex-wrap-reverse justify-center w-full p-2 py-5 gap-x-20 gap-12 items-center mt-24">
                <img src="/img/background.png" />
                <div class="flex flex-col gap-4">
                    <h1 class="text-4xl font-medium max-w-md text-gray-700">Изучайте казахский язык легко и интересно с нами!</h1>
                    <button class="cursor-pointer bg-slate-900 text-lg rounded-xl w-fit h-fit px-4 py-3 text-slate-50 hover:bg-gray-800 my-2 flex gap-2 items-center" onclick="speak(this, 1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M14.25 4c.902 0 1.75.694 1.75 1.689V18.31c0 .995-.848 1.689-1.75 1.689-.762 0-1.505-.28-2.063-.798l-4.24-3.935H6.14c-1.118 0-2.14-.856-2.14-2.05v-2.433c0-1.195 1.022-2.05 2.14-2.05h1.807l4.24-3.936A3.035 3.035 0 0 1 14.25 4Zm-.05 1.801a1.23 1.23 0 0 0-.789.316l-4.499 4.176a.9.9 0 0 1-.612.24H6.14c-.14 0-.34.085-.34.25v2.433c0 .166.2.25.34.25H8.3a.9.9 0 0 1 .612.241l4.5 4.175c.2.187.481.305.788.317V5.801Zm7.338.464C23.058 7.792 24 9.792 24 12s-.943 4.208-2.462 5.735a.9.9 0 1 1-1.276-1.27C21.489 15.232 22.2 13.675 22.2 12c0-1.674-.71-3.232-1.938-4.465a.9.9 0 1 1 1.276-1.27Zm-2.551 3.053C19.613 10.058 20 10.983 20 12s-.387 1.943-1.013 2.682a.9.9 0 0 1-1.374-1.164c.383-.451.587-.974.587-1.518s-.204-1.067-.587-1.518a.9.9 0 0 1 1.374-1.164Z"/></svg>
                        <span class="cursor-pointer">Сәлем! Қазақ тілін үйренуге дайынсың ба?</span>
                    </button>
                </div>
            </div>

            <div class="flex flex-col gap-8 items-center w-full">
                <h2 class="text-2xl font-medium flex gap-2 items-center text-gray-800">
                    <svg class="cursor-default" fill="none" height="34" viewBox="0 0 24 24" width="34" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path class="cursor-default fill-cyan-500" d="m5.25471 5.89162c.33377-.36833.30576-.93749-.06256-1.27125-.36833-.33377-.93749-.30576-1.27126.06256-1.75226 1.93367-2.82088 4.50163-2.82088 7.31707 0 2.8155 1.06862 5.3834 2.82088 7.3171.33377.3683.90293.3963 1.27126.0625.36832-.3337.39633-.9029.06256-1.2712-1.46397-1.6155-2.3547-3.7569-2.3547-6.1084 0-2.35149.89073-4.49285 2.3547-6.10838z"/><path class="fill-cyan-500 cursor-default" d="m20.0791 4.68293c-.3338-.36832-.9029-.39633-1.2712-.06256-.3684.33376-.3964.90292-.0626 1.27125 1.464 1.61553 2.3547 3.75689 2.3547 6.10838 0 2.3515-.8907 4.4929-2.3547 6.1084-.3338.3683-.3058.9375.0626 1.2712.3683.3338.9374.3058 1.2712-.0625 1.7523-1.9337 2.8209-4.5016 2.8209-7.3171 0-2.81544-1.0686-5.3834-2.8209-7.31707z"/><path class="fill-cyan-500 cursor-default" d="m8.10236 8.71068c.3208-.37968.27307-.94752-.1066-1.26832-.37968-.3208-.94753-.27308-1.26832.1066-1.01485 1.20109-1.62743 2.75574-1.62743 4.45104s.61258 3.25 1.62743 4.451c.32079.3797.88864.4274 1.26832.1066.37967-.3208.4274-.8886.1066-1.2683-.75066-.8884-1.20235-2.0349-1.20235-3.2893s.45169-2.4009 1.20235-3.28932z"/><path class="fill-cyan-500 cursor-default" d="m17.2726 7.54896c-.3208-.37968-.8887-.4274-1.2683-.1066-.3797.3208-.4274.88864-.1066 1.26832.7506.88842 1.2023 2.03492 1.2023 3.28932s-.4517 2.4009-1.2023 3.2893c-.3208.3797-.2731.9475.1066 1.2683.3796.3208.9475.2731 1.2683-.1066 1.0148-1.201 1.6274-2.7557 1.6274-4.451s-.6126-3.24995-1.6274-4.45104z"/><path class="fill-cyan-500 cursor-default" d="m12.9 10.9h1.1c.4971 0 .9-.4029.9-.9 0-.49705-.4029-.89999-.9-.89999h-4c-.49705 0-.89999.40294-.89999.89999 0 .4971.40294.9.89999.9h1.1v3.6c0 .4971.4029.9.9.9s.9-.4029.9-.9z"/></g></svg>
                    <span>Озвучить на казахском языке</span>
                </h2>
                <div class="flex flex-col w-full gap-4" style="max-width: 540px;">
                    <p class="text-gray-500 text-base font-mono text-center">Пожалуйста, напишите сюда текст, который вы бы хотели услышать произнесённым на казахском языке</p>
                    <textarea id="audioText" class="resize-none w-full h-28 px-4 py-3 rounded text-lg border-slate-100 border" placeholder="Введите текст"></textarea>
                    <button id="getAudio" class="flex items-center justify-center gap-1.5 cursor-pointer bg-orange-600 px-2 py-3 text-slate-50 rounded-lg text-lg w-full h-fit hover:bg-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M18.5 11.134a1 1 0 0 1 0 1.732l-9 5.196a1 1 0 0 1-1.5-.866V6.804a1 1 0 0 1 1.5-.866l9 5.196Z"/></svg>
                        <span class="cursor-pointer">Озвучить</span>
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap justify-center w-full p-2 py-10 gap-x-32 gap-12 items-center">
                <div class="flex flex-col gap-4" style="max-width: 460px;">
                    <h1 class="text-4xl font-medium max-w-md text-gray-700">Сертификат за Прохождение</h1>
                    <p class="text-lg">Пройдите наши уроки по казахскому языку и получите от нас сертификат, подтверждающий ваше стремление к знаниям и усердие в изучении этого важного языка.</p>
                </div>
                <img width="260" src="/img/certificate.png" />
            </div>

            <div class="flex flex-col gap-12 w-full items-center">
                <h2 class="text-2xl font-medium flex gap-2 items-center text-gray-800">
                    <svg class="cursor-default fill-red-400" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 28 28"><path class="cursor-default" fill-rule="evenodd" d="M12.246 11.024a.354.354 0 0 0-.479.25 13.693 13.693 0 0 0-.267 2.7c0 .944.096 1.864.278 2.752.039.19.244.333.48.25a13.992 13.992 0 0 0 4.625-2.728.317.317 0 0 0 0-.492 13.99 13.99 0 0 0-4.637-2.732Zm.665-1.886c-1.362-.48-2.823.34-3.105 1.743a15.765 15.765 0 0 0 .013 6.247c.287 1.4 1.746 2.214 3.105 1.733a15.993 15.993 0 0 0 5.287-3.118 2.316 2.316 0 0 0 0-3.483 15.993 15.993 0 0 0-5.3-3.122Z M6.07 3.801C7.164 3.216 8.243 3 10.691 3h6.616c2.448 0 3.527.216 4.622.801A5.465 5.465 0 0 1 24.2 6.07c.585 1.096.801 2.175.801 4.623v6.616c0 2.448-.216 3.527-.801 4.622a5.465 5.465 0 0 1-2.27 2.269c-1.095.585-2.174.801-4.622.801h-6.616c-2.448 0-3.527-.216-4.623-.801a5.465 5.465 0 0 1-2.268-2.269C3.216 20.835 3 19.756 3 17.308v-6.616c0-2.448.216-3.527.801-4.623A5.466 5.466 0 0 1 6.07 3.801ZM10.691 5c-2.335 0-3.019.212-3.68.565a3.466 3.466 0 0 0-1.447 1.448C5.212 7.673 5 8.357 5 10.692v6.616c0 2.335.212 3.019.565 3.68a3.466 3.466 0 0 0 1.448 1.447c.66.353 1.344.565 3.679.565h6.616c2.335 0 3.019-.212 3.68-.565a3.467 3.467 0 0 0 1.447-1.448c.353-.66.565-1.344.565-3.679v-6.616c0-2.335-.212-3.019-.565-3.68a3.466 3.466 0 0 0-1.448-1.447C20.327 5.212 19.643 5 17.308 5h-6.616Z" clip-rule="evenodd"/></svg>    
                    <span>Видео уроки</span>
                </h2>
                <div class="flex w-full gap-1 pb-8 justify-center h-fit">
                    <div class="w-full carousel-slide flex flex-wrap gap-4 justify-center">
                        <?
                        
                            $videos = $db->query(
                                "SELECT * FROM `videos`"
                            )->fetch_all(MYSQLI_ASSOC);
                            $isAdmin = false;
                            if($user->isAuthorized()) {
                                if($user->getPermission()['name'] == 'admin')
                                    $isAdmin = true;
                            }
                            foreach($videos as $video) {
                                if($isAdmin) {
                                    ?>
                                        <form method="POST" class="w-fit flex flex-col gap-2">
                                            <iframe class="rounded-lg w-full max-w-md" style="height: 240px;" src="<?=$video['video_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            <input class="px-2 py-2 border-slate-900 border rounded" name="video_url" value="<?=$video['video_url']?>" />
                                            <button name="video_save" value="<?=$video['video_id']?>" class="cursor-pointer bg-slate-900 text-lg rounded-xl w-full h-fit px-4 py-2 text-slate-50 hover:bg-gray-800">Сохранить ссылку</button>
                                        </form>                                        
                                    <?
                                }else {
                                    ?>
                                        <iframe class="rounded-lg" width="220" style="height: 400px;" src="<?=$video['video_url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <?
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center gap-6 bg-purple-50 px-8 py-8 rounded-lg">
                <svg class="cursor-default" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="none" viewBox="0 0 32 32"><path class="cursor-default" fill="url(#a)" d="M0 16C0 7.1634 7.1634 0 16 0s16 7.1634 16 16-7.1634 16-16 16S0 24.8366 0 16Z"/><path class="cursor-default" fill="#fff" d="m19.3435 12.485 4.4295.4249c1.5413.1479 2.014 1.6535.8238 2.6426l-3.4678 2.8822 1.2874 4.6953c.4227 1.5419-.8889 2.4753-2.2027 1.5473L16 21.701l-4.2137 2.9763c-1.3084.9243-2.6255-.0052-2.2027-1.5473l1.2874-4.6953-3.4678-2.8822c-1.1952-.9933-.7244-2.494.8235-2.6426l4.4288-.4249 1.9512-4.4987c.611-1.4088 2.1759-1.408 2.7865.0001l1.9503 4.4986Z"/><defs><linearGradient id="a" x1="-16" x2="16" y1="16" y2="48" gradientUnits="userSpaceOnUse"><stop stop-color="#FFB73D"/><stop offset="1" stop-color="#FFA000"/></linearGradient></defs></svg>
                <p class="text-2xl font-medium">Присоединяйтесь к нам сегодня и начните свой путь к овладению казахским языком и новым знаниям!</p>
                <?
                    if($user->isAuthorized()) {
                        ?>
                            <a href="/profile" class="cursor-pointer bg-orange-500 px-3 py-4 text-slate-50 rounded-lg text-xl w-fit h-fit hover:bg-orange-500">Начать изучение</a>
                        <?
                    }else {
                        ?>
                            <a href="/auth" class="cursor-pointer bg-orange-500 px-3 py-4 text-slate-50 rounded-lg text-xl w-fit h-fit hover:bg-orange-500">Присоединиться</a>
                        <?
                    }
                ?>
            </div>

            <div class="w-full flex flex-col gap-8 items-center">
                <h2 class="text-2xl font-medium flex gap-2 items-center text-gray-800">
                    <svg class="fill-green-400 cursor-default" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 28 28"><path class="cursor-default" fill-rule="evenodd" d="M13.263 2.661a1.75 1.75 0 0 1 1.473 0l10.25 4.752c1.352.626 1.352 2.548 0 3.175l-10.25 4.755a1.75 1.75 0 0 1-1.472 0L3.016 10.595C1.664 9.97 1.663 8.048 3.014 7.42l10.25-4.759ZM14 4.524 4.346 9.007 14 13.48 23.656 9 14 4.524Zm11.91 9.526a1 1 0 0 1-.486 1.328l-10.686 4.961a1.75 1.75 0 0 1-1.473 0l-10.68-4.945a1 1 0 0 1 .84-1.815L14 18.476l10.582-4.912a1 1 0 0 1 1.328.486Zm-.481 6.252a1 1 0 1 0-.852-1.81L14 23.472 3.429 18.508a1 1 0 1 0-.85 1.81l10.677 5.015a1.75 1.75 0 0 0 1.49 0l10.682-5.03Z" clip-rule="evenodd"/></svg> 
                    <span>Уроки</span>
                </h2>
                <div class="w-full flex gap-2 flex-wrap justify-center">
                    <?
                        $lessons = $db->query(
                            "SELECT contexts.context_title, 
                            contexts.context_content, 
                            tabs.tab_id, pages.page_id FROM contexts, 
                            tabs, pages, pages_content WHERE pages.tab_id = tabs.tab_id
                            AND pages_content.page_id = pages.page_id AND pages_content.object_table = 'contexts'
                            AND pages_content.lang = 'ru' AND contexts.context_id = pages_content.object_id LIMIT 6"
                        )->fetch_all(MYSQLI_ASSOC);
                        foreach($lessons as $lesson) {
                            $tabId = $lesson['tab_id'];
                            $pageId = $lesson['page_id'];
                            $title = mb_substr($lesson['context_title'], 0, 30);
                            if(strlen($title) > 26)
                                $title .= "...";
                            $content = mb_substr($lesson['context_content'], 0, 130)."...";
                            ?>
                            <form method="POST" class="flex flex-col gap-2 bg-white px-6 py-8 rounded-xl w-full max-w-md drop-shadow-lg">
                                <h3 class="text-xl font-medium text-slate-950"><?=$title?></h3>
                                <hr class="m-2 border-slate-100" /> 
                                <p class="text-slate-800 flex-1"><?=$content?></p>
                                <button name="open-lesson" value="<?=$tabId?>" class="bg-slate-900 rounded-md w-fit h-fit p-2.5 text-slate-50 hover:bg-gray-800 my-2">Посмотреть</button>
                                <input hidden name="object_id" value="<?=$pageId?>" />
                            </form>
                            <?
                        }
                    ?>
                    
                </div>
            </div>

            <div class="flex flex-col gap-8 items-center">
                <h2 class="text-2xl font-medium flex gap-2 items-center text-gray-800">
                    <svg class="cursor-default" width="30px" height="30px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="flash_24">
                                <rect id="Bounds" x="0" y="0" width="24" height="24"></rect>
                                <path class="cursor-default fill-yellow-500" d="M9.77395908,19.1157772 C9.26128938,21.1805455 10.0310131,21.6082949 11.4079882,20.1008778 L17.1920678,13.4547313 C18.5303182,11.8212963 18.1951293,10.5089157 16.2679208,10.1808268 L13.4791681,9.66436529 C13.3162529,9.63419429 13.2086424,9.47766698 13.2388134,9.31475175 C13.2398089,9.3093766 13.240951,9.30402967 13.2422387,9.29871694 L14.3154203,4.87079674 C14.8295282,2.79291766 13.9726468,2.4166171 12.6873246,3.88912738 C10.8405188,5.97145685 9.43706316,7.54449265 8.47695771,8.60823477 C8.14222241,8.9791024 7.60341693,9.55798124 6.86054126,10.3448713 C5.2324456,12.1515247 6.08932704,13.4617658 7.9724807,13.7898547 L10.6376654,14.2676208 C10.8007512,14.2968558 10.9092586,14.4527627 10.8800235,14.6158484 C10.8788982,14.6221261 10.877573,14.6283663 10.8760498,14.6345594 L9.77395908,19.1157772 Z" id="Mask" fill="currentColor"></path>
                            </g>
                        </g>
                    </svg>    
                    <span>Наши преимущества</span>
                </h2>
                <div class="flex gap-2 flex-wrap justify-center">
                    <div class="flex flex-col gap-2 bg-white px-6 py-8 rounded-xl max-w-md drop-shadow-lg duration-300 hover:shadow-[0_0px_20px_3px_rgba(0,0,0,0.08)]">
                        <h3 class="text-xl font-medium text-slate-950">Гибкость и удобство</h3>
                        <hr class="m-2 border-slate-100" /> 
                        <p class="text-slate-800">Обучение проходит онлайн, что позволяет вам гибко планировать свое время и изучать язык в любом месте и в любое удобное для вас время. Наша платформа доступна 24/7, так что вы можете учиться, когда вам удобно.</p>
                    </div>
                    <div class="flex flex-col gap-2 bg-white px-6 py-8 rounded-xl max-w-md drop-shadow-lg duration-300 hover:shadow-[0_0px_20px_3px_rgba(0,0,0,0.08)]">
                        <h3 class="text-xl font-medium text-slate-950">Качественные учебные материалы</h3>
                        <hr class="m-2 border-slate-100" /> 
                        <p class="text-slate-800">Наша программа включает в себя разнообразные учебные материалы: аудио- и видеоматериалы, интерактивные упражнения, тексты для чтения и многое другое, чтобы обеспечить вам полноценное и эффективное обучение.</p>
                    </div>
                    <div class="flex flex-col gap-2 bg-white px-6 py-8 rounded-xl max-w-md drop-shadow-lg duration-300 hover:shadow-[0_0px_20px_3px_rgba(0,0,0,0.08)]">
                        <h3 class="text-xl font-medium text-slate-950">Практика с носителями</h3>
                        <hr class="m-2 border-slate-100" /> 
                        <p class="text-slate-800">Наши курсы предоставляют возможность практиковать язык с носителями, что помогает улучшить ваше произношение, понимание речи на слух и навыки общения на казахском языке.</p>
                    </div>
                    <div class="flex flex-col gap-2 bg-white px-6 py-8 rounded-xl max-w-md drop-shadow-lg duration-300 hover:shadow-[0_0px_20px_3px_rgba(0,0,0,0.08)]">
                        <h3 class="text-xl font-medium text-slate-950">Сеть поддержки</h3>
                        <hr class="m-2 border-slate-100" /> 
                        <p class="text-slate-800">Наша команда профессиональных преподавателей всегда готова помочь вам с вашими вопросами и трудностями в процессе обучения. Мы стремимся создать поддерживающую и вдохновляющую образовательную среду для наших студентов.</p>
                    </div>
                </div>
            </div>
            <div class="p-2 w-full flex flex-col gap-8 items-center">
                <h2 class="text-2xl font-medium flex gap-2 items-center text-gray-800">
                    <svg fill="none" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path class="fill-pink-500" clip-rule="evenodd" d="m8.49993 8.09998c0-1.933 1.56697-3.5 3.49997-3.5s3.5 1.567 3.5 3.5c0 1.93302-1.567 3.50002-3.5 3.50002s-3.49997-1.567-3.49997-3.50002zm3.49997 1.7c-.9389 0-1.7-.76112-1.7-1.7 0-.93889.7611-1.7 1.7-1.7s1.7.76111 1.7 1.7c0 .93888-.7611 1.7-1.7 1.7z" fill-rule="evenodd"/><path class="fill-pink-500" clip-rule="evenodd" d="m12.0003 13.1c-1.504 0-2.92554.3536-4.00207 1.015-1.07789.6623-1.89792 1.7023-1.89792 3.0397 0 .8095.27847 1.5324.85121 2.0428.55817.4975 1.29385.7025 2.04879.7025h5.99999c.755 0 1.4906-.205 2.0488-.7025.5727-.5104.8512-1.2333.8512-2.0428 0-1.3374-.82-2.3774-1.8979-3.0397-1.0765-.6614-2.4981-1.015-4.0021-1.015zm-4.09999 4.0547c0-.5173.30536-1.0545 1.04017-1.506.73616-.4523 1.81462-.7487 3.05982-.7487s2.3237.2964 3.0598.7487c.7348.4515 1.0402.9887 1.0402 1.506 0 .3859-.1215.5856-.2488.699-.1418.1264-.4061.2463-.8512.2463h-5.99999c-.44506 0-.70938-.1199-.85121-.2463-.12726-.1134-.24879-.3131-.24879-.699z" fill-rule="evenodd"/><path class="fill-pink-500" d="m5.90335 13.7c0-.4971-.40295-.9-.90001-.9-2.00675 0-3.95 1.276-3.95 3.3571 0 1.2631.87016 2.7429 2.60711 2.7429.49705 0 .9-.4029.9-.9s-.40295-.9-.9-.9c-.27194 0-.44983-.1042-.57534-.254-.13985-.1669-.23177-.4168-.23177-.6889 0-.731.73929-1.5571 2.15-1.5571.49706 0 .90001-.4029.90001-.9z"/><path class="fill-pink-500" d="m6.31446 5.45905c.49206-.0703.94794.2716 1.01824.76366s-.2716.94794-.76366 1.01824c-.60794.08686-1.06887.60664-1.06887 1.22549 0 .67925.555 1.23828 1.25 1.23828.49706 0 .9.40298.9.89998 0 .4971-.40294.9-.9.9-1.67982 0-3.05-1.3556-3.05-3.03826 0-1.53471 1.13964-2.79671 2.61429-3.00739z"/><path class="fill-pink-500" d="m18.0965 13.7c0-.4971.403-.9.9-.9 2.0068 0 3.95 1.276 3.95 3.3571 0 1.2631-.8701 2.7429-2.6071 2.7429-.497 0-.9-.4029-.9-.9s.403-.9.9-.9c.2719 0 .4498-.1042.5753-.254.1399-.1669.2318-.4168.2318-.6889 0-.731-.7393-1.5571-2.15-1.5571-.497 0-.9-.4029-.9-.9z"/><path class="fill-pink-500" d="m17.6859 5.45905c-.4921-.0703-.948.2716-1.0183.76366s.2716.94794.7637 1.01824c.6079.08686 1.0689.60664 1.0689 1.22549 0 .67925-.555 1.23828-1.25 1.23828-.4971 0-.9.40298-.9.89998 0 .4971.4029.9.9.9 1.6798 0 3.05-1.3556 3.05-3.03826 0-1.53471-1.1397-2.79671-2.6143-3.00739z"/></g></svg> 
                    <span>Команда проекта</span>
                </h2>
                <div class="w-full  flex gap-4 flex-wrap justify-center">
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/arnur.jpg); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Тұраров Арнұр Ерсоветович</h3>
                        <p class="text-slate-800">Руководитель проекта</p>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/bakytzhan.webp); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Копжасаров Бақытжан Турмышевич</h3>
                        <p class="text-slate-800">Технический консультант</p>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/rustem.jpg); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Жумабек Рустем Русланұлы</h3>
                        <p class="text-slate-800">Web разработчик</p>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/ramazan.jpg); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Жайлау Рамазан Бахтиярұлы</h3>
                        <p class="text-slate-800">Мобильный разработчик</p>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/aruzhan.PNG); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Ражапова Аружан Нурбекқызы</h3>
                        <p class="text-slate-800">Дизайнер</p>
                    </div>
                    <div class="flex flex-col items-center gap-2 bg-white px-6 py-10 rounded-xl w-full max-w-72 drop-shadow-lg duration-300 border hover:border-pink-600">
                        <div style="width: 100px; height: 100px; border-radius: 100%; background-image: url(/img/aisara.jpg); background-position: center; background-size: cover;"></div>
                        <h3 class="text-xl font-medium text-slate-950 mt-4 mb-2 w-full text-center flex-1">Мамиева Айсара Бақытқызы</h3>
                        <p class="text-slate-800">Редактор</p>
                    </div>
                </div>
            </div>
            <footer class="w-full flex justify-between px-6 py-8">
                <h5>© Все права защищены 2024</h5>
              
            </footer>
        </div>
    </div>
    <script src="/js/mobile.js"></script>
    <script>
        document.getElementById('getAudio').addEventListener('click', () => {
            const audioText = document.getElementById('audioText')
            const audioTextObj = { innerText: audioText.value }
            speak(audioTextObj, 1)
        })
    </script>

</body>
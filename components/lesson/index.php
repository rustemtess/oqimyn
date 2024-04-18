<?

$title = $lesson['context_title'];
$content = $lesson['context_content'];

$title = mb_substr($title, 0, 26);
if(strlen($title) > 23)
    $title .= "...";
$tabTitle = mb_substr($tabTitle, 0, 18);
if(strlen($tabTitle) > 23)
    $tabTitle .= "...";
$content = mb_substr($content, 0, 110)."...";

$progressDo = (intval($progress['DO']) != 0) 
    ? (intval($progress['DO']) * 100) / intval($progress['FULL']) 
    : 0;
$progressDo = round($progressDo);

if($progressDo == 0) {
    $lessonText = 'Начать курс';
    $progressText = 'Не выполнено';
}
if($progressDo > 0) {
    $progressText = 'В прогрессе';
    $lessonText = 'Продолжить';
    $progressColor = 'bg-red-400';
}
if($progressDo >= 50) {
    $progressText = 'В прогрессе';
    $progressColor = 'bg-amber-400';
}
if($progressDo == 100) {
    $progressText = 'Выполнено';
    $lessonText = 'Посмотреть';
    $progressColor = 'bg-green-400';
}

?>

<div class="flex flex-col gap-5 justify-between bg-white py-4 px-4 h-auto w-80 rounded-xl drop-shadow-xl">
    <div class="flex justify-between items-center">
        <p class="text-base text-slate-600 Truncate"><?=$tabTitle?> | Урок <?=$pageCount?></p>
        <a href="/<?=$tabId?>/<?=$page_id?>" class="flex gap-2 items-center cursor-pointer bg-slate-800 px-2 py-1 text-slate-50 rounded text-base w-inherit h-fit hover:bg-slate-700">
            <?=$lessonText?>
        </a>
    </div>
    <div class="flex flex-col items-center gap-2 justify-start h-full">
        <h2 class="font-medium text-lg text-gray-900 text-center"><?=$title?></h2>
        <p class="text-base text-gray-800"><?=$content?></p>
    </div>
    <div class="flex flex-col gap-1.5">
        <p class="text-xs w-full text-left"><?=$progressText?></p>
        <div class="w-full h-1.5 bg-slate-100 rounded">
            <div class="<?=$progressColor?> h-1.5 rounded" style="width: <?=$progressDo?>%;"></div>
        </div>
        <p class="text-xs w-full text-right"><?=$progressDo?>%</p>
    </div>
</div>
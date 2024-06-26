<?php

include_once './components/description/description.controller.php';

$description = getDescription($object_id);
if($userPermissionName == null) {
    $userPermissionName = 'none';
}

?>

<form method="POST" class="flex flex-col gap w-full text-xl">
    <?
        if($userPermissionName == 'admin') {
            ?>
                <div class="flex gap-2">
                    <button name="description_del" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill-rule="evenodd" d="M10.944 9.502a1 1 0 0 0-.943 1.053l.5 9a1 1 0 0 0 1.998-.11l-.5-9a1 1 0 0 0-1.055-.943Zm6.111 0A1 1 0 0 1 18 10.555l-.5 9a1 1 0 0 1-1.997-.11l.5-9a1 1 0 0 1 1.053-.943Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M3.5 5a1 1 0 0 0 0 2h1.096l1.298 12.823c.073.73.135 1.334.224 1.826.092.513.227.98.488 1.414a4 4 0 0 0 1.72 1.554c.458.216.936.303 1.456.344.498.039 1.106.039 1.84.039h4.757c.733 0 1.34 0 1.84-.039.519-.04.997-.128 1.455-.344a4 4 0 0 0 1.72-1.554c.261-.434.396-.901.489-1.414.088-.492.15-1.097.223-1.826L23.404 7H24.5a1 1 0 1 0 0-2h-6.111a4.502 4.502 0 0 0-8.777 0H3.5Zm4.38 14.583c.078.778.132 1.304.206 1.71.07.394.148.596.234.738a2 2 0 0 0 .86.778c.15.07.359.127.758.158.41.032.94.033 1.722.033h4.68c.782 0 1.311 0 1.723-.033.399-.031.607-.087.758-.158.356-.169.656-.44.86-.778.085-.142.162-.344.233-.738.074-.406.128-.932.206-1.71L21.395 7H6.606L7.88 19.583ZM14 3.5A2.5 2.5 0 0 0 11.708 5h4.584A2.5 2.5 0 0 0 14 3.5Z" clip-rule="evenodd"/></svg>
                    </button>
                    <button name="description_up" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                        Наверх
                    </button>
                    <button name="description_down" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                        Вниз    
                    </button>
                </div>
            <?
        }
    ?>
    <h2 class="w-full text-slate-800 font-medium"><?=$description['description_title']?></h2>
    <p class="w-full text-lg text-slate-600">
        <?=$description['description_content']?>
    </p>
</form>
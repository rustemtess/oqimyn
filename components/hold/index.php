<?php

include_once './components/hold/hold.controller.php';

$task = new Task($object_table, $object_id);
$left_data_set = getLeftData($object_id);
$left_data_set = array_column($left_data_set, 'hold_base_word_left');
$right_data_set = getRightData($object_id);
$save_left_data_set = join('#', $left_data_set);

include_once './components/hold/hold.action.php';

if($userPermissionName == null) {
    $userPermissionName = 'none';
}


?>

<div class="flex flex-col w-full">
    <form method="POST" class="font-sans subpixel-antialiased flex flex-col text-xl gap-2">
        <?
            if($userPermissionName == 'admin') {
                ?>
                    <div class="flex flex-row gap-2">
                        <button name="hold_del" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill-rule="evenodd" d="M10.944 9.502a1 1 0 0 0-.943 1.053l.5 9a1 1 0 0 0 1.998-.11l-.5-9a1 1 0 0 0-1.055-.943Zm6.111 0A1 1 0 0 1 18 10.555l-.5 9a1 1 0 0 1-1.997-.11l.5-9a1 1 0 0 1 1.053-.943Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M3.5 5a1 1 0 0 0 0 2h1.096l1.298 12.823c.073.73.135 1.334.224 1.826.092.513.227.98.488 1.414a4 4 0 0 0 1.72 1.554c.458.216.936.303 1.456.344.498.039 1.106.039 1.84.039h4.757c.733 0 1.34 0 1.84-.039.519-.04.997-.128 1.455-.344a4 4 0 0 0 1.72-1.554c.261-.434.396-.901.489-1.414.088-.492.15-1.097.223-1.826L23.404 7H24.5a1 1 0 1 0 0-2h-6.111a4.502 4.502 0 0 0-8.777 0H3.5Zm4.38 14.583c.078.778.132 1.304.206 1.71.07.394.148.596.234.738a2 2 0 0 0 .86.778c.15.07.359.127.758.158.41.032.94.033 1.722.033h4.68c.782 0 1.311 0 1.723-.033.399-.031.607-.087.758-.158.356-.169.656-.44.86-.778.085-.142.162-.344.233-.738.074-.406.128-.932.206-1.71L21.395 7H6.606L7.88 19.583ZM14 3.5A2.5 2.5 0 0 0 11.708 5h4.584A2.5 2.5 0 0 0 14 3.5Z" clip-rule="evenodd"/></svg>
                        </button>
                        <button name="hold_up" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            Наверх
                        </button>
                        <button name="hold_down" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            Вниз    
                        </button>
                    </div>
                <?
            }
        ?>
        <div class="flex flex-row gap-2 flex-wrap">
            <input hidden name="object_id" value="<?=$object_id?>" />
            <input hidden name="object_list" value="<?=$save_left_data_set?>" />
            <div class="flex flex-wrap gap-4">
                <?
                if(!$task->isCompleted()) {
                    shuffle($left_data_set);
                    ?>
                        <div class="flex flex-col gap-2">
                        <?
                        foreach($left_data_set as $value) {
                            ?>
                                <p class="bg-slate-200 cursor-grab w-fit text-center rounded-md p-1 px-3" data-text="Text 1" draggable="true" ondragstart="drag(event)"><?=$value?></p>
                            <?            
                        }                                        
                        ?>
                        </div>
                        <?
                }
                ?>

                <div class="flex">
                    <div class="flex flex-col gap-2">
                        <?
                            for($i = 0; $i < count($right_data_set); $i++){
                                if($task->isCompleted()) {
                                    ?>
                                        <input readonly class="bg-gray-100 w-32 text-center rounded-md p-1" value="<?=$left_data_set[$i]?>" ondrop="drop(event)" ondragover="allowDrop(event)" placeholder="Текст" />
                                    <?
                                }else {
                                    ?>
                                        <input class="bg-gray-100 w-32 text-center rounded-md p-1" name="right[]" ondrop="drop(event)" ondragover="allowDrop(event)" placeholder="Текст" />
                                    <?
                                }
                            }
                        ?>
                    </div>
                    <div class="flex flex-col gap-2">
                        <?
                            foreach($right_data_set as $right_data) {
                                ?>
                                    <p class="w-fit text-center rounded-md p-1 px-2" data-text="Text 2"><?=$right_data['hold_base_word_right']?></p>            
                                <?
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
            <?
            if(!$task->isCompleted()) {
                if(isset($_SESSION['demo']) && !$_SESSION['demo']) {
                    ?>
                        <button id="id-h<?=$object_id?>" class="bg-slate-900 rounded-md w-fit h-fit p-2.5 text-slate-50 hover:bg-gray-800" name="hold_finish">Проверить</button>
                        <script>
                            document.getElementById("id-h<?=$object_id?>").addEventListener('click', function() {
                                var btnPosition = this.getBoundingClientRect().top + window.scrollY;
                                this.value = btnPosition; // Сохраняем позицию кнопки в input
                            });
                        </script>
                    <?
                }
            }else {
                ?>
                    <p class="bg-zinc-600 text-slate-50 rounded px-2 py-1 text-base flex gap-2 items-center w-fit h-fit">Выполнено<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path fill="rgb(132 204 22)" d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-.091,15.419c-.387.387-.896.58-1.407.58s-1.025-.195-1.416-.585l-2.782-2.696,1.393-1.437,2.793,2.707,5.809-5.701,1.404,1.425-5.793,5.707Z"/></svg></p>
                <?
            }
        ?>
    </form>
    <p id="err-<?=$object_table.$object_id?>"></p>
</div>
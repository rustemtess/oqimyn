<?

include_once './components/drag/drag.controller.php';
include_once './components/drag/drag.action.php';

$task = new Task($object_table, $object_id);
$getDrag = getDrag($object_id);
if($userPermissionName == null) {
    $userPermissionName = 'none';
}

?>

<div class="flex flex-col w-full">
    <form method="POST" class="flex flex-col flex-wrap font-sans subpixel-antialiased gap-4 text-xl">
        <input hidden name="object_id" value="<?=$object_id?>" />
        <?
            if($userPermissionName == 'admin') {
                ?>
                    <div class="flex gap-2">
                        <button name="drag_del" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 28 28"><path fill-rule="evenodd" d="M10.944 9.502a1 1 0 0 0-.943 1.053l.5 9a1 1 0 0 0 1.998-.11l-.5-9a1 1 0 0 0-1.055-.943Zm6.111 0A1 1 0 0 1 18 10.555l-.5 9a1 1 0 0 1-1.997-.11l.5-9a1 1 0 0 1 1.053-.943Z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M3.5 5a1 1 0 0 0 0 2h1.096l1.298 12.823c.073.73.135 1.334.224 1.826.092.513.227.98.488 1.414a4 4 0 0 0 1.72 1.554c.458.216.936.303 1.456.344.498.039 1.106.039 1.84.039h4.757c.733 0 1.34 0 1.84-.039.519-.04.997-.128 1.455-.344a4 4 0 0 0 1.72-1.554c.261-.434.396-.901.489-1.414.088-.492.15-1.097.223-1.826L23.404 7H24.5a1 1 0 1 0 0-2h-6.111a4.502 4.502 0 0 0-8.777 0H3.5Zm4.38 14.583c.078.778.132 1.304.206 1.71.07.394.148.596.234.738a2 2 0 0 0 .86.778c.15.07.359.127.758.158.41.032.94.033 1.722.033h4.68c.782 0 1.311 0 1.723-.033.399-.031.607-.087.758-.158.356-.169.656-.44.86-.778.085-.142.162-.344.233-.738.074-.406.128-.932.206-1.71L21.395 7H6.606L7.88 19.583ZM14 3.5A2.5 2.5 0 0 0 11.708 5h4.584A2.5 2.5 0 0 0 14 3.5Z" clip-rule="evenodd"/></svg>
                        </button>
                        <button name="drag_up" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            Наверх
                        </button>
                        <button name="drag_down" value="<?=$object_id?>" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-fit h-fit hover:bg-orange-500">
                            Вниз    
                        </button>
                    </div>
                <?
            }
            if(!$task->isCompleted()) {
                ?>
                <h3><?=str_replace('{text}', '<input class="border-b border-slate-200 w-fit text-center p-1" name="text" ondrop="drop(event)" ondragover="allowDrop(event)" placeholder="Слово" />', $getDrag['drag_text'])?></h3>
                <div class="flex flex-row gap-3 flex-wrap">
                    <?
                        foreach(
                            getDragBase($object_id) as $dragBase
                        ) {
                            ?>
                                <p class="cursor-grab bg-gray-100 w-fit text-center rounded-md p-2 py-1.5" draggable="true" ondragstart="drag(event)"><?=$dragBase['drag_base_word']?></p>
                            <?
                        }
                    ?>
                </div>
                <input hidden name="object_id" value="<?=$object_id?>" />
                <?
                    if(isset($_SESSION['demo']) && !$_SESSION['demo']) {
                        ?>
                        <button id="id-<?=$object_id?>" value class="btn-class bg-slate-900 rounded-md w-fit p-2.5 py-1.5 text-slate-50 hover:bg-gray-800" name="drag_finish">Проверить</button>          
                        <script>
                            document.getElementById("id-<?=$object_id?>").addEventListener('click', function() {
                                var btnPosition = this.getBoundingClientRect().top + window.scrollY;
                                this.value = btnPosition; // Сохраняем позицию кнопки в input
                            });
                        </script>
                        <?
                    }
                ?>
                <?
            }else {
                ?>
                    <div class="flex gap-3 items-center">
                        <h3><?=str_replace('{text}', getDragText($object_id), $getDrag['drag_text'])?></h3>
                        <p class="bg-zinc-600 text-slate-50 rounded px-2 py-1 text-base flex gap-2 items-center w-fit">Выполнено<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path fill="rgb(132 204 22)" d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-.091,15.419c-.387.387-.896.58-1.407.58s-1.025-.195-1.416-.585l-2.782-2.696,1.393-1.437,2.793,2.707,5.809-5.701,1.404,1.425-5.793,5.707Z"/></svg></p>
                    
                    </div> 
                <?
            }

        ?>
    </form>
    <p id="err-<?=$object_table.$object_id?>"></p>
</div>

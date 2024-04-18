<?php

if(isset($_POST['drag_finish'])) {
    $object_ids = $object_table.intval($_POST['object_id']);
    $task = new Task($object_table, $_POST['object_id']);
    $text = (string) $_POST['text'];
    $_SESSION['scrollPosition'] = $_POST['drag_finish'];
    if(solveDrag($task->getTaskId(), $text)){
        if(!$task->isCompleted()) $task->complete();
    }
    else {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const err = document.getElementById("err-<?=$object_ids?>")
                    err.classList = 'text-base bg-orange-500 w-fit px-4 py-2 text-white rounded mt-2'
                    err.innerText = 'Неправильно, попробуйте еще раз'
                })
                
            </script>
        <?
    }
}

if(isset($_POST['drag_up'])) {
    $task = new Task($object_table, $_POST['object_id']);
    $task->up();
}
if(isset($_POST['drag_down'])) {
    $task = new Task($object_table, $_POST['object_id']);
    $task->down();
}

if(isset($_POST['save_drag'])) {
    $text = (string) ltrim(rtrim($_POST['text']));
    $options = (array) explode(",", $_POST['options']);
    $correct_number = intval($_POST['correct_number']);
    addDrag($text, $correct_number, $options);
}

if(isset($_POST['drag_del'])) {
    delDrag(intval($_POST['drag_del']));
}
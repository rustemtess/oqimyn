<?php

include_once './components/hold/hold.controller.php';

if(isset($_POST['hold_finish'])) {
    $object_ids = $object_table.intval($_POST['object_id']);
    $task = new Task($object_table, intval($_POST['object_id']));
    $_SESSION['scrollPosition'] = $_POST['hold_finish'];
    if(solveHold(explode('#', $_POST['object_list']), $_POST['right'])) {
        if(!$task->isCompleted()) $task->complete();
    }else {
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

if(isset($_POST['save_hold'])) {
    $leftBase = (array) $_POST['left'];
    $rightBase = (array) $_POST['right'];
    addHoldBase($leftBase, $rightBase);
}

if(isset($_POST['hold_del'])) {
    delHold(intval($_POST['hold_del']));
}

if(isset($_POST['hold_up'])) {
    $task = new Task($object_table, $_POST['object_id']);
    $task->up();
}
if(isset($_POST['hold_down'])) {
    $task = new Task($object_table, $_POST['object_id']);
    $task->down();
}

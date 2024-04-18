<?php

if(isset($_POST['save_read'])) {
    $words = (array) explode(',', $_POST['words']);
    addWords($words);
}

if(isset($_POST['read_del'])) {
    delRead(intval($_POST['read_del']));
}

if(isset($_POST['read_up'])) {
    $task = new Task('tasks_read', $_POST['read_up']);
    $task->up();
}
if(isset($_POST['read_down'])) {
    $task = new Task('tasks_read', $_POST['read_down']);
    $task->down();
}
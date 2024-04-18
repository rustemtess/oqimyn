<?php

if(isset($_POST['save_description'])) {
    $title = (string) ltrim(rtrim($_POST['title']));
    $content = (string) ltrim(rtrim($_POST['content']));
    addDescription($title, $content);
}

if(isset($_POST['description_del'])) {
    delDescription(intval($_POST['description_del']));
}

if(isset($_POST['description_up'])) {
    $task = new Task('descriptions', $_POST['description_up']);
    $task->up();
}
if(isset($_POST['description_down'])) {
    $task = new Task('descriptions', $_POST['description_down']);
    $task->down();
}
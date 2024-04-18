<?php

if(isset($_POST['save_simple'])) {
    $text = (string) ltrim(rtrim($_POST['text']));
    addSimple($text);
}

if(isset($_POST['simple_del'])) {
    delSimple(intval($_POST['simple_del']));
}

if(isset($_POST['simple_up'])) {
    $task = new Task('simples', $_POST['simple_up']);
    $task->up();
}
if(isset($_POST['simple_down'])) {
    $task = new Task('simples', $_POST['simple_down']);
    $task->down();
}
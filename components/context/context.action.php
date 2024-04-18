<?php


if(isset($_POST['save_context'])) {
    if(!empty($_POST['lang'])) {
        $title = (string) ltrim(rtrim($_POST['title']));
        $content = (string) ltrim(rtrim($_POST['content']));
        $imgUrl = (string) ltrim(rtrim($_POST['image_url']));
        addContext($title, $content, $imgUrl);
    }
}

if(isset($_POST['context_del'])) {
    delContext(intval($_POST['context_del']));
}

if(isset($_POST['context_up'])) {
    $task = new Task('contexts', $_POST['context_up']);
    $task->up();
}
if(isset($_POST['context_down'])) {
    $task = new Task('contexts', $_POST['context_down']);
    $task->down();
}
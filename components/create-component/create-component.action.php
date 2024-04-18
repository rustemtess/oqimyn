<?php

include_once './components/drag/drag.controller.php';
include_once './components/drag/drag.action.php';
include_once './components/hold/hold.action.php';
include_once './components/hold/hold.controller.php';

if(isset($_POST['create'])) {
    if(isset($_POST['component_name']) && !empty($_POST['component_name'])) {
        $component_name = (string) $_POST['component_name'];
        include_once './components/'.$component_name.'/'.$component_name.'.create.php';
    }
}

if(isset($_POST['close'])) {
    $_SESSION['editor'] = false;
    loadPage();
}
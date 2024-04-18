<?php

if(isset($_POST['add'])) {
    addPage(intval($firstPage));
}

if(isset($_POST['delete'])) {
    deletePage(intval($secondPage), intval($firstPage));
    $pages = getPages($firstPage);
    $lastPageId = $pages[count($pages) -1 ]['page_id'];
    loadPage($lastPageId);
}

if(isset($_POST['open'])) {
    $_SESSION['editor'] = true;
    loadPage();
}

if(isset($_POST['new-tab'])) {
    $_SESSION['editor-tab'] = true;
    loadPage();
}

if(isset($_POST['edit_tab'])) {
    $_SESSION['new-tab'] = $_POST['edit_tab'];
    loadPage();
}

if(isset($_POST['save-tab'])) {
    addTab($_POST['tab-name']);
}

if(isset($_POST['close-tab'])) {
    $_SESSION['editor-tab'] = false;
    loadPage();
}

if(isset($_POST['delete_tab'])) {
    $tabId = intval($_POST['delete_tab']);
    deleteTab($tabId);
}

if(isset($_POST['save_edit_tab'])) {
    $tabId = intval($_POST['save_edit_tab']);
    $editedTab = $_POST['edited_tab'];
    changeTab($tabId, $editedTab);
    $_SESSION['new-tab'] = null;
}

if(isset($_POST['lang_change'])) {
    $_SESSION['lang'] = $_POST['lang_change'];
    loadPage();
}

if(isset($_POST['open-lesson'])) {
    $tabId = intval($_POST['open-lesson']);
    $pageId = intval($_POST['object_id']);
    $_SESSION['demoPage'] = $tabId.":".$pageId;
    header('Location: /demo');
}

if(isset($_POST['video_save'])) {
    $videoId = intval($_POST['video_save']);
    $videoUrl = $_POST['video_url'];
    $db->query("UPDATE `videos` SET `video_url`='$videoUrl' WHERE `video_id` = $videoId");
    header('Location: /');
}
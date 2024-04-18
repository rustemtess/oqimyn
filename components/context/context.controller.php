<?php

function getContext(int $context_id = 0): array {
    global $db;
    $context = $db->query(
        "SELECT `context_title`, `context_content`, `context_image_url` 
        FROM `contexts` WHERE `context_id` = $context_id"
    )->fetch_assoc();
    return ($context) ? $context : [];
}

function addContext(string $title = '', string $content = '', string $imageUrl = NULL) {
    global $db, $secondPage;
    $db->query(
        "INSERT INTO `contexts`(`context_title`, `context_content`, `context_image_url`) 
        VALUES ('$title','$content', '$imageUrl')"
    );
    $context_id = (int) $db->insert_id;
    addObject(intval($secondPage), 'contexts', $context_id, $_POST['lang']);
}

function delContext(int $object_id = 0): void {
    global $db;
    $objectTable = 'contexts';
    $db->query("DELETE FROM `$objectTable` WHERE `context_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
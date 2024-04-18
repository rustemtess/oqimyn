<?php

function getDescription(int $description_id = 0): array {
    global $db;
    return $db->query(
        "SELECT `description_title`, `description_content` 
        FROM `descriptions` WHERE `description_id` = $description_id"
    )->fetch_assoc();
}

function addDescription(string $title = '', string $content = '') {
    global $db, $secondPage;
    $db->query(
        "INSERT INTO `descriptions`(`description_title`, `description_content`) 
        VALUES ('$title','$content')"
    );
    $description_id = (int) $db->insert_id;
    addObject(intval($secondPage), 'descriptions', $description_id);
}

function delDescription(int $object_id = 0): void {
    global $db;
    $objectTable = 'descriptions';
    $db->query("DELETE FROM `$objectTable` WHERE `description_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
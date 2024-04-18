<?php

function getSimple(int $simple_id = 0): array {
    global $db;
    return $db->query(
        "SELECT `simple_text` 
        FROM `simples` WHERE `simple_id` = $simple_id"
    )->fetch_assoc();
}

function addSimple(string $text = '') {
    global $db, $secondPage;
    $db->query(
        "INSERT INTO `simples`(`simple_text`) 
        VALUES ('$text')"
    );
    $simple_id = (int) $db->insert_id;
    addObject(intval($secondPage), 'simples', $simple_id);
}

function delSimple(int $object_id = 0): void {
    global $db;
    $objectTable = 'simples';
    $db->query("DELETE FROM `$objectTable` WHERE `simple_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
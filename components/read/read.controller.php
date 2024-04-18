<?php

function getReadBase(int $read_id = 0): array {
    global $db;
    return $db->query(
        "SELECT * FROM `tasks_read_base` 
        WHERE `read_id` = $read_id"
    )->fetch_all(MYSQLI_ASSOC);
}

function addWords(array $words = []): void {
    global $db, $secondPage;
    $db->query("INSERT INTO `tasks_read`() VALUES ()");
    $read_id = $db->insert_id;
    foreach($words as $word) {
        $word = ltrim(rtrim($word));
        $db->query(
            "INSERT INTO `tasks_read_base`(`read_base_word`, `read_id`) 
            VALUES ('$word',$read_id)"
        );
    }
    addObject(intval($secondPage), 'tasks_read', $read_id);
}

function delRead(int $object_id = 0): void {
    global $db;
    $objectTable = 'tasks_read';
    $db->query("DELETE FROM `$objectTable` WHERE `read_id` = $object_id");
    $db->query("DELETE FROM `tasks_read_base` WHERE `read_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
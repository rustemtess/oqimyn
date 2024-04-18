<?php

function solveDrag(int $drag_id = 0, string $drag_text = ''): bool {
    global $db;
    return ($db->query(
        "SELECT `drag_base_word` FROM `tasks_drag_base` 
        WHERE `drag_id` = $drag_id AND `drag_base_word` = '$drag_text' AND `drag_base_correct` = 1"
    )->fetch_assoc() != null) ? true : false;
}

function getDragBase(int $drag_id = 0): array {
    global $db;
    return $db->query(
        "SELECT `drag_base_word` FROM `tasks_drag_base` 
        WHERE `drag_id` = $drag_id"
    )->fetch_all(MYSQLI_ASSOC);
}

function getDrag(int $drag_id = 0): array {
    global $db;
    return $db->query(
        "SELECT * FROM `tasks_drag` 
        WHERE `drag_id` = $drag_id"
    )->fetch_assoc();
}

function getDragText(int $drag_id = 0): string {
    global $db;
    return $db->query(
        "SELECT `drag_base_word` FROM `tasks_drag_base` 
        WHERE `drag_id` = $drag_id AND `drag_base_correct` = 1"
    )->fetch_assoc()['drag_base_word'];
}

function addDrag(string $text = '', int $correct_number = 0, array $options = []): void {
    global $db, $secondPage;
    $db->query("INSERT INTO `tasks_drag`(`drag_text`) VALUES ('$text')");
    $drag_id = $db->insert_id;
    $i = 0;
    foreach($options as $option) {
        $i += 1;
        $option = ltrim(rtrim($option));
        if($i == $correct_number)
            $db->query(
                "INSERT INTO `tasks_drag_base`(`drag_base_word`, `drag_base_correct`, `drag_id`) 
                VALUES ('$option','1',$drag_id)"
            );
        else
            $db->query(
                "INSERT INTO `tasks_drag_base`(`drag_base_word`, `drag_base_correct`, `drag_id`) 
                VALUES ('$option','0',$drag_id)"
            );
    }
    addObject(intval($secondPage), 'tasks_drag', $drag_id);
}

function delDrag(int $object_id = 0): void {
    global $db;
    $objectTable = 'tasks_drag';
    $db->query("DELETE FROM `$objectTable` WHERE `drag_id` = $object_id");
    $db->query("DELETE FROM `tasks_drag_base` WHERE `drag_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
<?php

function getLeftData(int $holdId = 0): array {
    global $db;
    return $db->query(
        "SELECT * FROM `tasks_hold_base_left`
        WHERE `hold_id` = '$holdId'"
    )->fetch_all(MYSQLI_ASSOC);
}

function getRightData(int $holdId = 0): array {
    global $db;
    return $db->query(
        "SELECT * FROM `tasks_hold_base_right`
        WHERE `hold_id` = '$holdId'"
    )->fetch_all(MYSQLI_ASSOC);
}

function addHoldBase(array $leftBase = [], array $rightBase = []): void {
    global $db, $secondPage;
    $db->query("INSERT INTO `tasks_hold`() VALUES ()");
    $holdId = $db->insert_id;
    $i = 0;
    foreach($leftBase as $leftText) {
        $leftText = ltrim(rtrim($leftText));
        $db->query("INSERT INTO `tasks_hold_base_left`(`hold_base_word_left`, `hold_id`) VALUES ('$leftText','$holdId')");
        $leftHoldId = $db->insert_id;
        $rightText = ltrim(rtrim($rightBase[$i]));
        $db->query("INSERT INTO `tasks_hold_base_right`(`hold_base_word_right`, `hold_base_id_left`, `hold_id`) VALUES ('$rightText','$leftHoldId','$holdId')");
        $i += 1;
    }
    addObject(intval($secondPage), 'tasks_hold', $holdId);
}

function solveHold(array $left_data_set = [], array $right_data_set = []): bool {
    if(count($right_data_set) != count($left_data_set)) return false;
    for($i = 0; $i < count($left_data_set); $i++) {
        if(!$right_data_set[$i]) return false;
        if($right_data_set[$i] != $left_data_set[$i]) {
            return false;
        }
    }
    return true;
}

function delHold(int $object_id = 0): void {
    global $db;
    $objectTable = 'tasks_hold';
    $db->query("DELETE FROM `$objectTable` WHERE `hold_id` = $object_id");
    $db->query("DELETE FROM `tasks_hold_base_left` WHERE `hold_id` = $object_id");
    $db->query("DELETE FROM `tasks_hold_base_right` WHERE `hold_id` = $object_id");
    $db->query("DELETE FROM `pages_content` WHERE `object_id` = $object_id AND `object_table` = '$objectTable'");
    loadPage();
}
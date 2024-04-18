<?php

if(isset($request_url[2])) $secondPage = $request_url[2];

function loadPage($pageId = 0, $fullPageUrl = ''): void {
    global $firstPage, $secondPage;
    if($pageId != 0) $secondPage = $pageId;
    if($fullPageUrl != '') {
        ?>
        <script>
            document.location.href = '<?=$fullPageUrl?>'
        </script>
        <?
    }else {
        ?>
        <script>
            document.location.href = '/<?=$firstPage?>/<?=$secondPage?>'
        </script>
        <?
    }
}

function getPageContent(string $lang = 'ru', bool $demo = false): array {
    global $db, $firstPage, $secondPage;
    if(!$demo) {
        return $db->query(
            "SELECT pages_content.* 
            FROM pages_content, tabs 
            WHERE tabs.tab_id = $firstPage 
            AND pages_content.page_id = $secondPage AND pages_content.lang = '$lang'"
        )->fetch_all(MYSQLI_ASSOC);
    }else {
        $demoPage = explode(':', $_SESSION['demoPage']);
        $tabId = intval($demoPage[0]);
        $pageId = intval($demoPage[1]);
        return $db->query(
            "SELECT pages_content.* 
            FROM pages_content, tabs 
            WHERE tabs.tab_id = $tabId
            AND pages_content.page_id = $pageId AND pages_content.lang = '$lang'"
        )->fetch_all(MYSQLI_ASSOC);
    }
}

function nextPage(): int {
    global $db, $firstPage, $secondPage;
    $pageId = $db->query("SELECT pages.page_id FROM `pages` WHERE tab_id = $firstPage AND page_id > $secondPage ORDER BY page_id ASC LIMIT 1")->fetch_assoc();
    return (
        $pageId
    ) ? intval($pageId['page_id']) : false;
}

function previousPage(): int {
    global $db, $firstPage, $secondPage;
    $pageId = $db->query(
        "SELECT MAX(pages.page_id) AS page_id
        FROM pages 
        WHERE tab_id = $firstPage AND page_id < $secondPage"
    )->fetch_assoc();
    return (
        $pageId
    ) ? intval($pageId['page_id']) : false;
}

function getTabs(): array {
    global $db;
    $sql = $db->query("SELECT * FROM `tabs`")->fetch_all(MYSQLI_ASSOC);
    if(!$sql) addTab('Example');
    return $db->query("SELECT * FROM `tabs`")->fetch_all(MYSQLI_ASSOC);;
}

function getPages(int $tabId = 0): array {
    global $db;
    return $db->query("SELECT * FROM `pages` WHERE `tab_id` = $tabId")->fetch_all(MYSQLI_ASSOC);
}

function addPage(int $tabId = 0): void {
    global $db;
    $db->query("INSERT INTO `pages`(`tab_id`) VALUES ($tabId)");
}

function deletePage(int $page_id = 0, int $tabId = 0): void {
    global $db;
    if(count(getPages($tabId)) == 1) addPage($tabId);
    $db->query("DELETE FROM `pages` WHERE `page_id` = $page_id AND `tab_id` = $tabId");
}

function addObject(int $page_id = 0, string $object_table = '', int $object_id = 0, string $lang = ''): void {
    global $db, $firstPage, $secondPage;
    if($lang == '') {
        $db->query(
            "INSERT INTO `pages_content`(`page_id`, `object_table`, `object_id`) VALUES ('$page_id','$object_table','$object_id')"
        );
    }else {
        $db->query(
            "INSERT INTO `pages_content`(`page_id`, `object_table`, `object_id`, `lang`) VALUES ('$page_id','$object_table','$object_id','$lang')"
        );
    }
    loadPage();
}

function addTab(string $tabName = ''): void {
    global $db;
    $db->query("INSERT INTO `tabs`(`tab_title`) VALUES ('$tabName')");
    $tabId = intval($db->insert_id);
    $db->query("INSERT INTO `pages`(`tab_id`) VALUES ($tabId)");
    loadPage();
}

function changeTab(int $tabId = 0, string $tabName = ''): void {
    global $db;
    $db->query("UPDATE `tabs` SET `tab_title`='$tabName' WHERE `tab_id` = $tabId");
    loadPage();
}

function deleteTab(int $tabId = 0): void {
    global $db;
    if(count(getTabs()) != 1) {
        $db->query("DELETE FROM `tabs` WHERE `tab_id` = $tabId");
        loadPage(0, getLastPage());
    }
}

function getLastPage(): string {
    $tabs = getTabs();
    $tabId = $tabs[count($tabs) - 1]['tab_id'];
    $pageId = getPages($tabId)[0]['page_id'];
    return '/'.$tabId.'/'.$pageId;
}

function getFirstPage(): string {
    $tabId = getTabs()[0]['tab_id'];
    $pageId = getPages($tabId)[0]['page_id'];
    return '/'.$tabId.'/'.$pageId;
}
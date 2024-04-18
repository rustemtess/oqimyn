<?php

/**
 * Checking for the existence of a page
 */
function isPageExists(string $path = ''): array {
    global $pages, $pagesAuth;
    if(array_key_exists($path, $pages)){
        return array(
            'isPage' => true,
            'isAuth' => false
        );
    }
    if(array_key_exists($path, $pagesAuth)){
        return array(
            'isPage' => true,
            'isAuth' => true
        );
    }
    return array(
        'isPage' => false
    );
}

function isGeneretedPage(): bool {
    global $db, $firstPage, $request_url;
    if(isset($request_url[2])) {
        $secondPage = (int) $request_url[2];
        return (
            $db->query(
                "SELECT tabs.tab_id, pages.page_id 
                FROM tabs, pages 
                WHERE tabs.tab_id = $firstPage 
                AND pages.page_id = $secondPage"
                )->fetch_assoc() != null
            ) ? true : false;
    }
    return false;
}

/**
 * If page not found
 */
function pageNotFound(): void {
    global $pageNotFound;
    include_once $pageNotFound;
}
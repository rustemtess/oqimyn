<?php

/**
 * Session start
 */
session_start();

/**
 * Include modules
 */
include_once 'pages.php';
include_once 'page.module.php';
include_once 'database/db.php';
include_once 'user/user.get.php';
include_once 'user/user.valid.php';

/**
 * REQUEST URI / ...
 */
$request_url = $_SERVER['REQUEST_URI'];
$request_url = (array) explode('/', $request_url);

$firstPage = $request_url[1];

/**
 * Init page tags
 */
include_once 'pages/components/head.php';

/**
 * User init
 */
$user = new UserGet(
    (isset($_SESSION['access_token'])) ? $_SESSION['access_token'] : false
);
$userId = $user->getUserId();

/**
 * Check the existing page
 */
$isPageExists = isPageExists($firstPage); 

if(!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ru';
}

if($isPageExists['isPage']) {
    if($isPageExists['isAuth'] && $user->isAuthorized())
        return include_once $pagesAuth[$firstPage];
    if(!$isPageExists['isAuth'])
        return include_once $pages[$firstPage];
    return pageNotFound();
}

else if($user->isAuthorized() && isGeneretedPage())
    return include_once $pageGenerate;
else if(!$isPageExists['isPage']) return pageNotFound();
else return pageNotFound();


?>
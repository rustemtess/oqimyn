<?php

/**
 * All pages
 */
$pages = (array) [
    '' => './pages/home.php',
    'auth' => './pages/auth.php',
    'register' => './pages/register.php',
    'demo' => './pages/demo.php'
];

$pagesAuth = (array) [
    'profile' => './pages/profile/index.php',
    'tasks' => './pages/profile/tasks.php',
    'exit' => './pages/profile/exit.php',
    'scrollUpdate' => './pages/scroll_update.php',
];


// Page not found
$pageNotFound = (string) './pages/error.php';

// Page for generate
$pageGenerate = (string) './pages/index.php';
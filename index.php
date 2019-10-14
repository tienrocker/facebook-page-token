<?php

require_once __DIR__ . '/config.php';

if (!isset($_SESSION['fb_access_token'])) {
    ?>
    <a href="login.php">login</a>
    <?php
    die();
}
try {
    // get danh sách pages
    $pages = $fb->get('/me/accounts?fields=access_token', $_SESSION['fb_access_token']);

    $pages = $pages->getDecodedBody();
    $page = $pages['data'][0];

    // get danh sách posts
    $posts = $fb->get('/' . $page['id'] . '/feed', $page['access_token']);
    $posts = $posts->getDecodedBody();
    $post = $posts['data'][0];

    // get danh sách comments
    $comments = $fb->get('/' . $post['id'] . '/comments?fields=from,parent,message,created_time&&summary=1&filter=stream&order=chronological', $page['access_token']);
    $comments = $comments->getDecodedBody();

    foreach ($comments as $comment) {
        var_dump($comment);
    }
} catch (\Exception $e) {
    @file_put_contents(__DIR__ . '/error.log', sprintf("[%s] %s %s \n", date('Y-m-d H:i:s'), $e->getMessage(), $e->getTraceAsString()), FILE_APPEND | LOCK_EX);
    header('Location: https://localhost/facebook-page-token/login.php');
}
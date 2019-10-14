<?php

require_once __DIR__ . '/config.php';

$helper = $fb->getRedirectLoginHelper();

$permissions = ['public_profile', 'email', 'manage_pages', 'pages_messaging']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/facebook-page-token/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

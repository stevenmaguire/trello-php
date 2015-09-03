<?php

require "../vendor/autoload.php";

$currentUrl = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://".$_SERVER['HTTP_HOST'].preg_replace('/\?.*$/', '', $_SERVER["REQUEST_URI"]);

set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($currentUrl) {
    if (E_RECOVERABLE_ERROR === $errno) {
        header('Location: ' . $currentUrl);
    }

    return false;
});

$client = new \Stevenmaguire\Services\Trello\Client(array(
    'key' => 'your-app-key',
    'secret' => 'your-app-secret',
    'name' => 'My sweet trello enabled app',
    'callbackUrl' => $currentUrl,
    'expiration' => '30days',
    'scope' => 'read,write',
));

session_start();

if (isset($_GET['oauth_token'], $_GET['oauth_verifier'])) {

    try {

        $credentials = $client->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

        echo "<pre>";

        echo 'Access Token: ' . $credentials->getIdentifier() . "\n";

        echo 'Token Secret: ' . $credentials->getSecret() . "\n";

        echo "</pre>";

    } catch (Exception $e) {

        header('Location: ' . $currentUrl);

    }

} elseif (isset($_GET['auth'])) {

    $authorizationUrl = $client->getAuthorizationUrl();

    header('Location: ' . $authorizationUrl);

} else {

    echo '<a href="?auth=true">Authenticate</a>';

}

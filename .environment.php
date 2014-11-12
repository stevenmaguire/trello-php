<?php

$GLOBALS['trello_test_config'] = array(
    'environment' => getenv('TRELLO_API_ENVIRONMENT') ?: 'qa',
    'key' => getenv('TRELLO_API_KEY') ?: '',
    'secret' => getenv('TRELLO_API_SECRET') ?: '',
    'token' => getenv('TRELLO_API_TOKEN') ?: '',
    'app_name' => getenv('TRELLO_API_APPNAME') ?: 'Trello PHP Test'
);

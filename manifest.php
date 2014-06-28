<?php
header('Content-type: application/x-web-app-manifest+json');
?>
{
    "version": "1",
    "name": "Ultimate Tic Tac Toe",
    "launch_path": "index.php",
    "description": "Tic tac toe to the two",
    "icons": {
        "16": "img/logo16.png",
        "32": "img/logo32.png",
        "48": "img/logo48.png",
        "64": "img/logo64.png",
        "128": "img/logo128.png"
    },
    "developer": {
        "name": "Hugh Rawlinson",
        "url": "http://codeoclock.net"
    },
    "installs_allowed_from": ["*"],
    "default_locale": "en",
    "permissions": {
    }
}
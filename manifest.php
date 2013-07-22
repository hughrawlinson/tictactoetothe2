<?php
header('Content-type: application/x-web-app-manifest+json');
?>
{
    "version": "1",
    "name": "Ultimate Tic Tac Toe",
    "launch_path": "/ultimatetictactoe/index.php",
    "description": "Tic tac toe to the two",
    "icons": {
        "16": "/ultimatetictactoe/images/logo16.png",
        "32": "/ultimatetictactoe/images/logo32.png",
        "48": "/ultimatetictactoe/images/logo48.png",
        "64": "/ultimatetictactoe/images/logo64.png",
        "128": "/ultimatetictactoe/images/logo128.png"
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
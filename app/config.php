<?php

header("Content-Type: text/html; charset=utf-8;");

session_start();

setlocale(LC_ALL, "pt_BR");
date_default_timezone_set("America/Sao_Paulo");

// CONFIG UNDERLINE CONSTS
define("__ROOT__", __DIR__."/..");

// CONFIG URL
define("SITE_PROTOCOL", isset($_SERVER["HTTPS"]) ? "https://" : "http://");
define("SITE_DOMAIN", $_SERVER["SERVER_NAME"]);
define("SITE_ROOT", "/mvc_template");
define("URL_BASE", SITE_PROTOCOL.SITE_DOMAIN.SITE_ROOT);

// CONFIG SITE
define("SITE_LANG", "pt_BR");
define("SITE_NAME", "MVC Template for PHP");
define("SITE_DESCRIPTION", "The MVC template with Routers (for pages or APIs) and more for PHP projects.");
define("SITE_THEME", "#4f5b93");
define("SITE_SUMMARY_IMAGE", "logo.png");
define("SITE_SUMMARY_CARD", "summary"); // summary | summary_large_image
define("SITE_TYPE", "website");
define("SITE_KEYWORDS", "MVC,Template,PHP,Routers");
define("SITE_VERSION", "0.0.0");

// CREDENCIAIS DO SISTEMA

define("SYSTEM_MODE", "DEVELOPMENT"); // PRODUCTION | DEVELOPMENT
define("SYSTEM_KEYS", [
    "SECRET" => "123" // Your Secret key
]);

define("JWT_ALGORITHM", "HS256");

define("STAFF_USERS", [
    // ...[ ...userData ]
]);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
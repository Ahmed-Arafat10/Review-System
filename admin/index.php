<?php
require_once "../include/Config.php";

if(!IsLoggedIn()) exit("Please log in first");

require_once "../templates/admin/header.html";
require_once "../templates/admin/menu.html";
require_once "../templates/admin/index.html";
require_once "../templates/admin/footer.html";

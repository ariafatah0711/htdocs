<?php

$page = $_GET['page'] ?? 'home';

include_once 'app/pages/' . $page . '.php';

?>

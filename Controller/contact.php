<?php
$actions = "contact";
if (isset($_GET['act'])) {
    $actions = $_GET['act'];
}
switch ($actions) {
    case 'lienhe':
        include "View/lienhe.php";
        break;
    case 'lienhe_daguimail':
        include "View/lienhe_daguimail.php";
        break;
    case 'gioithieu':
        include "View/GioiThieu.php";
        break;
}

<?php
include "config/app.php"; 

// $type = $_GET['type_data'];
// $title_data = $_GET['title_data'];

// if ($type == 'get_data') {
//     if ($title_data == 'sop_master') {

        $sSQL = select ("SELECT * FROM view_sopmaster");

        header('Content-Type: application/json');
        echo json_encode($sSQL);
//     }
// }

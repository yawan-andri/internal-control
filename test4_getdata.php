<?php
include "config/app.php"; 

$type = $_GET['type_data'];
$title_data = $_GET['title_data'];

if ($type == 'get_data') {
    if ($title_data == 'sop_master') {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    
        $offset = ($page - 1) * $rows;
    
        $countQuery = "SELECT COUNT(*) FROM view_sopmaster";
        $countStmt = $conn->prepare($countQuery);
        $countStmt->execute();
        $row = $countStmt->fetch(PDO::FETCH_NUM);
        $response["total"] = $row[0];
    
        $dataQuery = "SELECT * FROM view_sopmaster
                      ORDER BY NoSOP ASC
                      OFFSET cast(? as int) ROWS FETCH NEXT cast(? as int) ROWS ONLY";
        $dataStmt = $conn->prepare($dataQuery);
        $dataStmt->execute([$offset, $rows]);
        $users = $dataStmt->fetchAll(PDO::FETCH_ASSOC);
        $response["rows"] = $users;
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

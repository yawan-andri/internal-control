<?php
include "config/app.php"; 

$type = $_GET['type_data'];
$title_data = $_GET['title_data'];

if ($type == 'get_data') {
    if ($title_data == 'sop_master') {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? $_POST['sort'] : 'NoSOP';
        $order = isset($_POST['order']) ? $_POST['order'] : 'ASC';
        $filters = json_decode(file_get_contents("php://input"), true);

        $offset = ($page - 1) * $rows;

        // Get total count with filters
        $countQuery = "SELECT COUNT(*) FROM view_sopmaster";
        $countStmt = $conn->prepare($countQuery);
        $countStmt->execute();
        $row = $countStmt->fetch(PDO::FETCH_NUM);
        $response["total"] = $row[0];

        // Get filtered data with pagination
        $dataQuery = "SELECT * FROM view_sopmaster
                      ORDER BY $sort $order
                      OFFSET cast(? as int) ROWS FETCH NEXT cast(? as int) ROWS ONLY";
        $dataStmt = $conn->prepare($dataQuery);
        $dataStmt->execute([$offset, $rows]);
        $users = $dataStmt->fetchAll(PDO::FETCH_ASSOC);
        $response["rows"] = $users;

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

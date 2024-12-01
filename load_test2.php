<?php
include "config/app.php"; 

$type = $_GET['type_data'];

if ($type == 'get_data') {

    // Get pagination parameters and search term
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $searchTerm = isset($_POST['term']) ? $_POST['term'] : '';

    // Calculate offset
    $offset = ($page - 1) * $rows;

    // Prepare and execute the count query
    $countQuery = " SELECT COUNT(*) FROM tbSOP 
                    OUTER APPLY (SELECT TOP 1 KategoriSOP FROM tbSOPKategori kat
                            WHERE kat.NoSOP = tbSOP.NoSOP) tbSOPKategori
                    WHERE NoSOP LIKE ? OR NamaSOP LIKE ? OR DivisiMain LIKE ? OR KategoriSOP LIKE ?";
    $countStmt = $conn->prepare($countQuery);
    $countStmt->execute([$searchTerm . '%', $searchTerm . '%', $searchTerm . '%', $searchTerm . '%']);
    $row = $countStmt->fetch(PDO::FETCH_NUM);
    $response["total"] = $row[0];

    // Prepare and execute the data query
    $dataQuery = "  SELECT * FROM tbSOP 
                    OUTER APPLY (SELECT TOP 1 KategoriSOP FROM tbSOPKategori kat
                                WHERE kat.NoSOP = tbSOP.NoSOP) tbSOPKategori
                    WHERE 1= 1 
                    AND NoSOP LIKE ? OR NamaSOP LIKE ? OR DivisiMain LIKE ? OR KategoriSOP LIKE ?
                    ORDER BY NoSOP ASC OFFSET cast(? as int) ROWS FETCH
                    NEXT cast(? as int) ROWS ONLY
                ";
    $dataStmt = $conn->prepare($dataQuery);
    $dataStmt->execute([$searchTerm . '%', $searchTerm . '%', $searchTerm . '%', $searchTerm . '%', $offset, $rows]);
    $users = $dataStmt->fetchAll(PDO::FETCH_ASSOC);
    $response["rows"] = $users;

    // Output the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);

} else if ($type == 'add_data') {

}
?>
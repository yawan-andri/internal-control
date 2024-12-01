<?php
include "config/app.php";

if ($type == 'get_data') {
    // Get pagination parameters
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $offset = ($page - 1) * $rows;

    // Get filter parameters
    $divisifil = isset($_POST['divisifil']) ? $_POST['divisifil'] : '';
    $kategorifil = isset($_POST['kategorifil']) ? $_POST['kategorifil'] : '';

    // Base query with OUTER APPLY
    $baseQuery = "
        SELECT tbSOP.NoSOP, tbSOP.NamaSOP, tbSOP.DivisiMain, kat.KategoriSOP
        FROM tbSOP
        OUTER APPLY (
            SELECT TOP 1 KategoriSOP 
            FROM tbSOPKategori kat
            WHERE kat.NoSOP = tbSOP.NoSOP
        ) kat
        WHERE 1=1
    ";

    // Apply filters dynamically
    $params = [];
    if ($divisifil) {
        $baseQuery .= " AND tbSOP.DivisiMain = ?";
        $params[] = $divisifil;
    }
    if ($kategorifil) {
        $baseQuery .= " AND kat.KategoriSOP = ?";
        $params[] = $kategorifil;
    }

    // Count query
    $countQuery = "SELECT COUNT(*) FROM ($baseQuery) AS count_table";
    $countStmt = $conn->prepare($countQuery);
    $countStmt->execute($params);
    $response["total"] = $countStmt->fetchColumn();

    // Data query with pagination
    $dataQuery = "$baseQuery 
                  ORDER BY tbSOP.NoSOP ASC
                  OFFSET cast(? as int) ROWS FETCH NEXT cast(? as int) ROWS ONLY";
    $params[] = $offset;
    $params[] = $rows;

    $dataStmt = $conn->prepare($dataQuery);
    $dataStmt->execute($params);
    $response["rows"] = $dataStmt->fetchAll(PDO::FETCH_ASSOC);

    // Output JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

if (isset($_POST['masterData']) && $_POST['masterData'] == 'getDivisi') {
    $stmt = $conn->prepare("SELECT DISTINCT DivisiMain FROM tbSOP");
    $stmt->execute();
    $divisiList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $options = '';
    foreach ($divisiList as $divisi) {
        $options .= '<option value="' . htmlspecialchars($divisi['DivisiMain']) . '">' . htmlspecialchars($divisi['DivisiMain']) . '</option>';
    }
    echo $options;
}
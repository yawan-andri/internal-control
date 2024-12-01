<?php
include "config/app.php";

$crudObj = new crudSOPMaster();

// if ($_POST['crudSOPMaster'] == "getData") {
//     $divisi = $_POST['divisi'];
//     $kategori = $_POST['kategori'];

//     $allData = $crudObj->getSOPMASTER($conn, $divisi, $kategori);
    
//     header('Content-Type: application/json');
//     echo json_encode($allData);
// }

// if ($_POST['crudSOPMaster'] == "getDivisi") {
//     $tableData = '<option value=""></option>';
//     $allData = $crudObj->getDivisi($conn);
//     if (count($allData) > 0) {
//         foreach ($allData as $row) {
//             $tableData .= '<option value="'.$row['DivisiMain'].'">'.$row['DivisiMain'].'</option>';
//         }
//     }
//     echo $tableData;
// }

if ($_POST['crudSOPMaster'] == "getData") {
    $divisi = $_POST['divisi'];
    $kategori = $_POST['kategori'];
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;

    $offset = ($page - 1) * $rowsPerPage;

    // Test fetching data with fixed parameters
    $allData = $crudObj->getSOPMASTER($conn, $divisi, $kategori, $offset, $rowsPerPage);
    $totalRecords = $crudObj->countSOPMASTER($conn, $divisi, $kategori);

    // Log results to verify they are retrieved correctly
    error_log(print_r($allData, true)); // Logs data to PHP error log for inspection

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
}

if ($_POST['crudSOPMaster'] == "saveData") {
    $nosop = $_POST['nosop'];
    $namasop = $_POST['namasop'];
    $divisi = $_POST['divisi'];
    $kategorisop = $_POST['kategorisop'];
    $editId = $_POST['editId'];
    $save = $crudObj->saveData($conn,$nosop,$namasop,$divisi,$kategorisop,$editId);
    if ($save){
        echo "saved";
    }
}

if ($_POST['crudSOPMaster'] == "deleteData"){
    $deleteId = $_POST['deleteId'];
    $delete = $crudObj->deleteData($conn,$deleteId);
    if ($delete){
        echo "deleted";
    }
}



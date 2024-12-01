<?php
include "../config/app.php";

// TITLE : login

$login = new loginuser();

if (isset($_POST['login']) && $_POST['login'] == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $login->login($conn,$username,$password);
    if ($login){
        echo "login";
    } 
}

// TITLE : master data

$masterData = new masterData();

if (isset($_POST['masterData']) && $_POST['masterData'] == "getDivisi") {
    $tableData = '<option value=""></option>';
    $allData = $masterData->getDivisi($conn);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['DivisiMain'].'">'.$row['DivisiMain'].'</option>';
        }
    }
    echo $tableData;
}

if (isset($_POST['masterData']) && $_POST['masterData'] == "getUnitUsaha") {
    $tableData = '<option value=""></option>';
    $allData = $masterData->getUnitUsaha($conn);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['UnitUsaha'].'">'.$row['NamaUnitUsaha'].'</option>';
        }
    }
    echo $tableData;
}

if (isset($_POST['masterData']) && $_POST['masterData'] == "getAuditor") {
    $tableData = '<option value=""></option>';
    $allData = $masterData->getAuditor($conn);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['Nama'].'">'.$row['Nama'].'</option>';
        }
    }
    echo $tableData;
}

if (isset($_POST['masterData']) && $_POST['masterData'] == "getSOP") {
    $tableData = '<option value=""></option>';
    $allData = $masterData->getSOP($conn);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['NoSOP'].'">'.$row['NoSOP'].' '.$row['NamaSOP'].'</option>';
        }
    }
    echo $tableData;
}
// TITLE : sop-master                 

$crudSOPMaster = new crudSOPMaster();

if (isset($_POST['crudSOPMaster']) && $_POST['crudSOPMaster'] == "getData") {
    $divisi = $_POST['divisi'] ?? null;
    $kategori = $_POST['kategori'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $crudSOPMaster->getSOPMASTER($conn, $divisi, $kategori, $offset, $rowsPerPage);
    $totalRecords = $crudSOPMaster->countSOPMASTER($conn, $divisi, $kategori);

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['crudSOPMaster']) && $_POST['crudSOPMaster'] == "saveData") {
    $nosop = $_POST['nosop'];
    $namasop = $_POST['namasop'];
    $divisi = $_POST['divisi'];
    $kategorisop = $_POST['kategorisop'];
    $editId = $_POST['editId'];
    $save = $crudSOPMaster->saveData($conn,$nosop,$namasop,$divisi,$kategorisop,$editId);
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['crudSOPMaster']) && $_POST['crudSOPMaster'] == "deleteData"){
    $nosop_del = $_POST['nosop_del'];
    $delete = $crudSOPMaster->deleteData($conn,$nosop_del);
    if ($delete){
        echo "deleted";
    } else {
        echo "failed";
    }
}

// TITLE : sop-detail

$SOPDetail = new SOPDetail();

if (isset($_POST['SOPDetail']) && $_POST['SOPDetail'] == "getData") {
    $NoSOP = $_POST['NoSOP'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $SOPDetail->getSOPMasterLifetime($conn, $NoSOP, $offset, $rowsPerPage);
    $totalRecords = $SOPDetail->countSOPDetail($conn, $NoSOP);

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['SOPDetail']) && $_POST['SOPDetail'] == "getJumlahAudit") {
    $NoSOP = $_POST['NoSOP'] ?? null;

    $allData = $SOPDetail->getJumlahAudit($conn, $NoSOP);

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData
    ]);
    exit; 
}

if (isset($_POST['SOPDetail']) && $_POST['SOPDetail'] == "saveData") {
    $etglawal = $_POST['etglawal'];
    $eunitusaha = $_POST['eunitusaha'];
    $nosop = $_POST['nosop'];
    $namasop = $_POST['namasop'];
    $jenisaudit = $_POST['jenisaudit'];
    $unitusaha = $_POST['unitusaha'];
    $leadtime = $_POST['leadtime'];
    $tglawal = $_POST['tglawal'];
    $tglakhir = $_POST['tglakhir'];
    $ket = $_POST['ket'];
    $save = $SOPDetail->saveData(
                                    $conn,
                                    $etglawal, 
                                    $eunitusaha,
                                    $nosop,
                                    $namasop, 
                                    $jenisaudit, 
                                    $unitusaha, 
                                    $leadtime,
                                    $tglawal,
                                    $tglakhir,
                                    $ket
                                );
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['SOPDetail']) && $_POST['SOPDetail'] == "deleteData") {
    $nosop = $_POST['nosop'];
    $unitusaha = $_POST['unitusaha'];
    $tglawal = $_POST['tglawal'];
    $delete = $SOPDetail->deleteData(
                                    $conn,
                                    $nosop,
                                    $unitusaha, 
                                    $tglawal
                                );
    if ($delete){
        echo "deleted";
    } 
}

// TITLE : sop-audit

$SOPAudit = new SOPAudit();

if (isset($_POST['SOPAudit']) && $_POST['SOPAudit'] == "getData") {
    $auditor = $_POST['auditor'] ?? null;
    $unitusaha = $_POST['unitusaha'] ?? null;
    $periode = $_POST['periode'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $SOPAudit->getAudit(
        $conn, 
        $unitusaha, 
        $periode, 
        $auditor, 
        $offset,
        $rowsPerPage);
    $totalRecords = $SOPAudit->countAudit(
        $conn,         
        $unitusaha, 
        $periode, 
        $auditor);

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['SOPAudit']) && $_POST['SOPAudit'] == "saveData") {
    $notrans = $_POST['notrans'];
    $nosop = $_POST['nosop'];
    $unitusaha = $_POST['unitusaha'];
    $jenisaudit = $_POST['jenisaudit'];
    $tanggal = $_POST['tanggal'];
    $auditor = $_POST['auditor'];
    $tglaudit = $_POST['tglaudit'];
    $tglselesaibaa = $_POST['tglselesaibaa'];
    $tglpresentasi = $_POST['tglpresentasi'];
    $save = $SOPAudit->saveData(
                                    $conn,
                                    $notrans, 
                                    $nosop,
                                    $jenisaudit, 
                                    $unitusaha, 
                                    $tanggal,
                                    $auditor,
                                    $tglaudit,
                                    $tglselesaibaa,
                                    $tglpresentasi
                                );
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['SOPAudit']) && $_POST['SOPAudit'] == "deleteData") {
    $notrans = $_POST['notrans'];
    $katdelete = $_POST['katdelete'];
    $keterangan = $_POST['keterangan'];
    $deleted = $SOPAudit->deleteData(
                                    $conn,
                                    $notrans,
                                    $katdelete, 
                                    $keterangan
                                );
    if ($deleted){
        echo "deleted";
    } 
}

// TITLE : sop-audit-detail

$AuditDetail = new AuditDetail;

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "getSOPControl") {
    $notrans = $_POST['NoTrans'] ?? null;

    $allData = $AuditDetail->getSOPControl($conn, $notrans);

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData
    ]);
    exit; 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "getData") {
    $notrans = $_POST['notrans'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $AuditDetail->getAuditDetail(
        $conn, 
        $notrans, 
        $offset,
        $rowsPerPage
    );
    $totalRecords = $AuditDetail->countAuditDetail(
        $conn,         
        $notrans
    );

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "getDataBAPT") {
    $notrans = $_POST['notrans'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $AuditDetail->getAuditBAPT(
        $conn, 
        $notrans, 
        $offset,
        $rowsPerPage
    );
    $totalRecords = $AuditDetail->countAuditBAPT(
        $conn,         
        $notrans
    );

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "saveDataSPK") {
    $nospk = $_POST['nospk'];
    $tanggal = $_POST['tanggal'];
    $auditor = $_POST['auditor'];
    $mulai1 = $_POST['mulai1'];
    $mulai2 = $_POST['mulai2'];
    $mulai3 = $_POST['mulai3'];
    $bahanaudit = $_POST['bahanaudit'];
    $pic = $_POST['pic'];
    $manager = $_POST['manager'];
    $notrans = $_POST['notrans'];

    $save = $AuditDetail->saveDataSPK(
                                    $conn,
                                    $nospk, 
                                    $tanggal,
                                    $auditor, 
                                    $mulai1, 
                                    $mulai2,
                                    $mulai3,
                                    $bahanaudit,
                                    $pic,
                                    $manager,
                                    $notrans
                                );
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "getDASTemuan") {
    $notrans = $_POST["notrans"];

    $tableData = '<option value=""></option>';
    $allData = $AuditDetail->getDASTemuan($conn, $notrans);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['nomorDAS'].'">'.$row['DAS'].'</option>';
        }
    }
    echo $tableData;
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "saveDataTemuan") {
    $notrans = $_POST["notrans"];
    $nomor_temuan = $_POST["nomor_temuan"];
    $kat_temuan = $_POST["kat_temuan"];
    $temuan_temuan = $_POST["temuan_temuan"];
    $resiko_temuan = $_POST["resiko_temuan"];
    $saran_temuan = $_POST["saran_temuan"];
    $status_temuan = $_POST["status_temuan"];
    $das_temuan = $_POST["das_temuan"];
    $ket_temuan = $_POST["ket_temuan"];

    $save = $AuditDetail->saveDataTemuan(
                                    $conn,
                                    $notrans, 
                                    $nomor_temuan,
                                    $kat_temuan, 
                                    $temuan_temuan, 
                                    $resiko_temuan,
                                    $saran_temuan,
                                    $status_temuan,
                                    $das_temuan,
                                    $ket_temuan
                                );
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "delData") {
    $notrans = $_POST["notrans"];
    $jenis = $_POST["jenis"];
    $nomor = $_POST["nomor"];

    $deleted = $AuditDetail->delData(
                                    $conn,
                                    $notrans, 
                                    $jenis,
                                    $nomor
                                );
    if ($deleted){
        echo "deleted";
    } else {
        
    }
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "cekDataTemuan") {
    $notrans = $_POST["notrans"];

    $alldata = $AuditDetail->cekDataTemuan(
                                    $conn,
                                    $notrans
                                );
    if ($alldata){
        echo "ada";
    } 
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "getTemuan") {
    $notrans = $_POST["notrans"];

    $tableData = '<option value=""></option>';
    $allData = $AuditDetail->getTemuan($conn, $notrans);
    if (count($allData) > 0) {
        foreach ($allData as $row) {
            $tableData .= '<option value="'.$row['NoUrut'].'">'.$row['Temuan'].'</option>';
        }
    }
    echo $tableData;
}

if (isset($_POST['AuditDetail']) && $_POST['AuditDetail'] == "saveDataBAPT") {
    $notrans = $_POST["notrans"];
    $nomor_bapt = $_POST["nomor_bapt"];
    $temuan_bapt = $_POST["temuan_bapt"];
    $bapt_bapt = $_POST["bapt_bapt"];
    $pic_bapt = $_POST["pic_bapt"];
    $est_bapt = $_POST["est_bapt"];
    $selesai_bapt = $_POST["selesai_bapt"];

    $save = $AuditDetail->saveDataBAPT(
                                    $conn,
                                    $notrans, 
                                    $nomor_bapt,
                                    $temuan_bapt,
                                    $bapt_bapt, 
                                    $pic_bapt, 
                                    $est_bapt,
                                    $selesai_bapt
                                );
    if ($save){
        echo "saved";
    } 
}

// TITLE : sop-das

$sopDAS = new sopDAS();

if (isset($_POST['sopDAS']) && $_POST['sopDAS'] == "getData") {
    $nosop = $_POST['nosop'] ?? null;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $rowsPerPage = isset($_POST['rowsPerPage']) ? (int)$_POST['rowsPerPage'] : 10;
    $offset = ($page - 1) * $rowsPerPage;

    $allData = $sopDAS->getSOPDAS(
        $conn, 
        $nosop, 
        $offset,
        $rowsPerPage
    );
    $totalRecords = $sopDAS->countSOPDAS(
        $conn,         
        $nosop
    );

    header('Content-Type: application/json');
    echo json_encode([
        "data" => $allData,
        "totalPages" => ceil($totalRecords / $rowsPerPage)
    ]);
    exit; 
}

if (isset($_POST['sopDAS']) && $_POST['sopDAS'] == "saveDataDAS") {
    $nosop = $_POST["nosop"];
    $das_das = $_POST["das_das"];
    $nomor_das = $_POST["nomor_das"];
    $namasop = $_POST["namasop"];

    $save = $sopDAS->saveDataDAS(
                                    $conn,
                                    $nosop, 
                                    $nomor_das,
                                    $das_das,
                                    $namasop
                                );
    if ($save){
        echo "saved";
    } 
}

if (isset($_POST['sopDAS']) && $_POST['sopDAS'] == "deleteData") {
    $nomor_das_head = $_POST["nomor_das_head"];
    $nomor_das = $_POST["nomor_das"];

    $delete = $sopDAS->deleteDataDAS(
                                    $conn,
                                    $nomor_das_head, 
                                    $nomor_das
                                );
    if ($delete){
        echo "deleted";
    } 
}
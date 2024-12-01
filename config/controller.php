<?php
function select($query) 
{
    global $conn; 

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; 
    }
}
function selectparams($query, $params = []) 
{
    global $conn;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}
function dbexecute($query){
    global $conn; 

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; 
    }
}

class loginuser {
    public function login($conn, $username, $password)
    {
        session_start();
        $stmt = $conn->prepare("SELECT id, password, username FROM tbUserID WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            $login_username = $user['username'];
            $login_id = $user['id'];

            return true;
        } else {
            $_SESSION['failed_login'] = true;
            echo "gagal";
            return false;
        }
    }
}

class masterData {
    public function getDivisi($conn)
    {
        $query = select ("SELECT DISTINCT DivisiMain FROM tbSOP");
        return $query;
    }   
    public function getAuditor($conn)
    {
        $query = select ("SELECT * FROM tbAnggotaIC");
        return $query;
    }
    public function getUnitUsaha($conn) 
    {
        $query = select ("SELECT * FROM tbUnitUsaha");
        return $query;
    }
    public function getSOP($conn) 
    {
        $query = select ("SELECT * FROM tbSOP");
        return $query;
    }
}

class crudSOPMaster
{
    public function getSOPMASTER($conn, $divisi, $kategori, $offset, $rowsPerPage)
    {
        $query = "
            SELECT DISTINCT NoSOP, NamaSOP, DivisiMain, KategoriSOP FROM view_sop_master
            WHERE 1=1";
    
        $params = [];
    
        if (!empty($divisi)) {
            $query .= " AND DivisiMain = :divisi";
            $params[':divisi'] = $divisi;
        }
    
        if (!empty($kategori)) {
            $query .= " AND KategoriSOP = :kategori";
            $params[':kategori'] = $kategori;
        }

        $query .= " ORDER BY NoSOP OFFSET $offset ROWS FETCH NEXT $rowsPerPage ROWS ONLY";
    
        return selectparams($query, $params);
    }
    public function countSOPMASTER($conn, $divisi, $kategori)
    {
        $query = "
            SELECT COUNT(*) as total FROM tbSOP
            WHERE 1=1";
    
        $params = [];
    
        if (!empty($divisi)) {
            $query .= " AND DivisiMain = :divisi";
            $params[':divisi'] = $divisi;
        }
    
        if (!empty($kategori)) {
            $query .= " AND KategoriSOP = :kategori";
            $params[':kategori'] = $kategori;
        }
    
        $result = selectparams($query, $params);
        return isset($result[0]['total']) ? (int)$result[0]['total'] : 0;
    }
    public function getDivisi($conn)
    {
        $query = select ("SELECT DISTINCT DivisiMain FROM tbSOP");
        return $query;
    }
    public function saveData($conn,$nosop,$namasop,$divisi,$kategorisop,$editId)
    {

        $nosop = htmlspecialchars(strtoupper($nosop));
        $namasop = htmlspecialchars(strtoupper($namasop));
        $divisi = htmlspecialchars(strtoupper($divisi));
        $kategorisop = htmlspecialchars(strtoupper($kategorisop));
        $oldnosop = htmlspecialchars(strtoupper($editId));
        
        if (!$this->getNoSOPDuplicate($conn, $editId, $nosop)) {
            echo "duplicateNoSOP"; 
            return false;
        }

        if (!$this->getNamaSOPDuplicate($conn, $editId, $namasop)) {
            echo "duplicateNamaSOP";    
            return false;
        }

        try
        {
            if ($editId == "") 
            {
                $stmt1 = $conn->prepare("INSERT INTO tbSOP VALUES (?, ?, ?, '', '', '')");
                $stmt1->bindParam(1, $nosop, PDO::PARAM_STR);
                $stmt1->bindParam(2, $namasop, PDO::PARAM_STR);
                $stmt1->bindParam(3, $divisi, PDO::PARAM_STR);

                $stmt2 = $conn->prepare("INSERT INTO tbSOPKategori VALUES (?, ?)");
                $stmt2->bindParam(1, $nosop, PDO::PARAM_STR);
                $stmt2->bindParam(2, $kategorisop, PDO::PARAM_STR);

            }
            else
            {
                $stmt1 = $conn->prepare("UPDATE tbSOP SET NoSOP = ?, NamaSOP = ?, DivisiMain = ? WHERE NoSOP = ?");
                $stmt1->bindParam(1, $nosop, PDO::PARAM_STR);
                $stmt1->bindParam(2, $namasop, PDO::PARAM_STR);
                $stmt1->bindParam(3, $divisi, PDO::PARAM_STR);
                $stmt1->bindParam(4, $oldnosop, PDO::PARAM_STR);

                $stmt2 = $conn->prepare("UPDATE tbSOPKategori SET NoSOP = ?, KategoriSOP = ? WHERE NoSOP = ?");
                $stmt2->bindParam(1, $nosop, PDO::PARAM_STR);
                $stmt2->bindParam(2, $kategorisop, PDO::PARAM_STR);
                $stmt2->bindParam(3, $oldnosop, PDO::PARAM_STR);
            }
            $stmt1->execute();
            $stmt2->execute();
            return true;
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
            return false; 
        }
    }
    public function getNoSOPDuplicate($conn, $editId, $nosop)
    {
        $query = $conn->prepare("SELECT COUNT(*) FROM tbSOP WHERE NoSOP = ? AND NoSOP != ?");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $editId, PDO::PARAM_STR);
        $query->execute();
        $getNoSOPDuplicate = $query->fetchColumn();

        return $getNoSOPDuplicate == 0;
    }
    public function getNamaSOPDuplicate($conn, $editId, $namasop)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) FROM tbSOP 
            WHERE NamaSOP = ? 
            AND NamaSOP NOT IN (SELECT NamaSOP FROM tbSOP WHERE NoSOP = ?)");
        $query->bindParam(1, $namasop, PDO::PARAM_STR);
        $query->bindParam(2, $editId, PDO::PARAM_STR);
        $query->execute();
        $getNamaSOPDuplicate = $query->fetchColumn();

        return $getNamaSOPDuplicate == 0;
    }
    public function deleteData($conn,$nosop_del) 
    {
        $nosop = strtoupper($nosop_del);

        if (!$this->getAuditData($conn, $nosop)) {
            return false; 
        }

        try 
        {
            $stmt1 = $conn->prepare("DELETE FROM tbSOP WHERE NoSOP = ?");
            $stmt1->bindParam(1, $nosop);
            $stmt1->execute();

            $stmt2 = $conn->prepare("DELETE FROM tbSOPKategori WHERE NoSOP = ?");
            $stmt2->bindParam(1, $nosop);
            $stmt2->execute();
            return true;
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
            return false; 
        }
    }
    Public function getAuditData($conn,$nosop_del) 
    {
        $query = $conn->prepare("SELECT COUNT(*) FROM tbSOPControl WHERE NoSOP = ?");
        $query->bindParam(1, $nosop_del, PDO::PARAM_STR);
        $query->execute();
        $getAuditData = $query->fetchColumn();

        return $getAuditData == 0;
    }
}
class SOPDetail
{
    public function getJumlahAudit($conn, $NoSOP)
    {
        $query = "SELECT * FROM get_jumlah_audit(:NoSOP)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':NoSOP', $NoSOP, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSOPMasterLifetime($conn, $NoSOP, $offset, $rowsPerPage)
    {
        $query = "
            SELECT * FROM get_sop_detail(:NoSOP)
            ORDER BY NoSOP 
            OFFSET :offset ROWS FETCH NEXT :rowsPerPage ROWS ONLY";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':NoSOP', $NoSOP, PDO::PARAM_STR);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countSOPDetail($conn, $NoSOP)
    {
        $query = "SELECT COUNT(*) AS total FROM tbSOPLifetime WHERE NoSOP = :NoSOP";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':NoSOP', $NoSOP, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($result['total']) ? (int)$result['total'] : 0;
    }
    public function getUnitUsaha($conn) 
    {
        $query = select ("SELECT * FROM tbUnitUsaha");
        return $query;
    }
    public function saveData($conn ,$etglawal, $eunitusaha, $nosop, $namasop, $jenisaudit, $unitusaha, $leadtime,$tglawal,$tglakhir,$ket)
    {
        $nosop = htmlspecialchars(strtoupper($nosop));
        $namasop = htmlspecialchars(strtoupper($namasop));
        $jenisaudit = htmlspecialchars(strtoupper($jenisaudit));
        $unitusaha = htmlspecialchars(strtoupper($unitusaha));
        $leadtime = htmlspecialchars(strtoupper($leadtime));    
        $eunitusaha = htmlspecialchars(strtoupper($eunitusaha));
        $ket = htmlspecialchars(strtoupper($ket));

        $today = date(format: "d-m-Y");

        if (!$this->getTglAkhirNull($conn,$nosop,$tglawal,$etglawal,$unitusaha)) 
        {
            if (empty($etglawal)) {
                $etglawal = "";
            }
            
            $query = $conn->prepare("
                UPDATE tbSOPLifetime SET
                    TglBerlakuAkhir = DATEADD(d, -1, ?)
                WHERE NoSOP = ?
                    AND UnitUsaha = ?
                    AND TglBerlakuAwal < ?
                    AND TglBerlakuAkhir IS NULL
                    AND TglBerlakuAwal != ? 
                ");
            $query->bindParam(1, $tglawal, PDO::PARAM_STR);
            $query->bindParam(2, $nosop, PDO::PARAM_STR);
            $query->bindParam(3, $unitusaha, PDO::PARAM_STR);
            $query->bindParam(4, $tglawal, PDO::PARAM_STR);
            $query->bindParam(5, $etglawal, PDO::PARAM_STR);
            $query->execute();    
        }
        if (!$this->getTglAwal($conn,$nosop,$tglawal,$etglawal,$unitusaha)) 
        {
            echo "periodeDiantara";
            return false;
        }
        if (empty($etglawal)) 
        {
            $stmt1 = $conn->prepare("
                INSERT INTO tbSOPLifetime 
                (NoSOP, TglBerlakuAwal, TglBerlakuAkhir, UnitUsaha, Lifetime) 
                VALUES 
                (?, ?, ?, ?, ?)");
            $stmt1->bindParam(1, $nosop, PDO::PARAM_STR);
            $stmt1->bindParam(2, $tglawal, PDO::PARAM_STR);
            $stmt1->bindParam(3, $tglakhir, empty($tglakhir) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(4, $unitusaha, PDO::PARAM_STR);
            $stmt1->bindParam(5, $leadtime, PDO::PARAM_STR);
        } 
        else 
        {
            $stmt1 = $conn->prepare("
                UPDATE tbSOPLifetime SET
                    TglBerlakuAwal = ?,
                    TglBerlakuAkhir = ?,
                    UnitUsaha = ?,
                    Lifetime = ?
                WHERE NoSOP = ?
                    AND TglBerlakuAwal = ?
                    AND UnitUsaha = ?
                ");
            $stmt1->bindParam(1, $tglawal, PDO::PARAM_STR);    
            $stmt1->bindParam(2, $tglakhir, empty($tglakhir) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(3, $unitusaha, PDO::PARAM_STR);
            $stmt1->bindParam(4, $leadtime, PDO::PARAM_STR);
            $stmt1->bindParam(5, $nosop, PDO::PARAM_STR);
            $stmt1->bindParam(6, $etglawal, PDO::PARAM_STR);
            $stmt1->bindParam(7, $eunitusaha, PDO::PARAM_STR);
        }
        $stmt1->execute();

        if ($this->deleteJenisAudit($conn, $nosop, $today, $unitusaha, $eunitusaha)) 
        {
            $stmt2 = $conn->prepare("
                INSERT INTO tbSOPJenisAudit 
                (NoSOP, UnitUsaha, JenisAuditSOP, TglBerlaku, Keterangan)
                VALUES 
                (?, ?, ?, ?, ?)");
            $stmt2->bindParam(1, $nosop, PDO::PARAM_STR);
            $stmt2->bindParam(2, $unitusaha, PDO::PARAM_STR);
            $stmt2->bindParam(3, $jenisaudit, PDO::PARAM_STR);
            $stmt2->bindParam(4, $today, PDO::PARAM_STR);
            $stmt2->bindParam(5, $ket, empty($ket) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt2->execute();
        }
        return true;
    }
    public function getTglAkhirNull($conn,$nosop,$tglawal,$etglawal,$unitusaha)
    {
        if (empty($etglawal)) {
            $etglawal = "";
        }
        
        $query = $conn->prepare("
            SELECT COUNT(*) FROM tbSOPLifetime 
            WHERE NoSOP = ?
                AND UnitUsaha = ?
                AND TglBerlakuAwal < ?
                AND TglBerlakuAkhir IS NULL
                AND TglBerlakuAwal != ? 
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $unitusaha, PDO::PARAM_STR);
        $query->bindParam(3, $tglawal, PDO::PARAM_STR);
        $query->bindParam(4, $etglawal, PDO::PARAM_STR);
        $query->execute();
        $getTglAkhirNull = $query->fetchColumn();

        return $getTglAkhirNull == 0;
    }
    public function getTglAwal($conn,$nosop,$tglawal,$etglawal,$unitusaha) 
    {

        if (empty($etglawal)) {
            $etglawal = "";
        }
        
        $query = $conn->prepare("
            SELECT COUNT(*) FROM tbSOPLifetime 
            WHERE NoSOP = ?
                AND UnitUsaha = ?
                AND ? BETWEEN TglBerlakuAwal AND TglBerlakuAkhir
                AND TglBerlakuAwal != ? 
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $unitusaha, PDO::PARAM_STR);
        $query->bindParam(3, $tglawal, PDO::PARAM_STR);
        $query->bindParam(4, $etglawal, PDO::PARAM_STR);
        $query->execute();
        $getTglAwal = $query->fetchColumn();

        return $getTglAwal == 0;
    }
    public function deleteJenisAudit($conn,$nosop,$today,$unitusaha,$eunitusaha) 
    {
        $query = $conn->prepare("
            DELETE FROM tbSOPJenisAudit 
            WHERE NoSOP = ?
                AND TglBerlaku = ?
                AND UnitUsaha IN (?, ?)");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $today, PDO::PARAM_STR);
        $query->bindParam(3, $unitusaha, PDO::PARAM_STR);
        $query->bindParam(4, $eunitusaha, PDO::PARAM_STR);
        $query->execute();
        return true;
    }
    public function deleteData($conn,$nosop,$unitusaha,$tglawal) 
    {
        if (!$this->getAudit($conn,$nosop,$unitusaha)) 
        {
            return false;
        }

        $query = $conn->prepare("
            DELETE FROM tbSOPLifetime
            WHERE NoSOP = ?
                AND TglBerlakuAwal = ?
                AND UnitUsaha = ?");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $tglawal, PDO::PARAM_STR);
        $query->bindParam(3, $unitusaha, PDO::PARAM_STR);
        $query->execute();
        return true;
    }
    public function getAudit($conn,$nosop,$unitusaha)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) total FROM tbSOPcontrol 
            WHERE NoSOP = ?
                AND UnitUsaha = ?
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $unitusaha, PDO::PARAM_STR);
        $query->execute();
        $getAudit = $query->fetchColumn();

        return $getAudit == 0;    
    }
}

class SOPAudit {
    public function getAudit($conn,$unitusaha,$periode,$auditor,$offset,$rowsPerPage)
    {
        $query = "
        SELECT * FROM get_audit('$periode')
        WHERE 1=1
        AND Batal = ''
        ";

        $params = [];

        if (!empty($unitusaha)) {
            $query .= " AND UnitUsaha = :unitusaha";
            $params[':unitusaha'] = $unitusaha;
        }

        if (!empty($auditor)) {
            $query .= " AND Auditor = :auditor";
            $params[':auditor'] = $auditor;
        }

        $query .= " ORDER BY Notrans OFFSET $offset ROWS FETCH NEXT $rowsPerPage ROWS ONLY";

        return selectparams($query, $params);
    }
    public function countAudit($conn, $unitusaha,$periode,$auditor)
    {
        $query = "
            SELECT COUNT(*) AS total FROM get_audit('$periode')
            WHERE 1=1
            AND Batal = ''
        ";

        $params = [];

        if (!empty($unitusaha)) {
            $query .= " AND UnitUsaha = :unitusaha";
            $params[':unitusaha'] = $unitusaha;
        }

        if (!empty($auditor)) {
            $query .= " AND Auditor = :auditor";
            $params[':auditor'] = $auditor;
        }
    
        $result = selectparams($query, $params);
        return isset($result[0]['total']) ? (int)$result[0]['total'] : 0;
    }
    public function getAuditor($conn)
    {
        $query = select ("SELECT * FROM tbAnggotaIC");
        return $query;
    }
    public function getUnitUsaha($conn) 
    {
        $query = select ("SELECT * FROM tbUnitUsaha");
        return $query;
    }
    public function getSOP($conn) 
    {
        $query = select ("SELECT * FROM tbSOP");
        return $query;
    }
    public function saveData($conn ,$notrans, $nosop, $jenisaudit, $unitusaha, $tanggal ,$auditor, $tglaudit, $tglselesaibaa, $tglpresentasi)
    {
        $nosop = htmlspecialchars(strtoupper($nosop));
        $notrans = htmlspecialchars(strtoupper($notrans));
        $jenisaudit = htmlspecialchars(strtoupper($jenisaudit));
        $unitusaha = htmlspecialchars(strtoupper($unitusaha));
        $auditor = htmlspecialchars(strtoupper($auditor));    

        $nobaa = $this->getNoBAA($conn,$nosop,$tglselesaibaa);

        if (!$this->checkUnitUsaha($conn, $nosop, $unitusaha)) {
            echo "unitusaha";
            return false;
        }

        if (!$this->checkAudit($conn,$notrans, $nosop,$tanggal, $unitusaha)) {
            echo "sudahaudit";
            return false;
        }

        if ($notrans == "AUTO") {
            $notrans = $this->getNoTrans($conn,$tanggal);
            $nospk = $this->getNoSPK($conn,$tanggal);
            
            $stmt1 = $conn->prepare("
                INSERT INTO tbSOPControl 
                (NoTrans, NoSOP, UnitUsaha, TglSPK, NoBAA, Auditor, JenisAudit, TglAudit, TglSelesaiBAA, TglPresentasi, NoSPK) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nosop, PDO::PARAM_STR);
            $stmt1->bindParam(3, $unitusaha, PDO::PARAM_STR);
            $stmt1->bindParam(4, $tanggal, PDO::PARAM_STR);
            $stmt1->bindParam(5, $nobaa, PDO::PARAM_STR);
            $stmt1->bindParam(6, $auditor, PDO::PARAM_STR);
            $stmt1->bindParam(7, $jenisaudit, PDO::PARAM_STR);
            $stmt1->bindParam(8, $tglaudit, empty($tglaudit) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(9, $tglselesaibaa, empty($tglselesaibaa) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(10, $tglpresentasi, empty($tglpresentasi) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(11, $nospk, PDO::PARAM_STR);
        } else {
            if (!$this->checkPeriodeAudit($conn,$notrans,$tanggal)) {
                echo "bedaPeriode";
                return false;
            }

            $stmt1 = $conn->prepare("
                UPDATE tbSOPControl SET
                    TglSPK = ?,
                    UnitUsaha = ?,
                    JenisAudit = ?,
                    Auditor = ?,
                    NoSOP = ?,
                    TglAudit = ?,
                    TglSelesaiBAA = ?,
                    TglPresentasi = ?,
                    NoBAA = ?
                WHERE NoTrans = ?
                ");
            $stmt1->bindParam(1, $tanggal, PDO::PARAM_STR);
            $stmt1->bindParam(2, $unitusaha, PDO::PARAM_STR);
            $stmt1->bindParam(3, $jenisaudit, PDO::PARAM_STR);
            $stmt1->bindParam(4, $auditor, PDO::PARAM_STR);
            $stmt1->bindParam(5, $nosop, PDO::PARAM_STR);
            $stmt1->bindParam(6, $tglaudit, empty($tglaudit) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(7, $tglselesaibaa, empty($tglselesaibaa) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(8, $tglpresentasi, empty($tglpresentasi) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(9, $nobaa, PDO::PARAM_STR);
            $stmt1->bindParam(10, $notrans, PDO::PARAM_STR);
        }
        $stmt1->execute();
        return true;
    }
    private function getNoSPK($conn,$tanggal)
    {
        $tglspk = date("Y", strtotime($tanggal));

        $query = $conn->prepare("
            SELECT TOP 1 LEFT(NoSPK,3) NoTrans FROM tbSOPcontrol 
            WHERE YEAR(TglSPK) = ?
            ORDER BY CAST(LEFT(NoSPK,3) AS INT) DESC
            ");
        $query->bindParam(1, $tglspk, PDO::PARAM_STR);
        $query->execute();
        $getNoSPK = $query->fetchColumn();

        $newNoSPK = $getNoSPK ? sprintf('%03d', intval($getNoSPK) + 1) : '001';
        $newNoSPK =  $newNoSPK . "/SPK/" . $tglspk;
        return $newNoSPK;
    }
    private function getNoTrans($conn,$tanggal)
    {
        $tglspk = date("Ym", strtotime($tanggal));

        $query = $conn->prepare("
            SELECT TOP 1 RIGHT(NoTrans,3) NoTrans FROM tbSOPcontrol 
            WHERE FORMAT(TglSPK,'yyyyMM') = ?
            ORDER BY CAST(RIGHT(NoTrans,3) AS INT) DESC
            ");
        $query->bindParam(1, $tglspk, PDO::PARAM_STR);
        $query->execute();
        $getNoTrans = $query->fetchColumn();

        $newNoTrans = $getNoTrans ? sprintf('%03d', intval($getNoTrans) + 1) : '001';
        $newNoTrans = "IC-" . $tglspk . "-" . $newNoTrans;
        return $newNoTrans;
    }
    private function getNoBAA($conn,$nosop,$tglselesaibaa)
    {
        if (empty($tglselesaibaa)) {
            $newNoBAA = "";
        } else {
            $bulan = date("m", timestamp: strtotime($tglselesaibaa));
            $tahun = date("Y", timestamp: strtotime($tglselesaibaa));

            if (strpos($nosop, 'PTIC') !== false) {
                $query = $conn->prepare("
                    SELECT TOP 1 CAST(RIGHT(NoBAA,3) as INT) AS NoBAA from tbSOPControl
                    WHERE NoBAA LIKE '%PTIC%' 
                    AND YEAR(TglSelesaiBAA) = ?
                    ORDER BY CAST(RIGHT(NoBAA,3) as INT) DESC
                    ");
                $query->execute([$tahun]);
                $getNoBaa = $query->fetchColumn();

                $newNoBAA = $getNoBaa ? sprintf('%03d', intval($getNoBaa) + 1) : '001';
                $newNoBAA = $tahun . $bulan . "/PTIC/" . $newNoBAA;
            } else {
                $query = $conn->prepare("
                    SELECT TOP 1 CAST(LEFT(NoBAA,3) as INT) AS NoBAA from tbSOPControl
                    WHERE NoBAA NOT LIKE '%PTIC%' 
                    AND YEAR(TglSelesaiBAA) = ?
                    ORDER BY CAST(LEFT(NoBAA,3) as INT) DESC
                    ");
                $query->execute([$tahun]);
                $getNoBaa = $query->fetchColumn();

                $newNoBAA = $getNoBaa ? sprintf('%03d', intval($getNoBaa) + 1) : '001';
                $newNoBAA = $newNoBAA . "/BAA/AUD/" . $bulan . "/" . $tahun;
            }
        }
        return $newNoBAA;       
    }
    private function checkUnitUsaha($conn,$nosop,$unitusaha)
    {

        $query = $conn->prepare("
            SELECT COUNT(*) total FROM view_sop_master
            WHERE NoSOP = ?
            AND UnitUsaha = ?
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $unitusaha, PDO::PARAM_STR);
        $query->execute();
        $checkUnitUsaha = $query->fetchColumn();

        return $checkUnitUsaha > 0;
    }
    private function checkPeriodeAudit($conn,$notrans,$tanggal)
    {
        $tanggal = date("Ym", strtotime($tanggal));

        $query = $conn->prepare("
            SELECT FORMAT(TglSPK, 'yyyyMM') AS tanggal FROM tbSOPcontrol 
            WHERE NoTrans = ?
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->execute();
        $checkPeriodeAudit = $query->fetchColumn();

        return $checkPeriodeAudit == $tanggal;
    }
    private function checkAudit($conn, $notrans, $nosop, $tanggal, $unitusaha)
    {
        $tanggal = date("Ym", strtotime($tanggal));

        $query = $conn->prepare("
            SELECT COUNT(*) total FROM tbSOPcontrol 
            WHERE NoSOP = ?
            AND FORMAT(TglSPK,'yyyyMM') = ?
            AND UnitUsaha = ?
            AND NoTrans != ?
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->bindParam(2, $tanggal, PDO::PARAM_STR);
        $query->bindParam(3, $unitusaha, PDO::PARAM_STR);
        $query->bindParam(4, $notrans, PDO::PARAM_STR);
        $query->execute();
        $checkAudit = $query->fetchColumn();

        return $checkAudit == 0;            
    }
    public function deleteData($conn ,$notrans, $katdelete, $keterangan)
    {
        $katdelete = htmlspecialchars(strtoupper($katdelete));
        $notrans = htmlspecialchars(strtoupper($notrans));
        $keterangan = htmlspecialchars(strtoupper($keterangan));    

        if (!$this->cekAuditBAPT($conn,$notrans)) {
            echo "adaBAPT";
            return false;
        }
        
        $stmt1 = $conn->prepare("
            INSERT INTO tbSOPControlBatal
            (NoTrans, KategoriBatal, Keterangan) 
            VALUES 
            (?, ?, ?)");
        $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
        $stmt1->bindParam(2, $katdelete, PDO::PARAM_STR);
        $stmt1->bindParam(3, $keterangan, PDO::PARAM_STR); 
        $stmt1->execute();
        return true;
    }
    private function cekAuditBAPT($conn,$notrans)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbBAPT 
            WHERE NoTrans = ?
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->execute();
        $cekAuditBAPT = $query->fetchColumn();

        return $cekAuditBAPT == 0 ;
    }
}

class AuditDetail {
    public function getSOPControl($conn, $notrans)
    {
        $notrans = htmlspecialchars(strtoupper($notrans));

        $query = select ("SELECT * FROM get_audit_notrans('$notrans')");
        return $query;
    }
    public function getAuditDetail($conn,$notrans,$offset,$rowsPerPage)
    {
        $query = select("
            SELECT * FROM get_audit_detail('$notrans')
            WHERE 1=1
            ORDER BY Notrans OFFSET $offset ROWS FETCH NEXT $rowsPerPage ROWS ONLY
        ");

        return $query;
    }
    public function countAuditDetail($conn, $notrans)
    {
        $query = select("
            SELECT COUNT(*) AS total FROM get_audit_detail('$notrans')
            WHERE 1=1
        ");

        return isset($query[0]['total']) ? (int)$query[0]['total'] : 0;
    }
    public function getAuditBAPT($conn,$notrans,$offset,$rowsPerPage)
    {
        $query = select("
            SELECT * FROM get_audit_detail_bapt('$notrans')
            WHERE 1=1
            ORDER BY Notrans OFFSET $offset ROWS FETCH NEXT $rowsPerPage ROWS ONLY
        ");

        return $query;
    }
    public function countAuditBAPT($conn, $notrans)
    {
        $query = select("
            SELECT COUNT(*) AS total FROM get_audit_detail_bapt('$notrans')
            WHERE 1=1
        ");

        return isset($query[0]['total']) ? (int)$query[0]['total'] : 0;
    }
    public function getSPK($conn, $nospk)
    {
        $nospk = htmlspecialchars(strtoupper($nospk));

        $query = select ("SELECT * FROM tbSOPSPK WHERE NoSPK = '$nospk'");
        return $query;
    }
    public function saveDataSPK($conn, $nospk, $tanggal, $auditor, $mulai1, $mulai2, $mulai3, $bahanaudit, $pic, $manager, $notrans)
    {
        $nospk = htmlspecialchars(strtoupper($nospk));
        $bahanaudit = htmlspecialchars(strtoupper($bahanaudit));
        $pic = htmlspecialchars(strtoupper($pic));
        $manager = htmlspecialchars(strtoupper($manager));

        if ($this->cekSPK($conn, $nospk)) {
            if ($nospk == "No SPK") {
                $nospk = $this->getNoSPK($conn, $tanggal);

                $stmt2 = $conn->prepare("
                    UPDATE tbSOPControl SET
                        NoSPK = ?
                    WHERE NoTrans = ?
                    ");
                $stmt2->bindParam(1, $nospk, PDO::PARAM_STR);
                $stmt2->bindParam(2, $notrans, PDO::PARAM_STR);
                $stmt2->execute();   
            }
            
            $stmt1 = $conn->prepare("
                INSERT INTO tbSOPSPK 
                (NoSPK, WaktuMulai, WaktuMulai2, WaktuMulai3, BahanAudit, PIC, Auditor, Manager, TglInput) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, getdate())");
            $stmt1->bindParam(1, $nospk, PDO::PARAM_STR);
            $stmt1->bindParam(2, $mulai1, PDO::PARAM_STR);
            $stmt1->bindParam(3, $mulai2, empty($mulai2) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(4, $mulai3, empty($mulai3) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(5, $bahanaudit, PDO::PARAM_STR);
            $stmt1->bindParam(6, $pic, PDO::PARAM_STR);
            $stmt1->bindParam(7, $auditor, PDO::PARAM_STR);
            $stmt1->bindParam(8, $manager, PDO::PARAM_STR);
        } else {
            $stmt1 = $conn->prepare("
                UPDATE tbSOPSPK SET 
                    WaktuMulai = ?, 
                    WaktuMulai2 = ?,
                    WaktuMulai3 = ?,
                    BahanAudit = ?,
                    PIC = ?,
                    Auditor = ?, 
                    Manager = ?
                WHERE NoSPK = ?
                ");
            $stmt1->bindParam(1, $mulai1, PDO::PARAM_STR);
            $stmt1->bindParam(2, $mulai2, empty($mulai2) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(3, $mulai3, empty($mulai3) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(4, $bahanaudit, PDO::PARAM_STR);
            $stmt1->bindParam(5, $pic, PDO::PARAM_STR);
            $stmt1->bindParam(6, $auditor, PDO::PARAM_STR);
            $stmt1->bindParam(7, $manager, PDO::PARAM_STR);  
            $stmt1->bindParam(8, $nospk, PDO::PARAM_STR);    
        }
        $stmt1->execute();   
        return true;
    }
    private function cekSPK($conn, $nospk)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbSOPSPK 
            WHERE NoSPK = ?
            ");
        $query->bindParam(1, $nospk, PDO::PARAM_STR);
        $query->execute();
        $checkSPK = $query->fetchColumn();

        return $checkSPK == 0 ;
    }
    private function getNoSPK($conn,$tanggal)
    {
        $tglspk = date("Y", strtotime($tanggal));

        $query = $conn->prepare("
            SELECT TOP 1 LEFT(NoSPK,3) NoTrans FROM tbSOPcontrol 
            WHERE YEAR(TglSPK) = ?
            ORDER BY CAST(LEFT(NoSPK,3) AS INT) DESC
            ");
        $query->bindParam(1, $tglspk, PDO::PARAM_STR);
        $query->execute();
        $getNoSPK = $query->fetchColumn();

        $newNoSPK = $getNoSPK ? sprintf('%03d', intval($getNoSPK) + 1) : '001';
        $newNoSPK =  $newNoSPK . "/SPK/" . $tglspk;
        return $newNoSPK;
    }
    public function getDASTemuan($conn, $notrans)
    {   
        $notrans = htmlspecialchars(strtoupper($notrans));

        $query = select ("SELECT * FROM get_DAS_temuan('$notrans')");
        return $query;
    }
    public function saveDataTemuan($conn, $notrans, $nomor_temuan, $kat_temuan, $temuan_temuan, $resiko_temuan, $saran_temuan, $status_temuan, $das_temuan, $ket_temuan)
    {
        $notrans = htmlspecialchars(strtoupper($notrans));
        $kat_temuan = htmlspecialchars(strtoupper($kat_temuan));
        $temuan_temuan = htmlspecialchars(strtoupper($temuan_temuan));
        $resiko_temuan = htmlspecialchars(strtoupper($resiko_temuan));
        $saran_temuan = htmlspecialchars(strtoupper($saran_temuan));
        $status_temuan = htmlspecialchars(strtoupper($status_temuan));
        $das_temuan = htmlspecialchars(strtoupper($das_temuan));
        $ket_temuan = htmlspecialchars(strtoupper($ket_temuan));

        if (empty($nomor_temuan)) {
            $nomor_temuan = $this->getNomorTemuan($conn, $notrans);

            $stmt1 = $conn->prepare("
                INSERT INTO tbSOPControlKesimpulan 
                (NoTrans, NoUrut, NoGroup, Temuan, KategoriTemuan, Resiko, DAS) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nomor_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(3, $nomor_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(4, $temuan_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(5, $kat_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(6, $resiko_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(7, $das_temuan, PDO::PARAM_STR);
        } else {
            $stmt1 = $conn->prepare("
                UPDATE tbSOPControlKesimpulan SET 
                    Temuan = ?, 
                    KategoriTemuan = ?,
                    Resiko = ?,
                    DAS = ?
                WHERE NoTrans = ?
                AND NoUrut = ?
                ");
            $stmt1->bindParam(1, $temuan_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(2, $kat_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(3, $resiko_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(4, $das_temuan, PDO::PARAM_STR);
            $stmt1->bindParam(5, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(6, $nomor_temuan, PDO::PARAM_STR);
        }
        $success_temuan = $stmt1->execute();
        if (!$success_temuan) {
            return false;
        }
        
        if (!$this->cekSaranTemuan($conn, $notrans, $nomor_temuan)) {
            $stmt2 = $conn->prepare("
                INSERT INTO tbSOPControlSaranIC 
                (NoTrans, NoUrut, Indikator, SaranIC, NomorSaran) 
                VALUES 
                (?, ?, '', ?, ?)");
            $stmt2->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor_temuan, PDO::PARAM_STR);
            $stmt2->bindParam(3, $saran_temuan, PDO::PARAM_STR);
            $stmt2->bindParam(4, $nomor_temuan, PDO::PARAM_STR);
        } else {
            $stmt2 = $conn->prepare("
                UPDATE tbSOPControlSaranIC SET
                    SaranIC = ?
                WHERE NoTrans = ?
                AND NoUrut = ?
                ");
            $stmt2->bindParam(1, $saran_temuan, PDO::PARAM_STR);
            $stmt2->bindParam(2, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(3, $nomor_temuan, PDO::PARAM_STR);
        }
        $success_saran = $stmt2->execute();
        if (!$success_saran) {
            return false;
        }

        if (!$this->cekStatusTemuan($conn, $notrans, $nomor_temuan)) {
            $stmt3 = $conn->prepare("
                INSERT INTO tbStatusTemuandanBAPT 
                (NoTrans, Nomor, Jenis, StatusTB, Keterangan, TglInput, UserID) 
                VALUES 
                (?, ?, 'Temuan', ?, ?, getdate(), 'SUPER')");
            $stmt3->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(2, $nomor_temuan, PDO::PARAM_STR);
            $stmt3->bindParam(3, $status_temuan, PDO::PARAM_STR);
            $stmt3->bindParam(4, $ket_temuan, PDO::PARAM_STR);
        } else {
            $stmt3 = $conn->prepare("
                UPDATE tbStatusTemuandanBAPT SET
                    StatusTB= ?,
                    Keterangan = ?
                WHERE NoTrans = ? 
                AND Nomor = ? 
                AND Jenis = 'Temuan'
                ");
            $stmt3->bindParam(1, $status_temuan, PDO::PARAM_STR);
            $stmt3->bindParam(2, $ket_temuan, PDO::PARAM_STR);
            $stmt3->bindParam(3, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(4, $nomor_temuan, PDO::PARAM_STR);
        }
        $success_status = $stmt3->execute();
        if (!$success_status) {
            return false;
        }

        return true;
    }
    private function getNomorTemuan($conn,$notrans)
    {
        $query = $conn->prepare("
            SELECT TOP 1 CAST(NoUrut as INT) nomor FROM tbSOPControlKesimpulan 
            WHERE NoTrans = ?
            ORDER BY CAST(NoUrut as INT) DESC
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->execute();
        $getNomorTemuan = $query->fetchColumn();

        if ($getNomorTemuan) {
            $newNomorTemuan = intval($getNomorTemuan) + 1;
        } else {
            $newNomorTemuan = 1;
        }
        
        return $newNomorTemuan;
    }
    private function cekSaranTemuan($conn, $notrans, $nomor_temuan) {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbSOPControlSaranIC 
            WHERE NoTrans = ?
            AND NoUrut = ?
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->bindParam(2, $nomor_temuan, PDO::PARAM_STR);
        $query->execute();
        $cekSaranTemuan = $query->fetchColumn();

        return $cekSaranTemuan > 0 ;
    }
    private function cekStatusTemuan($conn, $notrans, $nomor_temuan) {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbStatusTemuandanBAPT 
            WHERE NoTrans = ?
            AND Nomor = ?
            AND Jenis = 'Temuan'
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->bindParam(2, $nomor_temuan, PDO::PARAM_STR);
        $query->execute();
        $cekStatusTemuan = $query->fetchColumn();

        return $cekStatusTemuan > 0 ;
    }
    public function delData($conn, $notrans, $jenis, $nomor)
    {
        $notrans = htmlspecialchars(strtoupper($notrans));

        if ($jenis == "temuan") {

            if (!$this->cekAdaBAPT($conn,$notrans,$nomor)) {
                echo "adaBAPT";
                return false;
            }
            $stmt1 = $conn->prepare("
                DELETE FROM tbSOPControlKesimpulan 
                WHERE NoTrans = ?
                AND NoUrut = ?
                ");
            $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_temuan = $stmt1->execute();
            if (!$success_temuan) {
                return false;
            }       

            $stmt2 = $conn->prepare("
                DELETE FROM tbSOPControlSaranIC 
                WHERE NoTrans = ?
                AND NoUrut = ?
                ");
            $stmt2->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_saran = $stmt2->execute();
            if (!$success_saran) {
                return false;
            }     

            $stmt3 = $conn->prepare("
                DELETE FROM tbStatusTemuandanBAPT 
                WHERE NoTrans = ?
                AND Nomor = ?
                AND jenis = 'Temuan'
                ");
            $stmt3->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_status = $stmt3->execute();
            if (!$success_status) {
                return false;
            }     
        } else if ($jenis == "BAPT") {

            if (!$this->cekBAPTFU($conn,$notrans,$nomor)) {
                echo "adaFU";
                return false;
            }

            $stmt1 = $conn->prepare("
                DELETE FROM tbSOPControlBAPT 
                WHERE NoTrans = ?
                AND Nomor = ?
                ");
            $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_temuan = $stmt1->execute();
            if (!$success_temuan) {
                return false;
            }       

            $stmt2 = $conn->prepare("
                DELETE FROM tbBAPT 
                WHERE NoTrans = ?
                AND Nomor = ?
                ");
            $stmt2->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_saran = $stmt2->execute();
            if (!$success_saran) {
                return false;
            }     

            $stmt3 = $conn->prepare("
                DELETE FROM tbRefTemuanBAPT 
                WHERE NoTrans = ?
                AND NoBAPT = ?
                ");
            $stmt3->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(2, $nomor, PDO::PARAM_STR);     
            $success_status = $stmt3->execute();
            if (!$success_status) {
                return false;
            }  
        }

        return true;
    }
    public function cekAdaBAPT($conn, $notrans, $nomor) {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbRefTemuanBAPT 
            WHERE NoTrans = ?
            AND NoTemuan = ?
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->bindParam(2, $nomor, PDO::PARAM_STR);
        $query->execute();
        $cekAdaBAPT = $query->fetchColumn();

        return $cekAdaBAPT == 0 ;
    }
    private function cekBAPTFU($conn, $notrans, $nomor_bapt)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbSOPControlBAPTFu 
            WHERE NoTrans = ?
            AND Nomor = ?
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->bindParam(2, $nomor_bapt, PDO::PARAM_STR);
        $query->execute();
        $cekBAPTFU = $query->fetchColumn();

        return $cekBAPTFU == 0 ;
        
    }
    public function cekDataTemuan($conn, $notrans) {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbStatusTemuandanBAPT 
            WHERE NoTrans = ?
            AND StatusTB = 'BAPT'
            AND Jenis = 'Temuan'
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->execute();
        $cekDataTemuan = $query->fetchColumn();

        return $cekDataTemuan > 0 ;
    }
    public function getTemuan($conn, $notrans)
    {   
        $query = select ("SELECT * FROM get_audit_detail('$notrans') WHERE StatusTB = 'BAPT'");
        return $query;
    }
    public function saveDataBAPT($conn, $notrans, $nomor_bapt, $temuan_bapt, $bapt_bapt, $pic_bapt, $est_bapt, $selesai_bapt) 
    {
        $notrans = htmlspecialchars(strtoupper($notrans));
        $temuan_bapt = htmlspecialchars(strtoupper($temuan_bapt));
        $bapt_bapt = htmlspecialchars(strtoupper($bapt_bapt));
        $pic_bapt = htmlspecialchars(strtoupper($pic_bapt));

        if (empty($nomor_bapt)) {
            $nomor_bapt = $this->getNomorBAPT($conn, $notrans);

            $stmt1 = $conn->prepare("
                INSERT INTO tbSOPControlBAPT 
                (NoTrans, Nomor, PICBAPT, EstTglSelesai, TglSelesai) 
                VALUES 
                (?, ?, ?, ?, ?)");
            $stmt1->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nomor_bapt, PDO::PARAM_STR);
            $stmt1->bindParam(3, $pic_bapt, PDO::PARAM_STR);
            $stmt1->bindParam(4, $est_bapt, PDO::PARAM_STR);
            $stmt1->bindParam(5, $selesai_bapt, empty($selesai_bapt) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $success_bapt = $stmt1->execute();
            if (!$success_bapt) {
                return false;
            }

            $stmt2 = $conn->prepare("
                INSERT INTO tbBAPT 
                (NoTrans, Nomor, BAPT) 
                VALUES 
                (?, ?, ?)");
            $stmt2->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor_bapt, PDO::PARAM_STR);
            $stmt2->bindParam(3, $bapt_bapt, PDO::PARAM_STR);
            $success_bapt_detail = $stmt2->execute();
            if (!$success_bapt_detail) {
                return false;
            }

            $stmt3 = $conn->prepare("
                INSERT INTO tbRefTemuanBAPT 
                (NoTrans, NoTemuan, NoBAPT) 
                VALUES 
                (?, ?, ?)");
            $stmt3->bindParam(1, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(2, $temuan_bapt, PDO::PARAM_STR);
            $stmt3->bindParam(3, $nomor_bapt, PDO::PARAM_STR);
            $success_bapt_ref = $stmt3->execute();
            if (!$success_bapt_ref) {
                return false;
            }
        } else {
            $stmt1 = $conn->prepare("
                UPDATE tbSOPControlBAPT SET 
                    PICBAPT = ?, 
                    EstTglSelesai = ?,
                    TglSelesai = ?
                WHERE NoTrans = ?
                AND Nomor = ?
                ");
            $stmt1->bindParam(1, $pic_bapt, PDO::PARAM_STR);
            $stmt1->bindParam(2, $est_bapt, PDO::PARAM_STR);
            $stmt1->bindParam(3, $selesai_bapt, empty($selesai_bapt) ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt1->bindParam(4, $notrans, PDO::PARAM_STR);
            $stmt1->bindParam(5, $nomor_bapt, PDO::PARAM_STR);
            $success_bapt = $stmt1->execute();
            if (!$success_bapt) {
                return false;
            }

            $stmt2 = $conn->prepare("
                UPDATE tbBAPT SET
                    BAPT = ?
                WHERE NoTrans = ?
                AND Nomor = ?
                ");
            $stmt2->bindParam(1, $bapt_bapt, PDO::PARAM_STR);
            $stmt2->bindParam(2, $notrans, PDO::PARAM_STR);
            $stmt2->bindParam(3, $nomor_bapt, PDO::PARAM_STR);
            $success_bapt_detail = $stmt2->execute();
            if (!$success_bapt_detail) {
                return false;
            }

            $stmt3 = $conn->prepare("
                UPDATE tbRefTemuanBAPT SET
                    NoTemuan = ?
                WHERE NoTrans = ?
                AND NoBAPT = ?
                ");
            $stmt3->bindParam(1, $temuan_bapt, PDO::PARAM_STR);
            $stmt3->bindParam(2, $notrans, PDO::PARAM_STR);
            $stmt3->bindParam(3, $nomor_bapt, PDO::PARAM_STR);
            $success_bapt_ref = $stmt3->execute();
            if (!$success_bapt_ref) {
                return false;
            }
        }
        return true;
    }
    private function getNomorBAPT($conn,$notrans)
    {
        $query = $conn->prepare("
            SELECT TOP 1 CAST(Nomor as INT) nomor FROM tbSOPControlBAPT 
            WHERE NoTrans = ?
            ORDER BY CAST(Nomor as INT) DESC
            ");
        $query->bindParam(1, $notrans, PDO::PARAM_STR);
        $query->execute();
        $getNomorBAPT = $query->fetchColumn();

        if ($getNomorBAPT) {
            $newNomorBAPT = intval($getNomorBAPT) + 1;
        } else {
            $newNomorBAPT = 1;
        }
        return $newNomorBAPT;
    }
}
class sopDAS {
    public function getSOPDAS($conn,$nosop,$offset,$rowsPerPage)
    {
        $query = select("
            SELECT * FROM get_sop_das('$nosop')
            WHERE 1=1
            ORDER BY nomorDAS OFFSET $offset ROWS FETCH NEXT $rowsPerPage ROWS ONLY
        ");

        return $query;
    }
    public function countSOPDAS($conn, $nosop)
    {
        $query = select("
            SELECT COUNT(*) AS total FROM get_sop_das('$nosop')
            WHERE 1=1
        ");

        return isset($query[0]['total']) ? (int)$query[0]['total'] : 0;
    }
    public function saveDataDAS($conn, $nosop, $nomor_das, $das_das, $namasop) 
    {
        $nosop = htmlspecialchars(strtoupper($nosop));
        $das_das = htmlspecialchars(strtoupper($das_das));

        if (!$this->cekDasHead($conn,$nosop)) {
            $jenis = 'getnew';
            $nomor_das_head = $this->getDasHead($conn, $nosop ,$jenis);

            $stmt1 = $conn->prepare("
                INSERT INTO tbDASHead 
                (NomorUrut, NoSOP, NamaSOP, UserID, Tglbuat) 
                VALUES 
                (?, ?, ?, 'SUPER', getdate())");
            $stmt1->bindParam(1, $nomor_das_head, PDO::PARAM_STR);
            $stmt1->bindParam(2, $nosop, PDO::PARAM_STR);
            $stmt1->bindParam(3, $namasop, PDO::PARAM_STR);        
            $success_DASHead = $stmt1->execute();
            if (!$success_DASHead) {
                return false;
            }
        } else {
            $jenis = 'get';
            $nomor_das_head = $this->getDasHead($conn, $nosop ,$jenis);
        }

        if (empty($nomor_das)) {
            $nomor_das = $this->getNomorDAS($conn, $nomor_das_head);

            $stmt2 = $conn->prepare("
                INSERT INTO tbDASdet1 
                (NomorUrutDasHead, NomorUrutDasdet1, Permasalahan, UserID, Tglbuat) 
                VALUES 
                (?, ?, ?, 'SUPER', getdate())");
            $stmt2->bindParam(1, $nomor_das_head, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor_das, PDO::PARAM_STR);
            $stmt2->bindParam(3, $das_das, PDO::PARAM_STR);
        } else {
            $stmt2 = $conn->prepare("
                UPDATE tbDASdet1 SET
                    Permasalahan = ?,
                    UserID = 'SUPER'
                WHERE NomorUrutDasHead = ?
                AND NomorUrutDasdet1 = ?
                ");
            $stmt2->bindParam(1, $das_das, PDO::PARAM_STR);
            $stmt2->bindParam(2, $nomor_das_head, PDO::PARAM_STR);
            $stmt2->bindParam(3, $nomor_das, PDO::PARAM_STR);
        }
        $success_DAS = $stmt2->execute();
        if (!$success_DAS) {
            return false;
        }

        return true;
    }
    private function cekDasHead($conn, $nosop)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbDASHead 
            WHERE NoSOP = ?
            ");
        $query->bindParam(1, $nosop, PDO::PARAM_STR);
        $query->execute();
        $cekDasHead = $query->fetchColumn();

        return $cekDasHead > 0 ;       
    }
    private function getDasHead($conn, $nosop, $jenis)
    {
        if ($jenis == 'getnew')
        {
            $query = $conn->prepare("
                SELECT TOP 1 CAST(NomorUrut as INT) nomor FROM tbDASHead 
                ORDER BY CAST(NomorUrut as INT) DESC
                ");
            $query->execute();
            $getDasHead = $query->fetchColumn();

            if ($getDasHead) {
                $newNomorDAS = intval($getDasHead) + 1;
            } else {
                $newNomorDAS = 1;
            }
        } else {
            $query = $conn->prepare("
                SELECT TOP 1 CAST(NomorUrut as INT) nomor FROM tbDASHead 
                WHERE NoSOP = ?
                ORDER BY CAST(NomorUrut as INT) DESC
                ");
            $query->bindParam(1, $nosop, PDO::PARAM_STR);
            $query->execute();
            $getDasHead = $query->fetchColumn();
            $newNomorDAS = intval($getDasHead);    
        }
        return $newNomorDAS;
    }

    private function getNomorDAS($conn, $nomor_das_head)
    {
        $query = $conn->prepare("
            SELECT TOP 1 CAST(RIGHT(NomorUrutDasdet1,3) as INT) nomor FROM tbDASdet1 
            WHERE NomorUrutDasHead = ?
            ORDER BY CAST(RIGHT(NomorUrutDasdet1,3) AS INT) DESC
            ");
        $query->bindParam(1, $nomor_das_head, PDO::PARAM_STR);
        $query->execute();
        $getNomorDAS = $query->fetchColumn();

        $newNomorDAS = $getNomorDAS ? sprintf('%03d', intval($getNomorDAS) + 1) : '001';
        $newNomorDAS =  $nomor_das_head . "-" . $newNomorDAS;
        return $newNomorDAS;
    }
    public function deleteDataDAS($conn, $nomor_das_head, $nomor_das) 
    {
        if (!$this->cekDasTemuan($conn,$nomor_das)) {
            echo "adaTemuan";
            return false;
        } 
        $stmt1 = $conn->prepare("
            DELETE FROM tbDASdet1
            WHERE NomorUrutDasHead = ?
            AND NomorUrutDasdet1 = ?
            ");
        $stmt1->bindParam(1, $nomor_das_head, PDO::PARAM_STR);
        $stmt1->bindParam(2, $nomor_das, PDO::PARAM_STR);   
        $success_delete = $stmt1->execute();
        if (!$success_delete) {
            return false;
        }

        return true;
    }

    private function cekDasTemuan($conn, $nomor_das)
    {
        $query = $conn->prepare("
            SELECT COUNT(*) as total FROM tbSOPControlKesimpulan 
            WHERE DAS = ?
            ");
        $query->bindParam(1, $nomor_das, PDO::PARAM_STR);
        $query->execute();
        $cekDasHead = $query->fetchColumn();

        return $cekDasHead == 0 ;       
    }
}
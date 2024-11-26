<?php

// Include database connection (assuming you have a db_connection.php file)
include 'app.php';

class crudSOPMaster
{
    public function getSOPMASTER($conn, $divisi, $kategori)
    {
        $query = "  SELECT tbSOP.NoSOP, tbSOP.NamaSOP, tbSOP.DivisiMain, tbSOPKategori.KategoriSOP 
                    FROM tbSOP
                    OUTER APPLY (SELECT TOP 1 KategoriSOP FROM tbSOPKategori kat
                                WHERE kat.NoSOP = tbSOP.NoSOP) tbSOPKategori
                    WHERE 1=1
                ";

        $params = [];

        if (!empty($divisi)) {
            $query .= " AND tbSOP.DivisiMain = :divisi";
            $params[':divisi'] = $divisi;
        }

        if (!empty($kategori)) {
            $query .= " AND tbSOPKategori.KategoriSOP = :kategori";
            $params[':kategori'] = $kategori;
        }

        return $this->selectparams($query, $params);
        header('Content-Type: application/json');
        echo json_encode($results);

    }
}


?>

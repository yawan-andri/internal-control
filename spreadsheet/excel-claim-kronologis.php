<?php

require '../config/app.php';
require '../vendor/autoload.php';

$periode = $_POST['periode'];
$namapc = "WIANTORO-CLAIM-WEB";
$unit1 = 'DESWEB';
$unit2 = 'KLOUDMIFCL';
$trigger = 'spClaimWebKronologis';




// $sql = "DELETE FROM MASTER_DES.dbo.lotemporary WHERE namapc = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(1, $namapc, PDO::PARAM_STR);
// try {
//     $stmt->execute();
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// $sqldes = "{call MASTER_DES.dbo.spClaimWebMaster(?, ?, ?, ?)}";
// $stmtdes = $conn->prepare($sqldes);
// $stmtdes->bindValue(1, $unit1, PDO::PARAM_STR);
// $stmtdes->bindValue(2, $periode, PDO::PARAM_STR);
// $stmtdes->bindValue(3, $namapc, PDO::PARAM_STR);
// $stmtdes->bindValue(4, $trigger, PDO::PARAM_STR);
// try {
//     $stmtdes->execute();
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// $sqlsts = "{call MASTER_DES.dbo.spClaimWebMaster(?, ?, ?, ?)}";
// $stmtsts = $conn->prepare($sqlsts);
// $stmtsts->bindValue(1, $unit2, PDO::PARAM_STR);
// $stmtsts->bindValue(2, $periode, PDO::PARAM_STR);
// $stmtsts->bindValue(4, $namapc, PDO::PARAM_STR);
// $stmtsts->bindValue(3, $trigger, PDO::PARAM_STR);
// try {
//     $stmtsts->execute();
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

// $sql = "{call MASTER_DES.dbo.[spClaimWebKronologis](?, ?)}";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(1, $periode, PDO::PARAM_STR);
// $stmt->bindParam(2, $namapc, PDO::PARAM_STR);
// try {
//     $stmt->execute();
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

$row_loop = select ("SELECT TOP 1 NOMOR FROM MASTER_DES.dbo.[vClaimWebKronologisIndikator] ORDER BY NOMOR DESC");
foreach ($row_loop as $row_loops) {
    $row_loop = intval($row_loops['NOMOR']);
}

$cell = 8;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Kronologis = $spreadsheet->getActiveSheet();

$Kronologis->setCellValue('A1', 'RANGKUMAN CLAIM - INPUT KRONOLOGIS')->mergeCells('A1:N1');
$Kronologis->setCellValue('A2', 'UPDATE ');
$Kronologis->setCellValue('C2', date("Y-m-d"));
$Kronologis->setCellValue('A3', 'ACUAN');
$Kronologis->setCellValue('C3', 'TGL BONGKAR');

$Kronologis->setCellValue('A5', 'INDIKATOR')->mergeCells('A5:A6');
$Kronologis->setCellValue('C5', 'JUL')->mergeCells('C5:D5');
$Kronologis->setCellValue('E5', 'AUG')->mergeCells('E5:F5');
$Kronologis->setCellValue('G5', 'SEP')->mergeCells('G5:H5');
$Kronologis->setCellValue('I5', 'OCT')->mergeCells('I5:J5');
$Kronologis->setCellValue('K5', 'NOV')->mergeCells('K5:L5');
$Kronologis->setCellValue('M5', 'DES')->mergeCells('M5:N5');

$Kronologis->setCellValue('C6', 'DES');
$Kronologis->setCellValue('D6', 'STS');
$Kronologis->setCellValue('E6', 'DES');
$Kronologis->setCellValue('F6', 'STS');
$Kronologis->setCellValue('G6', 'DES');
$Kronologis->setCellValue('H6', 'STS');
$Kronologis->setCellValue('I6', 'DES');
$Kronologis->setCellValue('J6', 'STS');
$Kronologis->setCellValue('K6', 'DES');
$Kronologis->setCellValue('L6', 'STS');
$Kronologis->setCellValue('M6', 'DES');
$Kronologis->setCellValue('N6', 'STS');

$x =1;


for ($i = 0; $i < $row_loop; $i++) {
    $cw_kronologis = select ("SELECT
                            NOMOR, SUBNOMOR, main.INDIKATOR,
                            ISNULL([DES JAN],0) [DES JAN], ISNULL([STS JAN],0) [STS JAN], ISNULL([DES FEB],0) [DES FEB], ISNULL([STS FEB],0) [STS FEB], 
                            ISNULL([DES MAR],0) [DES MAR], ISNULL([STS MAR],0) [STS MAR], ISNULL([DES APR],0) [DES APR], ISNULL([STS APR],0) [STS APR],
                            ISNULL([DES MEI],0) [DES MEI], ISNULL([STS MEI],0) [STS MEI], ISNULL([DES JUN],0) [DES JUN], ISNULL([STS JUN],0) [STS JUN],
                            ISNULL([DES JUL],0) [DES JUL], ISNULL([STS JUL],0) [STS JUL], ISNULL([DES AUG],0) [DES AUG], ISNULL([STS AUG],0) [STS AUG],
                            ISNULL([DES SEP],0) [DES SEP], ISNULL([STS SEP],0) [STS SEP], ISNULL([DES OCT],0) [DES OCT], ISNULL([STS OCT],0) [STS OCT], 
                            ISNULL([DES NOV],0) [DES NOV], ISNULL([STS NOV],0) [STS NOV], ISNULL([DES DES],0) [DES DES], ISNULL([STS DES],0) [STS DES]
                        FROM MASTER_DES.dbo.[vClaimWebKronologisIndikator] main
                        OUTER APPLY (SELECT * FROM MASTER_DES.dbo.[fClaimWebKronologis]('$namapc') as data
                                    WHERE data.indikator = main.INDIKATOR
                                    )tbdata
                        WHERE NOMOR = '$x'
                        ORDER BY NOMOR, SUBNOMOR");

    foreach ($cw_kronologis as $cw_kronologis) {
        $Kronologis->setCellValue('A' . $cell, $cw_kronologis['INDIKATOR'])->getColumnDimension('A')->setAutoSize(true);
        $Kronologis->setCellValue('C' . $cell, $cw_kronologis['DES JUL'])->getColumnDimension('C')->setAutoSize(true);
        $Kronologis->setCellValue('D' . $cell, $cw_kronologis['STS JUL'])->getColumnDimension('D')->setAutoSize(true);
        $Kronologis->setCellValue('E' . $cell, $cw_kronologis['DES AUG'])->getColumnDimension('E')->setAutoSize(true);
        $Kronologis->setCellValue('F' . $cell, $cw_kronologis['STS AUG'])->getColumnDimension('F')->setAutoSize(true);
        $Kronologis->setCellValue('G' . $cell, $cw_kronologis['DES SEP'])->getColumnDimension('G')->setAutoSize(true);
        $Kronologis->setCellValue('H' . $cell, $cw_kronologis['STS SEP'])->getColumnDimension('H')->setAutoSize(true);
        $Kronologis->setCellValue('I' . $cell, $cw_kronologis['DES OCT'])->getColumnDimension('I')->setAutoSize(true);
        $Kronologis->setCellValue('J' . $cell, $cw_kronologis['STS OCT'])->getColumnDimension('J')->setAutoSize(true);
        $Kronologis->setCellValue('K' . $cell, $cw_kronologis['DES NOV'])->getColumnDimension('K')->setAutoSize(true);
        $Kronologis->setCellValue('L' . $cell, $cw_kronologis['STS NOV'])->getColumnDimension('L')->setAutoSize(true);
        $Kronologis->setCellValue('M' . $cell, $cw_kronologis['DES DES'])->getColumnDimension('M')->setAutoSize(true);
        $Kronologis->setCellValue('N' . $cell, $cw_kronologis['STS DES'])->getColumnDimension('N')->setAutoSize(true);
        $cell++;
    }
    $x++;
    $cell++;
}

$styleborders = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border  = $cell - 2;
$Kronologis->getStyle('A5:P' . $border)->applyFromArray($styleborders);

$writer = new Xlsx($spreadsheet);
$writer->save('Claim Web Kroologis' . $periode . '.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Claim Web Kroologis' . $periode . '.xlsx"');
readfile('Claim Web Kroologis' . $periode . '.xlsx');
unlink('Claim Web Kroologis' . $periode . '.xlsx');  
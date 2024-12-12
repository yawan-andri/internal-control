<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DataGrid with Filter and Sort</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <style>
        .datagrid-row {
            height: 60px !important;
        }
        .datagrid-cell {
            vertical-align: middle !important;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h3 class="text-center">SOP MASTER</h3>
    <div class="ms-3 me-3">
        <table id="dg" class="easyui-datagrid" style="width:100%;height:670px;"
            data-options="
                pagination: true,
                rownumbers: true,
                fitColumns: false,
                singleSelect: true">
        </table>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#dg').datagrid({
                url: 'test1_getdata.php?type_data=get_data&title_data=sop_master',
                method: 'post',
                frozenColumns: [[
                    { field: 'NoSOP', title: 'No SOP', width: 200, sortable: true },
                    { field: 'NamaSOP', title: 'Nama SOP', width: 500, sortable: true }
                ]],
                columns: [[
                    { field: 'DivisiMain', title: 'Divisi Main', width: 200, sortable: true },
                    { field: 'KategoriSOP', title: 'Kategori SOP', width: 200, sortable: true },
                    { field: 'JumlahDAS', title: 'Jumlah DAS', width: 200, sortable: true },
                    { field: 'action', title: 'Kolom Aksi', width: 250, formatter: actionFormatter }
                ]],
                onLoadSuccess: function() {
                    $('.datagrid-row').css('height', '60px');
                }
            });
        });

        function actionFormatter(value, row, index) {
            return `
                <a href="sop-master-detail.php?NoSOP=${row.NoSOP}" 
                    class="btn btn-outline-secondary btn-sm me-1">
                    <i class="fas fa-list"></i> Detail
                </a>
                <a href="sop-das.php?NoSOP=${row.NoSOP}&NamaSOP=${row.NamaSOP}" 
                    class="btn btn-outline-secondary btn-sm me-1">
                    <i class="fas fa-external-link-alt"></i> DAS
                </a>
                <a href="javascript:void(0)" 
                    onclick="editData('${row.NoSOP}', '${row.NamaSOP}', '${row.DivisiMain}', '${row.KategoriSOP}');" 
                    class="btn btn-warning btn-sm me-1">
                    <i class="far fa-edit"></i> Edit
                </a>
                <a href="javascript:void(0)" 
                    onclick="deleteData('${row.NoSOP}');" 
                    class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i> Delete
                </a>
            `;
        }

        function editData(NoSOP, NamaSOP, DivisiMain, KategoriSOP) {
            alert(`Edit Data:\nNo SOP: ${NoSOP}\nNama SOP: ${NamaSOP}\nDivisi Main: ${DivisiMain}\nKategori SOP: ${KategoriSOP}`);
        }

        function deleteData(NoSOP) {
            if (confirm(`Are you sure you want to delete No SOP: ${NoSOP}?`)) {
                alert(`Data with No SOP: ${NoSOP} deleted.`);
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Internal Control</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
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

    <h3 class = "text-center">SOP MASTER</h3>

    <div class="ms-3 me-3">
        <div class="row mb-3">
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="divisifil">Divisi</label>
                    <select name="divisifil" id="divisifil" class="form-control form-control-sm">
                        <option value="">Semua Divisi</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="kategorifil">Kategori SOP</label>
                    <select name="kategorifil" id="kategorifil" class="form-control form-control-sm">
                        <option value="">Semua Kategori</option>
                        <option value="SOP">SOP</option>
                        <option value="PRA-SOP">PRA-SOP</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <button id="btnFilter" class="btn btn-primary btn-sm mt-4">Filter</button>
            </div>
        </div>


        <table id="dg" class="easyui-datagrid" style="width:100%;height:500px;"
            data-options="
                pagination: true,
                rownumbers: true,
                fitColumns: false,
                singleSelect: true">
        </table>
    </div>

    <script type="text/javascript">
        $(function() {
            // Load initial data for the dropdown
            getDivisi();

            // Initialize DataGrid
            $('#dg').datagrid({
                url: 'test3.php',
                method: 'post',
                queryParams: {
                    divisifil: '', // Default filter values
                    kategorifil: ''
                },
                frozenColumns: [[
                    { field: 'NoSOP', title: 'No SOP', width: 150 },
                    { field: 'NamaSOP', title: 'Nama SOP', width: 200 }
                ]],
                columns: [[
                    { field: 'DivisiMain', title: 'Divisi Main', width: 150 },
                    { field: 'KategoriSOP', title: 'Kategori SOP', width: 150 },
                    { field: 'action', title: 'Kolom Aksi', width: 250, formatter: actionFormatter }
                ]]
            });

            // Event listener for filter button
            $('#btnFilter').on('click', function() {
                var divisifil = $('#divisifil').val();
                var kategorifil = $('#kategorifil').val();

                // Reload DataGrid with new filters
                $('#dg').datagrid('load', {
                    divisifil: divisifil,
                    kategorifil: kategorifil
                });
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

        function getDivisi() {
            $.post('test3.php', { masterData: 'getDivisi' }, function(data) {
                $('#divisifil').html('<option value="">Semua Divisi</option>' + data);
            });
        }
    </script>
</body>
</html>

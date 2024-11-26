<?php 
    include 'template/header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Frozen Rows in DataGrid - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="assets/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="assets/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <!-- <script type="text/javascript" src="assets/easyui/jquery.min.js"></script> -->
    <script type="text/javascript" src="assets/easyui/jquery.easyui.min.js"></script>
</head>

<div class="container ms-1">
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="divisifil">Divisi </label>          
                <select name ="divisifil" id="divisifil" class="form-control form-control-sm" required>
                    <div id ="divisifil"></div>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="kategorifil">Kategori SOP </label>          
                <select name ="kategorifil" id="kategorifil" class="form-control form-control-sm" required>
                    <option value=""></option>
                    <option value="SOP">SOP</option>
                    <option value="PRA-SOP">PRA-SOP</option>                   
                </select>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3">
    <a href="javascript:void(0);" onclick="tambahData()" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <a href="spreadsheet/master-sop-excel.php" class="btn btn-outline-success btn-sm mb-2">Export Excel</a>

    <table id="sopMaster" class="easyui-datagrid" style="min-height:500px; width: 99%"
            data-options="
                singleSelect:true,
                pagination:true,
                pageSize:10,
                rownumbers:true,
                method:'post',
                url:'crud-sopmaster.php',
                queryParams:{
                    crudSOPMaster: 'getData'
                },
                onLoadSuccess: function(){
                    $('#sopMaster').datagrid('freezeRow',0).datagrid('freezeRow',1);
                }
            ">
        <thead data-options="frozen:true">
            <tr>
                <th data-options="field:'NoSOP',width:300,sortable:true">No SOP</th>
                <th data-options="field:'NamaSOP',width:500,sortable:true">Nama SOP</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th data-options="field:'DivisiMain',width:150,sortable:true">Divisi</th>
                <th data-options="field:'KategoriSOP',width:150,sortable:true">Kategori SOP</th>
                <th data-options="field:'action',width:100,align:'center',formatter:formatAction">Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        getDivisi();
        $('#divisifil, #kategorifil').change(function() {
            $('#sopMaster').datagrid('load', {
                crudSOPMaster: 'getData',
                divisi: $('#divisifil').val(),
                kategori: $('#kategorifil').val()
            });
        });
    });

    function formatAction(value, row, index) {
        var editButton = '<a href="javascript:void(0);" onclick="editData(\'' + row.NoSOP + '\',\'' + row.NoSOP + '\',\'' + row.NamaSOP + '\',\'' + row.DivisiMain + '\',\'' + row.KategoriSOP + '\');" class="btn btn-warning btn-sm me-1">Edit</a>';
        var deleteButton = '<a href="javascript:void(0);" onclick="deleteData(\'' + row.NoSOP + '\');" class="btn btn-danger btn-sm">Delete</a>';
        return editButton + deleteButton;
    }

    function getDivisi() {
        $.post("crud-sopmaster.php",{
            crudSOPMaster:"getDivisi"
        },function (allData) {
            $("#divisifil").html(allData);
        });
    }
</script>

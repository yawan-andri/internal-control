<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create a DataGrid with PHP MySQLi and jQuery EasyUI</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <!-- <table id="dg" title="Master SOP" class="easyui-datagrid" url="load_test2.php?type_data=get_data" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:100%;height:500px;"> -->
    <table id="dg" class="easyui-datagrid" url="load_test2.php?type_data=get_data" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" style="width:100%;height:500px;">
        <thead>
            <tr>
                <th field="NoSOP" width="50">No SOP</th>
                <th field="NamaSOP" width="50">Nama SOP</th>
                <th field="DivisiMain" width="50">Divisi Main</th>
                <th field="KategoriSOP" width="50">Kategori SOP</th>
            </tr>
        </thead>
    </table>

    <!-- <div id="toolbar">
        <div id="tb">
            <input id="term" placeholder="Type keywords...">
            <a href="javascript:void(0);" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
        </div>
        <div id="tb2" style="">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newSOP()">Tambah SOP</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Remove User</a>
        </div>
    </div> -->


<div id="dlg" class="easyui-dialog" style="width:500px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
        <h3>SOP MASTER</h3>
        <div style="margin-bottom:10px">
            <input name="NoSOP" class="easyui-textbox" required="true" label="No SOP:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="NamaSOP" class="easyui-textbox" required="true" label="Nama SOP:" style="width:100%">
        </div>
        <div style="margin-bottom:10px">
            <input name="DivisiMain" class="easyui-textbox" required="true" label="Divisi Main:" style="width:100%">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0);" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px;">Save</a>
    <a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close');" style="width:90px;">Cancel</a>
</div>

<script type="text/javascript">
    function doSearch(){
        $('#dg').datagrid('load', {
            term: $('#term').val()
        });
    }

    var url;
    function newSOP(){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
        $('#fm').form('clear');
        url = 'load_test2.php?type_data=add_data';
    }

    function editUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Edit User');
            $('#fm').form('load',row);
            url = 'editData.php?type_data=add_data&NoSOP='+row.NoSOP;
        }
    }

    function saveUser(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(response){
                var respData = $.parseJSON(response);
                if(respData.status == 0){
                    $.messager.show({
                    title: 'Error',
                    msg: respData.msg
                    });
                }else{
                    $('#dlg').dialog('close');
                    $('#dg').datagrid('reload');
                }
            }
        });
    }

    function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirm','Are you sure you want to delete this user?',function(r){
                if (r){
                    $.post('deleteData.php', {id:row.id}, function(response){
                        if(response.status == 1){
                            $('#dg').datagrid('reload');
                        }else{
                            $.messager.show({
                            title: 'Error',
                            msg: respData.msg
                            });
                        }
                    },'json');
                }
            });
        }
    }
</script>
</body>
</html>
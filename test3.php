<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Remote Filtering on DataGrid - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>Remote Filtering on DataGrid</h2>
    <p>This sample shows how to apply remote filtering and pagination on a datagrid component.</p>
    
    <table id="dg" title="DataGrid" style="width:700px;height:250px">
        <thead>
            <tr>
                <th data-options="field:'NoSOP',width:80">No SOP</th>
                <th data-options="field:'NamaSOP',width:100">Nama SOP</th>
                <th data-options="field:'DivisiMain',width:80,align:'right'">Divisi</th>
                <th data-options="field:'KategoriSOP',width:80,align:'right'">Kategori SOP</th>
                <th data-options="field:'JumlahDAS',width:250">Jumlah DAS</th>
            </tr>
        </thead>
    </table>
    <script type="text/javascript">
        $(function(){
            var dg = $('#dg').datagrid({
                url: 'test3_getdata.php',
                pagination: true,
                clientPaging: false,
                remoteFilter: true,
                rownumbers: true
            });
            dg.datagrid('enableFilter', [{
                field:'KategoriSOP',
                type:'combobox',
                trigger: 'none',
                options:{
                    panelHeight:'auto',
                    selectOnNavigation: false,
                    data:[{value:'',text:'All'},{value:'SOP',text:'SOP'},{value:'PRA-SOP',text:'PRA-SOP'}],
                    onChange:function(value){
                        if (value == ''){
                            dg.datagrid('removeFilterRule', 'KategoriSOP');
                        } else {
                            dg.datagrid('addFilterRule', {
                                field: 'KategoriSOP',
                                op: 'equal',
                                value: value
                            });
                        }
                        dg.datagrid('doFilter');
                    }
                }
            }]);
        });
    </script>
</body>
</html>
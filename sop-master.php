<?php 
    include 'template/header.php'; 
?>

<h3 class = "text-center">SOP MASTER</h3>

<div class="ms-3 me-3">
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="divisifil">Divisi</label>          
                <select name="divisifil" id="divisifil" class="form-control form-control-sm" required>
                    <div id="divisifil"></div>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="kategorifil">Kategori SOP</label>          
                <select name="kategorifil" id="kategorifil" class="form-control form-control-sm" required>
                    <option value=""></option>
                    <option value="SOP">SOP</option>
                    <option value="PRA-SOP">PRA-SOP</option>                   
                </select>
            </div>
        </div>
        <!-- <div class="col-lg-2 ms-auto d-flex align-items-center">
            <div class="form-group w-100">
                <label for="namasops">Nama SOP</label>
                <input type="text" class="form-control form-control-sm" id="namasops" name="namasops">
            </div>
        </div> -->
    </div>
</div>


<div class="mt-3 ms-3 me-3">
    <a href="javaScript:void(0);" 
        onclick="tambahData()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <a href="spreadsheet/master-sop-excel.php" class="btn btn-outline-success btn-sm mb-2">Export Excel</a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th>No SOP</th>
                    <th>Nama SOP</th>
                    <th>Divisi</th>
                    <th>KategoriSOP</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="sopMaster" class=""></tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-between align-items-center">
        <div class="form-group">
            <select id="rowsPerPageSelect" class="form-select form-select-sm" style="width: auto;">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <nav>
            <ul class="pagination mb-0 pagination-sm" id="paginationControls">
            </ul>
        </nav>
    </div>
</div>

<div class="modal fade" id="myModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Master SOP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crudAppForm">
                    <input type="hidden" name="editId" id="editId" value="" />
                    <div class="row mb-3">
                        <label for="nosop" class="col-sm-2 col-form-label col-form-label-sm">No SOP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nosop" name="nosop" placeholder="No SOP ..." required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="namasop" class="col-sm-2 col-form-label col-form-label-sm">Nama SOP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="namasop" name="namasop" placeholder="Nama SOP ..." required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="divisi" class="col-sm-2 col-form-label col-form-label-sm">Divisi Main</label>
                        <div class="col-sm-10">
                            <select name ="divisi" id="divisi" class="form-control form-control-sm" required>
                                <div id ="divisi"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategorisop" class="col-sm-2 col-form-label col-form-label-sm">Kategori SOP</label>
                        <div class="col-sm-10">
                            <select name ="kategorisop" id="kategorisop" class="form-control form-control-sm" required>
                                <option value="SOP">SOP</option>
                                <option value="PRA-SOP">PRA-SOP</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-warning" role="alert" id="alert_sop"></div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary btn-sm"><span id="buttonLabel"> Simpan</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete SOP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="del_form">
                    <input type="hidden" name="del_nosop" id="del_nosop" value="" />
                    <div id ="alert_del" class="alert alert-danger" role="alert"></div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitDel" id="submitDel" class="btn btn-danger btn-sm"><span id="buttonDel"> Delete</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let rowsPerPage = 10; 

    $(document).ready(function() {
        getSOPMaster();
        getDivisi(); 

        $('#divisifil, #kategorifil, #rowsPerPageSelect').change(function() {
            currentPage = 1;
            rowsPerPage = $('#rowsPerPageSelect').val();
            getSOPMaster();
        });
        
    });

    function getSOPMaster() {
        const selectedDivisi = $('#divisifil').val();
        const selectedKategori = $('#kategorifil').val();
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            crudSOPMaster: "getData",
            divisi: selectedDivisi,
            kategori: selectedKategori,
            page: currentPage,
            rowsPerPage: rowsPerPageSelect
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#sopMaster").empty();

                response.data.forEach((row, index) => {
                    const tableRow = `<tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.NoSOP}</td>
                        <td>${row.NamaSOP}</td>
                        <td>${row.DivisiMain}</td>
                        <td>${row.KategoriSOP}</td>
                        <td>
                            <a href="sop-master-detail.php?NoSOP=${row.NoSOP}" 
                                class="btn btn-outline-secondary btn-sm me-1">
                                <i class="fas fa-list"></i> Detail
                            </a>
                            <a href="sop-das.php?NoSOP=${row.NoSOP}&NamaSOP=${row.NamaSOP}" 
                                class="btn btn-outline-secondary btn-sm me-1">
                                <i class="fas fa-external-link-alt"></i> DAS
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="editData(
                                    '${row.NoSOP}', 
                                    '${row.NoSOP}', 
                                    '${row.NamaSOP}', 
                                    '${row.DivisiMain}', 
                                    '${row.KategoriSOP}');" 
                                class="btn btn-warning btn-sm me-1">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData('${row.NoSOP}');" 
                                class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>`;
                    $("#sopMaster").append(tableRow);
                });
                updatePagination(response.totalPages);
            } else {
                console.error("Unexpected response format:", response);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed:", textStatus, errorThrown);
        });
    }

    function updatePagination(totalPages) {
        let paginationHtml = '';

        paginationHtml += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" onclick="changePage(1)"><<</a>
                        </li>`;

        paginationHtml += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" onclick="changePage(${currentPage - 1})"><</a>
                        </li>`;

        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a class="page-link" href="javascript:void(0);" onclick="changePage(${i})">${i}</a>
                            </li>`;
        }

        paginationHtml += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" onclick="changePage(${currentPage + 1})">></a>
                        </li>`;

        paginationHtml += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" onclick="changePage(${totalPages})">>></a>
                        </li>`;

        $("#paginationControls").html(paginationHtml);
    }

    function changePage(page) {
        if (page < 1 || page > $("#paginationControls li").length - 2) return;
        currentPage = page;
        getSOPMaster();
    }

    function getDivisi() {
        $.post("data/get_data.php",{
            masterData:"getDivisi"
        },function (allData) {
            $("#divisi").html(allData);
            $("#divisifil").html(allData);
        });
    }

    $("form#crudAppForm").on("submit",function (e) {
        e.preventDefault();
        var nosop = $("#nosop").val();
        var namasop = $("#namasop").val();
        var divisi  = $("#divisi").val();
        var editId = $("#editId").val();
        var kategorisop = $('#kategorisop').val();
        
        $("#alert_sop").hide();
        $("#buttonLabel").html("Saving...");

        $.post("data/get_data.php", {
            crudSOPMaster:"saveData",
            nosop:nosop,
            namasop:namasop,
            divisi:divisi,
            kategorisop:kategorisop,
            editId:editId
        }, function (response) {
            if (response == "saved") {
                $("#buttonLabel").html("Save");
                $("#alert_sop").hide();
                $("#myModal").modal('hide');
                $("form#crudAppForm").each(function () {
                    this.reset();
                });
                getSOPMaster();
            } else if (response == "duplicateNoSOP") { 
                $("#alert_sop").text("Tidak bisa input No SOP yang sama!");
                $("#alert_sop").show();
                $("#buttonLabel").html("Save");
            } else if (response == "duplicateNamaSOP") { 
                $("#alert_sop").text("Tidak bisa input Nama SOP yang sama!");
                $("#alert_sop").show();
                $("#buttonLabel").html("Save");
            } 
        });
    });


    function tambahData(editId,nosop,namasop,divisi,kategorisop) {
        document.getElementById("nosop").disabled = false;

        $("#editId").val('');
        $("#nosop").val('');
        $("#namasop").val('');
        $("#divisi").val('');
        $("#kategorisop").val('');
        $("#alert_sop").hide();
        $("#myModal").modal('show');
        $("#duplicateNoSOP").hide();
        $("#duplicateNamaSOP").hide();
        $("#buttonLabel").html("Save");
    }

    function editData(editId,nosop,namasop,divisi,kategorisop) {
        document.getElementById("nosop").disabled = true;

        $("#editId").val(editId);
        $("#nosop").val(nosop);
        $("#namasop").val(namasop);
        $("#divisi").val(divisi);
        $("#kategorisop").val(kategorisop);
        $("#alert_sop").hide();
        $("#myModal").modal('show');
        $("#duplicateNoSOP").hide();
        $("#duplicateNamaSOP").hide();
        $("#buttonLabel").html("Save");
    }

    function deleteData(nosop) {
        $("#del_nosop").val(nosop);
        $("#alert_del").text("Hapus SOP " + nosop + " ini?");
        $("#submitDel").show();
        $("#modalDelete").modal('show');
        $("#buttonDelete").html("Delete");
    }

    $("form#del_form").on("submit", function (e) {
        e.preventDefault();
        
        var nosop_del = $("#del_nosop").val();

        $("#buttonDel").html("Deleting...");
        
        $.post("data/get_data.php", {
            crudSOPMaster:"deleteData",
            nosop_del: nosop_del

        }, function (response) {
            if (response == "deleted") {
                $("#buttonDel").html("Delete");
                $("#modalDelete").modal('hide');
                getSOPMaster();
            } else {
                $("#alert_del").text("Tidak bisa hapus " + nosop_del + " ini, sudah dipakai Audit");
                $("#buttonDel").html("Delete");
                $("#submitDel").hide();
                getSOPMaster();
            }
        });
    });

</script>

<?php 
    include 'template/footer.php';
?>

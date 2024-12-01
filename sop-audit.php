<?php 
    include 'template/header.php'; 
?>

<h3 class = "text-center">SOP AUDIT</h3>

<div class="ms-3 me-3">
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="magicper">Periode</label>          
                <div class= "col-lg-3 col-md-4 col-sm-10 col-xs-12">
                    <input type="text" id ="magicper">
                </div>
            </div>
        </div>  
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="unitusahafil">UnitUsaha</label>          
                <select name="unitusahafil" id="unitusahafil" class="form-control form-control-sm" required>
                    <div id="unitusahafil"></div>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="auditorfil">Auditor</label>          
                <select name="auditorfil" id="auditorfil" class="form-control form-control-sm" required>
                    <div id="auditorfil"></div>                  
                </select>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="button" class="btn btn-outline-primary btn-sm" onclick="searchAudit()" >
            Cari Transaksi
        </button>
    </div>
</div>

<div class="mt-3 ms-3 me-3">
    <a href="javaScript:void(0);" 
        onclick="tambahData()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <!-- <a href="javaScript:void(0);" 
        onclick="generateData()" 
        data-bs-toggle="modal" 
        class="btn btn-outline-warning btn-sm mb-2"> 
        <i class="fa fa-plus"></i> Generate Audit 
    </a> -->

    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th>Notrans</th>
                    <th>Nama SOP</th>
                    <th>Unit Usaha</th>
                    <th>Tgl SPK</th>
                    <th>Auditor</th>
                    <th>Jenis Audit</th>
                    <th>Aksi</th>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">SOP Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="crudAppForm">
                    <div class="row mb-3">
                        <label for="notrans" class="col-sm-2 col-form-label col-form-label-sm">No Transaksi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="notrans" name="notrans" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nosop" class="col-sm-2 col-form-label col-form-label-sm">SOP</label>
                        <div class="col-sm-10">
                            <select name ="nosop" id="nosop" class="form-control form-control-sm" required>
                                <div id ="nosop"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="unitusaha" class="col-sm-2 col-form-label col-form-label-sm">Unit Usaha</label>
                        <div class="col-sm-10">
                            <select name ="unitusaha" id="unitusaha" class="form-control form-control-sm" required>
                                <div id ="unitusaha"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenisaudit" class="col-sm-2 col-form-label col-form-label-sm">Jenis Audit</label>
                        <div class="col-sm-10">
                            <select name ="jenisaudit" id="jenisaudit" class="form-control form-control-sm" required>
                                <option value="RUTIN">Control Rutin</option>
                                <option value="CPL">Control Paket Lengkap</option>
                                <option value="CS">Control Sekilas</option>
                                <option value="PTIC">PTIC</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label col-form-label-sm">Tgl SPK</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required>
                        </div>
                        <label for="tglaudit" class="col-sm-2 col-form-label col-form-label-sm">Tgl Audit</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="tglaudit" name="tglaudit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="auditor" class="col-sm-2 col-form-label col-form-label-sm">Auditor</label>
                        <div class="col-sm-10">
                            <select name ="auditor" id="auditor" class="form-control form-control-sm" required>
                                <div id ="auditor"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div id="alert"></div>
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

<div class="modal fade" id="myModalDelete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Transaksi Audit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delForm">
                    <div id="del_data">
                        <div class="row mb-3">
                            <label for="notransdelete" class="col-sm-2 col-form-label col-form-label-sm">No Transaksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="notransdelete" name="notransdelete" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="katdelete" class="col-sm-2 col-form-label col-form-label-sm">Kategori Delete</label>
                            <div class="col-sm-10">
                                <select name ="katdelete" id="katdelete" class="form-control form-control-sm" required>
                                    <option value="Auditor Sakit / Berhalangan">Auditor Sakit / Berhalangan</option>
                                    <option value="PIC Belum Siap">PIC Belum Siap</option>
                                    <option value="Topik Audit Privasi">Topik Audit Privasi</option>
                                    <option value="Salah Input">Salah Input</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label col-form-label-sm">Keterangan Delete</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan" required>
                            </div>
                        </div>
                    </div>
                    <div id ="alert_del" class="alert alert-danger" role="alert"></div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="DelBtn" id="DelBtn" class="btn btn-primary btn-sm"><span id="buttonDel"> Delete</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let rowsPerPage = 10; 

    new AirDatepicker('#magicper',{
        view:'months',
        minView: 'months',
        dateFormat:'MMMM yyyy',
        selectedDates: [new Date()],
        locale:localeEs,
        autoClose: true,  
        onSelect: function(formattedDate, tanggal, inst) {
            jperiod=formattedDate.tanggal.getFullYear()+("0" + (formattedDate.tanggal.getMonth() + 1)).slice(-2);
            },
    });

    $(document).ready(function() {
        getAudit();
        getAuditor(); 
        getUnitUsaha();
        getSOP();
    });

    function searchAudit() {
        getAudit();
    }

    function getAudit() {
        const selectedAuditor = $('#auditorfil').val();
        const selectedUnitUsaha = $('#unitusahafil').val();
        const selectedPeriode = $('#magicper').val();
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            SOPAudit: "getData",
            auditor: selectedAuditor,
            unitusaha: selectedUnitUsaha,
            periode:selectedPeriode,
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
                        <td>${row.NoTrans}</td>
                        <td>${row.NamaSOP}</td>
                        <td>${row.NamaUnitUsaha}</td>
                        <td>${row.TglSPK}</td>
                        <td>${row.Auditor}</td>
                        <td>${row.JenisAuditDetail}</td>  
                        <td>
                            <a href="sop-audit-detail.php?NoTrans=${row.NoTrans}" 
                                class="btn btn-outline-secondary btn-sm me-1">
                                <i class="fas fa-list"></i> Detail
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="editData(
                                        '${row.NoTrans}',
                                        '${row.NoSOP}',
                                        '${row.JenisAudit}',
                                        '${row.TglSPK}',
                                        '${row.TglAudit}',
                                        '${row.Auditor}',
                                        '${row.UnitUsaha}'
                                        );" 
                                class="btn btn-warning btn-sm me-1">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData('${row.NoTrans}');" 
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
        getAudit();
    }

    function getAuditor() {
        $.post("data/get_data.php",{
            masterData:"getAuditor"
        },function (allData) {
            $("#auditor").html(allData);
            $("#auditorfil").html(allData);
        });
    }

    function getSOP() {
        $.post("data/get_data.php",{
            masterData:"getSOP"
        },function (allData) {
            $("#nosop").html(allData);
        });
    }

    function getUnitUsaha() {
        $.post("data/get_data.php",{
            masterData:"getUnitUsaha"
        },function (allData) {
            $("#unitusaha").html(allData);
            $("#unitusahafil").html(allData);
        });
    }

    function tambahData(nosop,namasop) {
        $("#alert").hide();
        $("#notrans").val('AUTO');
        $("#nosop").val('');
        $("#jenisaudit").val('RUTIN');
        $("#tanggal").val(null);
        $("#tglaudit").val(null);        
        $("#auditor").val('');
        $("#unitusaha").val('');
        $("#myModal").modal('show');
        $("#buttonLabel").html("Save");
    }

    function editData(notrans,nosop,jenisaudit,tglspk,tglaudit,auditor,unitusaha) {
        $("#alert").hide();
        $("#notrans").val(notrans);
        $("#nosop").val(nosop);
        $("#jenisaudit").val(jenisaudit);
        $("#tanggal").val(tglspk);
        $("#tglaudit").val(tglaudit);  
        $("#auditor").val(auditor);
        $("#unitusaha").val(unitusaha);     
        $("#myModal").modal('show');
        $("#buttonLabel").html("Save");
    }

    $("form#crudAppForm").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notrans").val();
        var nosop = $("#nosop").val();
        var jenisaudit = $('#jenisaudit').val();
        var unitusaha = $('#unitusaha').val();
        var tanggal = $('#tanggal').val();
        var auditor = $("#auditor").val();
        var tglaudit = $("#tglaudit").val();
        var tglselesaibaa = null;
        var tglpresentasi = null;

        $("#alert").hide();
        $("#buttonLabel").html("Saving...");

        if (tglaudit !== "" && tglaudit < tanggal) {
            $("#alert_audit").text("Tanggal Audit lebih besar daripada tanggal SPK!");
            $("#alert_audit").show();
            $("#tglaudit").focus();           
        } else {
            $.post("data/get_data.php", {
                SOPAudit: "saveData",
                notrans: notrans,
                nosop: nosop,
                unitusaha: unitusaha,
                jenisaudit: jenisaudit,
                tanggal: tanggal,
                auditor: auditor,
                tglaudit: tglaudit,
                tglselesaibaa: tglselesaibaa,
                tglpresentasi: tglpresentasi
            }, function (response) {
                if (response == "saved") {
                    $("#buttonLabel").html("Save");
                    $("#alert").hide();
                    $("#myModal").modal('hide');
                    $("form#crudAppForm")[0].reset();
                    getAudit();
                } 
                else if (response == "sudahaudit") { 
                    $("#alert").text("SOP ini sudah dipakai dan ada di periode yang sama, tidak bisa save!");
                    $("#alert").show();
                    $("#buttonLabel").html("Save");
                }
                else if (response == "bedaPeriode") {
                    $("#alert").text("Tidak bisa ganti periode bulan atau tahun!");
                    $("#alert").show();
                    $("#buttonLabel").html("Save");
                } 
                else if (response == "unitusaha") {
                    $("#alert").text("Unit Usaha ini (" + unitusaha + ") belum ada untuk SOP ini (" + nosop + ") di SOP Master, silahkan input dahulu!");
                    $("#alert").show();
                    $("#buttonLabel").html("Save");
                }             
            });
        }
    });

    function deleteData(notrans) {
        $("#notransdelete").val(notrans);
        $("#katdelete").val("Auditor Sakit / Berhalangan");
        $("#keterangan").val("");    
        $("#alert_del").hide();
        $("#del_data").show();
        $("#submitDel").show();
        $("#myModalDelete").modal('show');
        $("#buttonDel").html("Delete");
    }

    $("form#delForm").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notransdelete").val();
        var katdelete = $("#katdelete").val();
        var keterangan = $('#keterangan').val();

        $("#buttonDel").html("Deleting...");

        $.post("data/get_data.php", {
            SOPAudit: "deleteData",
            katdelete: katdelete,
            keterangan: keterangan,
            notrans: notrans
        }, function (response) {
            if (response == "deleted") {
                $("#buttonDel").html("Delete");
                $("#myModalDelete").modal('hide');
                $("form#delForm")[0].reset();
                getAudit();
            } else if (response == "adaBAPT") {
                $("#alert_del").text("Tidak bisa hapus audit " + notrans + " ini, sudah ada BAPT");
                $("#del_data").hide();
                $("#alert_del").show();
                $("#DelBtn").hide();
            }
        });
    });

    // function generateData() {

    // }

</script>

<?php 
    include 'template/footer.php';
?>

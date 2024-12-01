<?php 
    include 'template/header.php'; 

    $NoSOP = isset($_GET['NoSOP']) ? $_GET['NoSOP'] : null;
    echo "<script>const NoSOP = '$NoSOP';</script>";
?>

<div class="container ">
    <h3 class="text-center">SOP MASTER DETAIL</h3>
</div>

<div class = "ms-3 me-3 mt-5">
    <div class="row">
        <div class="col-lg-2">
            No SOP
        </div>
        <div class="col-lg-4">
            <div id="h_no_sop"></div>
        </div>
        <div class="col-lg-2">
            Jumlah Audit
        </div>
        <div class="col-lg-4">
            <div id="h_jumlah_audit"></div>
        </div>
        <div class="col-lg-2">
            Nama SOP
        </div>
        <div class="col-lg-4">
            <div id="h_nama_sop"></div>
        </div>
        <div class="col-lg-2">
            Jumlah Audit Selesai
        </div>
        <div class="col-lg-4">
            <div id="h_audit_selesai"></div>
        </div>
        <div class="col-lg-2">
            Kategori SOP
        </div>
        <div class="col-lg-4">
            <div id="h_kat_sop"></div>
        </div>
        <div class="col-lg-2">
            Jumlah Audit Berjalan
        </div>
        <div class="col-lg-4">
            <div id="h_audit_berjalan"></div>
        </div>
        <div class="col-lg-2">
            Jumlah DAS
        </div>
        <div class="col-lg-4">
            <div id="h_jumlah_das"></div>
        </div>
        <div class="col-lg-2">
            Jumlah Audit Batal
        </div>
        <div class="col-lg-4">
            <div id="h_audit_batal"></div>
        </div>
    </div>
</div>

<div class="ms-3 me-3 mt-3">
    <a href="javaScript:void(0);" 
        onclick="tambahData(NoSOP, $('#h_nama_sop').text().replace(': ', ''))" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th>Unit Usaha</th>
                    <th>Jenis Audit SOP</th>
                    <th>Hari</th>
                    <th>Bulan</th>
                    <th>Tgl Berlaku Awal</th>
                    <th>Tgl Berlaku Akhir</th>
                    <th>Jml Audit</th>
                    <th>Jml Audit Selesai</th>
                    <th>Jml Audit Berjalan</th>
                    <th>Jml Audit Batal</th>
                    <th>Terakhir Audit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="sopLifetime" class=""></tbody>
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

    <div class= 'text-center'>
        <a type="button" class="btn btn-secondary btn-sm" href="sop-master.php">Kembali</a>
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
                    <input type="hidden" name="etglawal" id="etglawal" value="" />
                    <input type="hidden" name="eunitusaha" id="eunitusaha" value="" />
                    <div class="row mb-3">
                        <label for="nosop" class="col-sm-2 col-form-label col-form-label-sm">SOP</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" id="nosop" name="nosop" disabled>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="namasop" name="namasop" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategorisop" class="col-sm-2 col-form-label col-form-label-sm">Jenis Audit</label>
                        <div class="col-sm-10">
                            <select name ="kategorisop" id="kategorisop" class="form-control form-control-sm" required>
                                <option value="AUDIT">AUDIT</option>
                                <option value="TIDAK AUDIT">TIDAK AUDIT</option>
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
                        <label for="leadtime" class="col-sm-2 col-form-label col-form-label-sm">Lead Time</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control form-control-sm" id="leadtime" name="leadtime" required min="0" max="360">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglawal" class="col-sm-2 col-form-label col-form-label-sm">Tgl Berlaku Awal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="tglawal" name="tglawal" required>
                        </div>
                        <div id="periodeawal" class="text-danger" ></div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglakhir" class="col-sm-2 col-form-label col-form-label-sm">Tgl Berlaku Akhir</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="tglakhir" name="tglakhir">
                        </div>
                    </div>
                    <div class="row mb-3" id = "formketerangan">
                        <label for="keterangan" class="col-sm-2 col-form-label col-form-label-sm">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="keterangan" name="keterangan">
                        </div>
                        <div id="kurket" class="text-danger" ></div>
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
                    <input type="hidden" name="del_unitusaha" id="del_unitusaha" value="" />
                    <input type="hidden" name="del_tglawal" id="del_tglawal" value="" />
                    <input type="hidden" name="del_jumlahaudit" id="del_jumlahaudit" value="" />
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
        getJumlahAudit();
        getSOPLifetime(); 
        getUnitUsaha();
        keterangan();

        $('#rowsPerPageSelect').change(function() {
            currentPage = 1;
            rowsPerPage = $('#rowsPerPageSelect').val();
            getSOPLifetime();
        });
    });

    function getUnitUsaha() {
        $.post("data/get_data.php",{
            masterData:"getUnitUsaha"
        },function (allData) {
            $("#unitusaha").html(allData);
        });
    }

    function getJumlahAudit() {
    $.post("data/get_data.php", { SOPDetail: "getJumlahAudit", NoSOP })
        .done((response) => {
            if (response?.data) {
                $("#h_no_sop").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.NoSOP,''));
                $("#h_nama_sop").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.NamaSOP,''));
                $("#h_kat_sop").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.KategoriSOP,''));
                $("#h_jumlah_das").empty().html(
                    response.data.reduce((acc, row) => {
                        return acc + ': ' + row.DAS + ` <a href="sop-das.php?NoSOP=${row.NoSOP}&NamaSOP=${row.NamaSOP}"> <i class="fas fa-external-link-alt"></i></a><br>`;
                    }, '')
                );
                $("#h_jumlah_audit").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.JumlahAudit,''));
                $("#h_audit_selesai").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.JumlahAuditSelesai,''));
                $("#h_audit_berjalan").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.JumlahAuditBerjalan,''));
                $("#h_audit_batal").empty().text(response.data.reduce((acc, row) => acc + ': ' + row.JumlahAuditBatal,''));
            }
        });
    }

    function getSOPLifetime() {
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            SOPDetail: "getData",
            NoSOP: NoSOP,
            page: currentPage,
            rowsPerPage: rowsPerPageSelect
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#sopLifetime").empty();
                
                response.data.forEach((row, index) => {
                    const tableRow = `<tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.NamaUnitUsaha}</td>
                        <td>${row.JenisAuditSOP}</td>
                        <td>${row.Hari}</td>
                        <td>${row.Bulan}</td>
                        <td>${row.TglBerlakuAwal}</td>
                        <td>${row.TglBerlakuAkhir}</td>
                        <td>${row.JumlahAudit}</td>
                        <td>${row.JumlahAuditSelesai}</td>
                        <td>${row.JumlahAuditBerjalan}</td>
                        <td>${row.JumlahAuditBatal}</td>
                        <td>${row.LastAudit}</td>
                        <td>
                            <a href="javascript:void(0)" 
                                onclick="editData(
                                    '${row.NoSOP}',
                                    '${row.NamaSOP}',
                                    '${row.JenisAuditSOP}',
                                    '${row.UnitUsaha}',
                                    '${row.Hari}',
                                    '${row.TglBerlakuAwal}',
                                    '${row.TglBerlakuAkhir}',
                                    '${row.Keterangan}');" 
                                class="btn btn-warning btn-sm me-1">
                                <i class="far fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData(
                                    '${row.NoSOP}',
                                    '${row.UnitUsaha}',
                                    '${row.TglBerlakuAwal}',
                                    '${row.JumlahAudit}');" 
                                class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i> Delete 
                            </a>
                        </td>
                    </tr>`;
                    $("#sopLifetime").append(tableRow);
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
        getSOPLifetime();
    }

    function tambahData(nosop,namasop) {
        keterangan();

        $('#nosop').prop('disabled', true);

        $("#etglawal").val(null);
        $("#nosop").val(nosop);
        $("#namasop").val(namasop);
        $("#kategorisop").val('');
        $("#keterangan").val('');
        $("#unitusaha").val('');
        $("#leadtime").val(0);
        $("#tglawal").val(null);
        $("#tglakhir").val(null);
        $("#myModal").modal('show');
        $("#buttonLabel").html("Save");

        $("#kurket").hide();
        $("#periodeawal").hide();
    }

    function editData(nosop,namasop,kategorisop,unitusaha,leadtime,tglawal,tglakhir,ket) {
        keterangan();

        $("#eunitusaha").val(unitusaha);
        $("#etglawal").val(tglawal);
        $("#nosop").val(nosop);
        $("#namasop").val(namasop);
        $("#kategorisop").val(kategorisop);
        $("#keterangan").val(ket);
        $("#unitusaha").val(unitusaha);
        $("#leadtime").val(leadtime);
        $("#tglawal").val(tglawal);
        $("#tglakhir").val(tglakhir);       
        $("#myModal").modal('show');
        $("#buttonLabel").html("Save");

        $("#kurket").hide();
        $("#periodeawal").hide();
    }

    function keterangan() {
        if ($("#kategorisop").val() === "TIDAK AUDIT") {
            $('#formketerangan').show();
            $('#keterangan').val("");
        } else {
            $('#formketerangan').hide();
        }
    }

    $('#kategorisop').change(function() {
        if ($("#kategorisop").val() === "TIDAK AUDIT") {
            $('#formketerangan').show();
            $('#keterangan').val("");
        } else {
            $('#formketerangan').hide();
        }
    });

    $("form#crudAppForm").on("submit", function (e) {
        e.preventDefault();
        
        var eunitusaha = $("#eunitusaha").val();
        var etglawal = $("#etglawal").val();
        var nosop = $("#nosop").val();
        var namasop = $("#namasop").val();
        var jenisaudit = $('#kategorisop').val();
        var unitusaha = $('#unitusaha').val();
        var leadtime = $('#leadtime').val();
        var tglawal = $("#tglawal").val();
        var tglakhir = $("#tglakhir").val();
        var ket = $('#keterangan').val();

        if (jenisaudit == "TIDAK AUDIT" && ket == "")
        {
            $("#kurket").text("Tidak Audit harus ada keterangan!");
            $("#kurket").show();
            $("#keterangan").focus();
            $("#buttonLabel").html("Save");
        } else {
            $("#kurket").hide();
            $("#periodeawal").hide();
            $("#buttonLabel").html("Saving...");

            $.post("data/get_data.php", {
                SOPDetail: "saveData",
                etglawal: etglawal,
                eunitusaha: eunitusaha,
                nosop: nosop,
                namasop: namasop,
                jenisaudit: jenisaudit,
                unitusaha: unitusaha,
                leadtime: leadtime,
                tglawal: tglawal,
                tglakhir: tglakhir,
                ket:ket
            }, function (response) {
                if (response == "saved") {
                    $("#buttonLabel").html("Save");
                    $("#periodeawal").hide();
                    $("#kurket").hide();
                    $("#myModal").modal('hide');
                    $("form#crudAppForm")[0].reset();
                    getSOPLifetime();
                } 
                else if (response == "periodeDiantara") { 
                    $("#periodeawal").text("Data ini sudah dipakai dan ada di tengah periode lain, tidak bisa save!");
                    $("#periodeawal").show();
                    $("#buttonLabel").html("Save");
                }
            });
        }
    });

    function deleteData(nosop, unitusaha, tglawal, jumlahaudit) {
        if(confirm("Yakin hapus SOP Detail ini " + nosop + " " + unitusaha + " pada " + tglawal + "?")){
            $.post("data/get_data.php",{
                SOPDetail:"deleteData",
                nosop: nosop,
                unitusaha: unitusaha,
                tglawal: tglawal
            },function (response) {
                if (response == "deleted") {
                    getSOPLifetime();
                } else {
                    alert("Gagal Hapus, sudah dipakai Audit");
                }
            });
        }
    }

    function deleteData(nosop, unitusaha, tglawal, jumlahaudit) {
        $("#del_nosop").val(nosop);
        $("#del_unitusaha").val(unitusaha);
        $("#del_tglawal").val(tglawal);
        $("#del_jumlahaudit").val(jumlahaudit);
        $("#alert_del").text("Hapus SOP " + nosop + ", "  + unitusaha + ", " + tglawal + " ini?");
        $("#submitDel").show();
        $("#modalDelete").modal('show');
        $("#buttonDelete").html("Delete");
    }

    $("form#del_form").on("submit", function (e) {
        e.preventDefault();
        
        var nosop = $("#del_nosop").val();
        var unitusaha = $("#del_unitusaha").val();
        var tglawal = $("#del_tglawal").val();
        var jumlahaudit = $("#del_jumlahaudit").val();

        $("#buttonDel").html("Deleting...");
        

        if (jumlahaudit != 0) {
            $("#alert_del").text("Tidak bisa hapus " + nosop + ", "  + unitusaha + ", " + tglawal + ", sudah dipakai Audit");
            $("#buttonDel").html("Delete");
            $("#submitDel").hide();
            getSOPMaster();
        } else {
            $.post("data/get_data.php", {
                SOPDetail:"deleteData",
                nosop: nosop,
                unitusaha: unitusaha,
                tglawal: tglawal
            }, function (response) {
                if (response == "deleted") {
                    $("#buttonDel").html("Delete");
                    $("#modalDelete").modal('hide');
                    getSOPMaster();
                } 
            });
        }

    });

</script>

<?php 
    include 'template/footer.php';
?>

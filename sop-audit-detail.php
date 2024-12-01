<?php 
    include 'template/header.php'; 

    $NoTrans = isset($_GET['NoTrans']) ? $_GET['NoTrans'] : null;
    echo "<script>const NoTrans = '$NoTrans';</script>";
?>

<div class="container ">
    <h3 class="text-center">SOP AUDIT DETAIL</h3>
    <h5 class="text-center"><?php echo $NoTrans; ?></h5>
</div>

<div class = "ms-3 me-3 mt-2" id="audit_head">
    <form id="audit_form">
        <div class="row mb-3">
            <input type="hidden" id="notrans" name="notrans" value="<?php echo $NoTrans; ?>">
        </div>
        <div class="row mb-3">
            <label for="nosop" class="col-sm-1 col-form-label col-form-label-sm">SOP</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-4">
                <select name ="nosop" id="nosop" class="form-control form-control-sm" required>
                    <div id ="nosop"></div>
                </select>
            </div>
            <label for="unitusaha" class="col-sm-1 col-form-label col-form-label-sm">Unit Usaha</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-4">
                <select name ="unitusaha" id="unitusaha" class="form-control form-control-sm" required>
                    <div id ="unitusaha"></div>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nospk" class="col-sm-1 col-form-label col-form-label-sm">No SPK</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <a href="javaScript:void(0);" 
                    onclick="dataSPK()" 
                    data-bs-toggle="modal" 
                    id ="nospk"
                    class="btn btn-outline-primary form-control form-control-sm btn-sm">No SPK
                </a>
            </div>
            <div class="col-sm-2"></div>
            <label for="tglaudit" class="col-sm-1 col-form-label col-form-label-sm">Tgl Audit</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" id="tglaudit" name="tglaudit">
            </div>
        </div>
        <div class="row mb-3">
            <label for="tanggal" class="col-sm-1 col-form-label col-form-label-sm">Tgl SPK</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required>
            </div>
            <div class="col-sm-2"></div>
            <label for="nobaa" class="col-sm-1 col-form-label col-form-label-sm">No BAA</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control form-control-sm" id="nobaa" name="nobaa" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="auditor" class="col-sm-1 col-form-label col-form-label-sm">Auditor</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-4">
                <select name ="auditor" id="auditor" class="form-control form-control-sm" required>
                    <div id ="auditor"></div>
                </select>
            </div>
            <label for="tglselesaibaa" class="col-sm-1 col-form-label col-form-label-sm">Selesai BAA</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" id="tglselesaibaa" name="tglselesaibaa">
            </div>
        </div>
        <div class="row mb-3">
            <label for="jenisaudit" class="col-sm-1 col-form-label col-form-label-sm">Jenis Audit</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-4">
                <select name ="jenisaudit" id="jenisaudit" class="form-control form-control-sm" required>
                    <option value="RUTIN">Control Rutin</option>
                    <option value="CPL">Control Paket Lengkap</option>
                    <option value="CS">Control Sekilas</option>
                    <option value="PTIC">PTIC</option>
                </select>
            </div>
            <label for="tglpresentasi" class="col-sm-1 col-form-label col-form-label-sm">Tgl Presentasi</label>
            <label class="col-sm-1 col-form-label col-form-label-sm text-end">:</label>
            <div class="col-sm-2">
                <input type="date" class="form-control form-control-sm" id="tglpresentasi" name="tglpresentasi">
            </div>
        </div>
        <div class="row mb-3">
            <div class="alert alert-warning" role="alert" id="alert_audit"></div>
        </div>
        <div class= "text-center" id="save_audit">
            <button 
                type="button" 
                class="btn btn-outline-secondary btn-sm" 
                onclick="inactiveSOP()">Batal
            </button>
            <button 
                type="submit" 
                name="submitBtnSOP" 
                id="submitBtnSOP" 
                class="btn btn-primary btn-sm">
                <span id="buttonLabel"> Simpan</span>
            </button>
        </div>
    </form>
</div>

<div class= "text-center" id="editsop">
    <button 
        type="button" 
        class="btn btn-outline-secondary btn-sm"
        onclick="activeSOP()">
        <i class="far fa-edit"></i> Edit
    </button>
</div>

<ul class="nav nav-tabs mt-3">
    <li class="nav-item">
        <a class="nav-link active" 
            id="temuanclick"
            aria-current="page" 
            href="javaScript:void(0);"  
            onclick="setTemuan()">Temuan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"
            id="baptclick" 
            href="javaScript:void(0);"  
            onclick="setBAPT()">BAPT
        </a>
    </li>
</ul>

<div class="ms-3 me-3 mt-3" id="Temuan">
    <a href="javaScript:void(0);" 
        onclick="tambahDataTemuan()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th class="col-lg-2">DAS</th>
                    <th>Kategori Temuan</th>
                    <th class="col-lg-3">Temuan</th>
                    <th class="col-lg-3">Resiko</th>
                    <th class="col-lg-3">Saran</th>
                    <th>Status Temuan</th>
                    <th class="col-lg-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="auditDetail" class=""></tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="form-group">
            <select id="rowsPerPageSelect" class="form-select form-select-sm" style="width: auto;">
                <option value="5">5</option>
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

<div class="ms-3 me-3 mt-3" id="BAPT">
    <a href="javaScript:void(0);" 
        onclick="tambahDataBAPT()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th class="col-lg-3">Temuan</th>
                    <th class="col-lg-3">BAPT</th>
                    <th>PIC BAPT</th>
                    <th>Est Selesai</th>
                    <th>Tgl Selesai</th>
                    <th>Last Followup</th>
                    <th>Jml Followup</th>
                    <th class="col-lg-3">Ket Followup</th>
                    <th class="col-lg-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="auditDetailBAPT" class=""></tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="form-group">
            <select id="rowsPerPageSelectBAPT" class="form-select form-select-sm" style="width: auto;">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <nav>
            <ul class="pagination mb-0 pagination-sm" id="paginationControlsBAPT">
            </ul>
        </nav>
    </div>
</div>

<div class= 'text-center'>
    <a type="button" class="btn btn-secondary btn-sm" href="sop-audit.php">Kembali</a>
</div>

<div class="modal fade" id="modalSPK" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">SPK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="spk_form">
                    <div class="row mb-3">
                        <label for="m_nospk" class="col-sm-2 col-form-label col-form-label-sm">No SPK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="m_nospk" name="m_nospk" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_waktumulai" class="col-sm-2 col-form-label col-form-label-sm">Tgl Mulai</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="m_waktumulai" name="m_waktumulai" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_waktumulai_2" class="col-sm-2 col-form-label col-form-label-sm">Tgl Mulai 2</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="m_waktumulai_2" name="m_waktumulai_2">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_waktumulai_3" class="col-sm-2 col-form-label col-form-label-sm">Tgl Mulai 3</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="m_waktumulai_3" name="m_waktumulai_3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_bahanaudit" class="col-sm-2 col-form-label col-form-label-sm">Bahan Audit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="m_bahanaudit" name="m_bahanaudit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_pic" class="col-sm-2 col-form-label col-form-label-sm">PIC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="m_pic" name="m_pic" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="m_manager" class="col-sm-2 col-form-label col-form-label-sm">Manager</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="m_manager" name="m_manager" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-warning" role="alert" id="alert_spk"></div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitSPK" id="submitSPK" class="btn btn-primary btn-sm"><span id="buttonSPK"> Simpan</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTemuan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Temuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="temuan_form">
                    <input type="hidden" name="nomor_temuan" id="nomor_temuan" value="" />
                    <div class="row mb-3">
                        <label for="das_temuan" class="col-sm-2 col-form-label col-form-label-sm">DAS</label>
                        <div class="col-sm-10">
                            <select name ="das_temuan" id="das_temuan" class="form-control form-control-sm" required>
                                <div id ="das_temuan"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kat_temuan" class="col-sm-2 col-form-label col-form-label-sm">Kategori Temuan</label>
                        <div class="col-sm-10">
                            <select name ="kat_temuan" id="kat_temuan" class="form-control form-control-sm" required>
                                <option value="SDM">SDM</option>
                                <option value="SOP">SOP</option>
                                <option value="Sistem">Sistem</option>
                                <option value="Pemutihan atau Beban Karyawan">Pemutihan atau Beban Karyawan</option>
                                <option value="Hasil">Hasil</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="temuan_temuan" class="col-sm-2 col-form-label col-form-label-sm">Temuan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="temuan_temuan" name="temuan_temuan" val="" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="resiko_temuan" class="col-sm-2 col-form-label col-form-label-sm">Resiko</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="resiko_temuan" name="resiko_temuan" val=""></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="saran_temuan" class="col-sm-2 col-form-label col-form-label-sm">Saran</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="saran_temuan" name="saran_temuan" val=""></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status_temuan" class="col-sm-2 col-form-label col-form-label-sm">Status Temuan</label>
                        <div class="col-sm-10">
                            <select name ="status_temuan" id="status_temuan" class="form-control form-control-sm" val="">
                                <option value=""></option>
                                <option value="BAPT">BAPT</option>
                                <option value="INFORMASI">INFORMASI</option>
                                <option value="PEMUTIHAN">PEMUTIHAN</option>
                                <option value="BATAL">BATAL</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ket_temuan" class="col-sm-2 col-form-label col-form-label-sm">Keterangan Status Temuan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="ket_temuan" name="ket_temuan" val=""></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-warning" role="alert" id="alert_Temuan"></div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitTemuan" id="submitTemuan" class="btn btn-primary btn-sm"><span id="buttonTemuan"> Simpan</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBAPT" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">BAPT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bapt_form">
                    <input type="hidden" name="nomor_bapt" id="nomor_bapt" value="" />
                    <div class="row mb-3">
                        <label for="temuan_bapt" class="col-sm-2 col-form-label col-form-label-sm">Temuan</label>
                        <div class="col-sm-10">
                            <select name ="temuan_bapt" id="temuan_bapt" class="form-control form-control-sm" required>
                                <div id ="temuan_bapt"></div>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="bapt_bapt" class="col-sm-2 col-form-label col-form-label-sm">BAPT</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="bapt_bapt" name="bapt_bapt" val="" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pic_bapt" class="col-sm-2 col-form-label col-form-label-sm">PIC BAPT</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="pic_bapt" name="pic_bapt" val=""></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="est_bapt" class="col-sm-2 col-form-label col-form-label-sm">Est Selesai</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="est_bapt" name="est_bapt" required>
                        </div>
                        <label for="selesai_bapt" class="col-sm-2 col-form-label col-form-label-sm">Tgl Selesai</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control form-control-sm" id="selesai_bapt" name="selesai_bapt">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-warning" role="alert" id="alert_bapt"></div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitBAPT" id="submitBAPT" class="btn btn-primary btn-sm"><span id="buttonBAPT"> Simpan</span></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="del_form">
                    <input type="hidden" name="jenis_hapus" id="jenis_hapus" value="" />
                    <input type="hidden" name="nomor_hapus" id="nomor_hapus" value="" />
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
    let rowsPerPage = 5; 

    async function loadData() {
        await getSOP();
        await getUnitUsaha();
        await getAuditor();
        await getDAS();
        await getTemuan();
        await getSOPControl();
        await inactiveSOP();
        await setTemuan();
    }

    $(document).ready(function() {
        loadData();
        $('#rowsPerPageSelect').change(function() {
            currentPage = 1;
            rowsPerPage = $('#rowsPerPageSelect').val();
            getAuditDetail();
        });
    });

    function getSOP() {
        $.post("data/get_data.php",{
            masterData:"getSOP"
        },function (allData) {
            $("#nosop").html(allData);
        });
    }

    function getAuditor() {
        $.post("data/get_data.php",{
            masterData:"getAuditor"
        },function (allData) {
            $("#auditor").html(allData);
        });
    }

    function getUnitUsaha() {
        $.post("data/get_data.php",{
            masterData:"getUnitUsaha"
        },function (allData) {
            $("#unitusaha").html(allData);
        });
    }

    function inactiveSOP() {
        document.getElementById("editsop").style.display = "block";
        document.getElementById("save_audit").style.display = "none";

        document.getElementById("nosop").disabled = true;
        document.getElementById("unitusaha").disabled = true;
        document.getElementById("tanggal").disabled = true;
        document.getElementById("auditor").disabled = true;
        document.getElementById("jenisaudit").disabled = true;
        document.getElementById("tglaudit").disabled = true;
        document.getElementById("tglselesaibaa").disabled = true;
        document.getElementById("tglpresentasi").disabled = true;
        document.getElementById("nospk").disabled = true;

        $("#alert_audit").hide();

        getSOPControl();
    }

    function activeSOP() {
        document.getElementById("save_audit").style.display = "block";
        document.getElementById("editsop").style.display = "none";

        document.getElementById("nosop").disabled = false;
        document.getElementById("unitusaha").disabled = false;
        document.getElementById("tanggal").disabled = false;
        document.getElementById("auditor").disabled = false;
        document.getElementById("jenisaudit").disabled = false;
        document.getElementById("tglaudit").disabled = false;
        document.getElementById("tglselesaibaa").disabled = false;
        document.getElementById("tglpresentasi").disabled = false;
        document.getElementById("nospk").disabled = false;

        getSOPControl();
    }

    function setTemuan() {
        document.getElementById("Temuan").style.display = "block";
        document.getElementById("BAPT").style.display = "none";

        document.getElementById("temuanclick").classList.add("active");
        document.getElementById("baptclick").classList.remove("active");

        getAuditDetail();
    }

    function setBAPT() {
        document.getElementById("Temuan").style.display = "none";
        document.getElementById("BAPT").style.display = "block";

        document.getElementById("temuanclick").classList.remove("active");
        document.getElementById("baptclick").classList.add("active");

        getAuditBAPT();
    }

    function getSOPControl() {
        $.post("data/get_data.php", { AuditDetail: "getSOPControl", NoTrans })
        .done((response) => {
            if (response?.data) {
                response.data.forEach(row => {
                    $("#nosop").val(row.NoSOP); 
                    $("#tanggal").val(row.TglSPK); 
                    $('#unitusaha').val(row.UnitUsaha);
                    if (row.NoSPK != "") {
                        $("#nospk").text(row.NoSPK); 
                    }
                    $("#tanggal").val(row.TglSPK); 
                    $("#auditor").val(row.Auditor); 
                    $("#jenisaudit").val(row.JenisAudit); 
                    $("#tglaudit").val(row.TglAudit); 
                    $("#nobaa").val(row.NoBAA); 
                    $("#tglselesaibaa").val(row.TglSelesaiBAA); 
                    $("#tglpresentasi").val(row.TglPresentasi); 

                    $("#m_waktumulai").val(row.WaktuMulai); 
                    $("#m_waktumulai_2").val(row.WaktuMulai2); 
                    $("#m_waktumulai_3").val(row.WaktuMulai3);
                    $("#m_bahanaudit").val(row.BahanAudit);
                    $("#m_pic").val(row.PIC);
                    $("#m_manager").val(row.Manager);
                });
            }
        });
    }

    function getAuditDetail() {
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            AuditDetail: "getData",
            notrans: NoTrans,
            page: currentPage,
            rowsPerPage: rowsPerPageSelect
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#auditDetail").empty();
                
                response.data.forEach((row, index) => {
                    const tableRow = `<tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.DAS}</td>
                        <td>${row.KategoriTemuan}</td>
                        <td>${row.Temuan}</td>
                        <td>${row.Resiko}</td>
                        <td>${row.SaranIC}</td>
                        <td>${row.StatusTB}</td>
                        <td>
                            <a href="javascript:void(0)" 
                                onclick="editDataTemuan(
                                    '${row.NoUrut}',
                                    '${row.nomorDAS}',
                                    '${row.KategoriTemuan}',
                                    '${row.Temuan}',
                                    '${row.Resiko}',
                                    '${row.SaranIC}',
                                    '${row.StatusTB}',
                                    '${row.Keterangan}'
                                    );" 
                                class="btn btn-warning btn-sm me-1">Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData(
                                    'temuan',
                                    '${row.NoUrut}');" 
                                class="btn btn-danger btn-sm">Delete
                            </a>
                        </td>
                    </tr>`;
                    $("#auditDetail").append(tableRow);
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
        getAuditDetail();
    }

    function getAuditBAPT() {
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            AuditDetail: "getDataBAPT",
            notrans: NoTrans,
            page: currentPage,
            rowsPerPage: rowsPerPageSelect
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#auditDetailBAPT").empty();

                response.data.forEach((row, index) => {
                    const tableRow = `<tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.Temuan}</td>
                        <td>${row.BAPT}</td>
                        <td>${row.PICBAPT}</td>
                        <td>${row.EstTglSelesai}</td>
                        <td>${row.TglSelesai}</td>
                        <td>${row.LastFU}</td>
                        <td>${row.JumlahFU}</td>
                        <td>${row.Keterangan}</td>
                        <td>
                            <a href="sop-bapt-fu.php?NoTrans=${row.NoTrans}&Nomor=${row.Nomor}" 
                                class="btn btn-outline-secondary btn-sm me-1">
                                <i class="fas fa-list"></i> Detail
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="editDataBAPT(
                                    '${row.Nomor}',
                                    '${row.NoTemuan}',
                                    '${row.BAPT}',
                                    '${row.PICBAPT}',
                                    '${row.EstTglSelesai}',
                                    '${row.TglSelesai}'
                                    );" 
                                class="btn btn-warning btn-sm me-1">Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData(
                                    'BAPT',
                                    '${row.Nomor}');" 
                                class="btn btn-danger btn-sm">Delete
                            </a>
                        </td>
                    </tr>`;
                    $("#auditDetailBAPT").append(tableRow);
                });
                updatePaginationBAPT(response.totalPages);
            } else {
                console.error("Unexpected response format:", response);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed:", textStatus, errorThrown);
        });
    }

    function updatePaginationBAPT(totalPages) {
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

        $("#paginationControlsBAPT").html(paginationHtml);
    }

    function changePageBAPT(page) {
        if (page < 1 || page > $("#paginationControlsBAPT li").length - 2) return;
        currentPage = page;
        getAuditBAPT();
    }

    function parseDate(dateString) {
        return new Date(dateString);
    }

    $("form#audit_form").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notrans").val();
        var nosop = $("#nosop").val();
        var jenisaudit = $('#jenisaudit').val();
        var unitusaha = $('#unitusaha').val();
        var tanggal = $('#tanggal').val();
        var auditor = $("#auditor").val();
        var tglaudit = $("#tglaudit").val();
        var tglselesaibaa = $("#tglselesaibaa").val();
        var tglpresentasi = $("#tglpresentasi").val();

        $("#alert_audit").hide();
        $("#buttonLabel").html("Saving...");

        if (tglaudit !== "" && tglaudit < tanggal) {
            $("#alert_audit").text("Tanggal Audit lebih besar daripada tanggal SPK!");
            $("#alert_audit").show();
            $("#tglaudit").focus();        
            $("#buttonLabel").html("Save");   
        } else if (tglselesaibaa !== "" && !tglaudit) {
            $("#alert_audit").text("Tanggal Audit belum ada!");
            $("#alert_audit").show();
            $("#tglaudit").focus();
            $("#buttonLabel").html("Save");
        } else if (tglselesaibaa !== "" && tglselesaibaa < tglaudit) {
            $("#alert_audit").text("Tanggal Selesai BAA lebih besar daripada tanggal audit!");
            $("#alert_audit").show();
            $("#tglselesaibaa").focus();
            $("#buttonLabel").html("Save");
        } else if (tglpresentasi !== "" && !tglselesaibaa) {
            $("#alert_audit").text("Tanggal selesai BAA belum ada!");
            $("#alert_audit").show();
            $("#tglselesaibaa").focus();
            $("#buttonLabel").html("Save");
        } else if (tglpresentasi !== ""  && !tglaudit) {
            $("#alert_audit").text("Tanggal Audit belum ada!");
            $("#alert_audit").show();
            $("#tglaudit").focus();
            $("#buttonLabel").html("Save");
        } else if (tglpresentasi !== "" && tglselesaibaa !== "" && tglpresentasi < tglselesaibaa) {
            $("#alert_audit").text("Tanggal selesai baa lebih besar daripada tanggal presentasi!");
            $("#alert_audit").show();
            $("#tglpresentasi").focus();
            $("#buttonLabel").html("Save");
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
                    $("#alert_audit").hide();
                    getSOPControl();
                    inactiveSOP();
                    getDAS();
                } else if (response == "sudahaudit") { 
                    $("#alert_audit").text("SOP ini sudah dipakai dan ada di periode yang sama, tidak bisa save!");
                    $("#nosop").focus();
                    $("#alert_audit").show();
                    $("#buttonLabel").html("Save");
                } else if (response == "bedaPeriode") {
                    $("#alert_audit").text("Tidak bisa ganti periode bulan atau tahun!");
                    $("#tanggal").focus();
                    $("#alert_audit").show();
                    $("#buttonLabel").html("Save");
                } else if (response == "unitusaha") {
                    $("#alert_audit").text("Unit Usaha ini (" + unitusaha + ") belum ada untuk SOP ini (" + nosop + ") di SOP Master, silahkan input dahulu!");
                    $("#unitusaha").focus();
                    $("#alert_audit").show();
                    $("#buttonLabel").html("Save");
                }             
            });
        }
    });

    function dataSPK() {
        var nospk = $("#nospk").text();
        getSOPControl();

        $("#m_nospk").val(nospk); 
        $("#alert_spk").hide();
        $("#modalSPK").modal('show');
        $("#buttonSPK").html("Save");
    }

    $("form#spk_form").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notrans").val();
        var nospk = $("#nospk").text();
        var tanggal = $("#tanggal").val();
        var mulai1 = $('#m_waktumulai').val();
        var mulai2 = $('#m_waktumulai_2').val();
        var mulai3 = $('#m_waktumulai_3').val();
        var auditor = $("#auditor").val();
        var bahanaudit = $("#m_bahanaudit").val();
        var pic = $("#m_pic").val();
        var manager = $("#m_manager").val();

        $("#alert_spk").hide();
        $("#buttonSPK").html("Saving...");
    
        if (mulai1 < tanggal) {
            $("#alert_spk").text("Tanggal Mulai ke 1 lebih besar daripada tanggal SPK!");
            $("#alert_spk").show();
            $("#m_waktumulai_1").focus();            
            $("#buttonSPK").html("Save");          
        } else if (mulai2 !== "" && mulai2 < mulai1){
            $("#alert_spk").text("Tanggal Mulai ke 2 lebih besar daripada tanggal mulai 1!");
            $("#alert_spk").show();
            $("#m_waktumulai_2").focus();            
            $("#buttonSPK").html("Save");
        } else if (mulai3 !== "" && !mulai2) {
            $("#alert_spk").text("Tanggal Mulai ke 2 masih kosong!");
            $("#alert_spk").show();
            $("#m_waktumulai_2").focus();
            $("#buttonSPK").html("Save");
        } else if (mulai3 !== "" && mulai3 < mulai2) {
            $("#alert_spk").text("Tanggal Mulai ke 3 lebih besar daripada tanggal mulai 2!");
            $("#alert_spk").show();
            $("#m_waktumulai_3").focus();
            $("#buttonSPK").html("Save");
        } else {
            $.post("data/get_data.php", {
                AuditDetail: "saveDataSPK",
                nospk: nospk,
                tanggal: tanggal,
                mulai1: mulai1,
                mulai2: mulai2,
                mulai3: mulai3,
                auditor: auditor,
                bahanaudit: bahanaudit,
                pic: pic,
                manager: manager,
                notrans: notrans
            }, function (response) {
                if (response == "saved") {
                    $("#buttonSPK").html("Save");
                    $("#alert_spk").hide();
                    $("#modalSPK").modal('hide');
                    getSOPControl();
                }
            });
        }
    });

    function getDAS() {
        var notrans = $("#notrans").val();

        $.post("data/get_data.php",{
            AuditDetail:"getDASTemuan",
            notrans: notrans
        },function (allData) {
            $("#das_temuan").html(allData);
        });
    }

    function tambahDataTemuan() {
        var tglaudit = $("#tglaudit").val();

        if (!tglaudit) {
            alert("Tgl Audit belum anda isi")
            $("#tglaudit").focus(); 
        } else {
            $("#nomor_temuan").val('');
            $("#temuan_temuan").val('');
            $("#resiko_temuan").val('');
            $("#saran_temuan").val('');
            $("#ket_temuan").val('');
            $("#alert_Temuan").hide();
            $("#modalTemuan").modal('show');
            $("#buttonTemuan").html("Save");
        }
    }

    function editDataTemuan(nomor_temuan, das_temuan, kat_temuan, temuan_temuan, resiko_temuan, saran_temuan, status_temuan, ket_temuan ) {
        $("#nomor_temuan").val(nomor_temuan);
        $("#das_temuan").val(das_temuan);
        $("#kat_temuan").val(kat_temuan);
        $("#temuan_temuan").val(temuan_temuan);
        $("#resiko_temuan").val(resiko_temuan);
        $("#saran_temuan").val(saran_temuan);
        $("#status_temuan").val(status_temuan);
        $("#ket_temuan").val(ket_temuan);
        $("#alert_Temuan").hide();
        $("#modalTemuan").modal('show');
        $("#buttonTemuan").html("Save");
    }
    
    $("form#temuan_form").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notrans").val();
        var nomor_temuan = $("#nomor_temuan").val();
        var kat_temuan = $("#kat_temuan").val();
        var temuan_temuan = $("#temuan_temuan").val();
        var resiko_temuan = $("#resiko_temuan").val();
        var saran_temuan = $("#saran_temuan").val();
        var status_temuan = $("#status_temuan").val();
        var das_temuan = $("#das_temuan").val();
        var ket_temuan = $("#ket_temuan").val();

        $("#buttonTemuan").html("Saving...");

        $.post("data/get_data.php", {
            AuditDetail: "saveDataTemuan",
            notrans: notrans,
            nomor_temuan: nomor_temuan,
            kat_temuan: kat_temuan,
            temuan_temuan: temuan_temuan,
            resiko_temuan: resiko_temuan,
            saran_temuan: saran_temuan,
            status_temuan: status_temuan,
            das_temuan: das_temuan,
            ket_temuan: ket_temuan
        }, function (response) {
            if (response == "saved") {
                $("#buttonTemuan").html("Save");
                $("#modalTemuan").modal('hide');
                getAuditDetail();
            } 
        });
    });

    function deleteData(jenis,nomor) {
        $("#jenis_hapus").val(jenis);
        $("#nomor_hapus").val(nomor);
        $("#alert_del").text("Hapus " + jenis + " ini?");
        $("#submitDel").show();
        $("#modalDelete").modal('show');
        $("#buttonDelete").html("Delete");
    }

    $("form#del_form").on("submit", function (e) {
        e.preventDefault();
        
        var jenis = $("#jenis_hapus").val();
        var nomor = $("#nomor_hapus").val();
        var notrans = $("#notrans").val();

        $("#buttonDel").html("Deleting...");
        
        $.post("data/get_data.php", {
            AuditDetail: "delData",
            jenis: jenis,
            nomor: nomor,
            notrans: notrans

        }, function (response) {
            if (jenis == "BAPT" && response == "deleted") {
                $("#buttonDel").html("Delete");
                $("#modalDelete").modal('hide');
                getAuditBAPT();
            } else if (jenis == "BAPT" && response == "adaFU") {
                $("#alert_del").text("Tidak bisa hapus " + jenis + " ini, sudah ada Follow UP");
                $("#buttonDel").html("Delete");
                $("#submitDel").hide();
                getAuditBAPT();
            } else if (jenis == "temuan" && response == "deleted") {
                $("#buttonDel").html("Delete");
                $("#modalDelete").modal('hide');
                getAuditDetail();
            } else if (jenis == "temuan" && response == "adaBAPT") {
                $("#alert_del").text("Tidak bisa hapus " + jenis + " ini, sudah ada BAPT");
                $("#buttonDel").html("Delete");
                $("#submitDel").hide();
                getAuditDetail();
            } 
        });
    });

    function tambahDataBAPT() {
        var tglpresentasi = $("#tglpresentasi").val();

        if (!tglpresentasi) {
            alert("Tidak bisa tambah BAPT, belum presentasi hasil temuan");
        } else {
            cekDataTemuan(function (result) {
            if (!result) {
                alert("Tidak bisa tambah BAPT, tidak ada temuan yang dijadikan BAPT");
            } else {
                getTemuan();

                $("#nomor_bapt").val('');
                $("#bapt_bapt").val('');
                $("#pic_bapt").val('');
                $("#temuan_bapt").val('');
                $("#est_bapt").val(null);
                $("#selesai_bapt").val(null);
                $("#alert_bapt").hide();
                $("#modalBAPT").modal('show');
                $("#buttonBAPT").html("Save");
            }
        });
        }

    }

    function cekDataTemuan(callback) {
        var notrans = $("#notrans").val();

        $.post("data/get_data.php", {
            AuditDetail: "cekDataTemuan",
            notrans: notrans
        }, function (response) {
            if (response == "ada") {
                callback(true);
            } else {
                callback(false);
            }
        });
    }

    function getTemuan() {
        var notrans = $("#notrans").val();

        $.post("data/get_data.php",{
            AuditDetail:"getTemuan",
            notrans: notrans
        },function (allData) {
            $("#temuan_bapt").html(allData);
        });
    }

    function editDataBAPT(nomor_bapt, temuan_bapt, bapt_bapt, pic_bapt, est_bapt, selesai_bapt) {
        $("#nomor_bapt").val(nomor_bapt);
        $("#temuan_bapt").val(temuan_bapt);
        $("#bapt_bapt").val(bapt_bapt);
        $("#pic_bapt").val(pic_bapt);
        $("#est_bapt").val(est_bapt);
        $("#selesai_bapt").val(selesai_bapt);
        $("#alert_bapt").hide();
        $("#modalBAPT").modal('show');
        $("#buttonBAPT").html("Save");
    }

    $("form#bapt_form").on("submit", function (e) {
        e.preventDefault();
        
        var notrans = $("#notrans").val();
        var nomor_bapt = $("#nomor_bapt").val();
        var temuan_bapt = $("#temuan_bapt").val();
        var bapt_bapt = $("#bapt_bapt").val();
        var pic_bapt = $("#pic_bapt").val();
        var est_bapt = $("#est_bapt").val();
        var selesai_bapt = $("#selesai_bapt").val();

        var tglpresentasi = $("#tglpresentasi").val();

        $("#buttonBAPT").html("Saving...");

        if (est_bapt < tglpresentasi) {
            $("#alert_bapt").text("Tanggal presentasi lebih besar daripada tanggal est bapt selesai!");
            $("#alert_bapt").show();
            $("#est_bapt").focus();            
            $("#buttonBAPT").html("Save");              
        } else if (selesai_bapt !== "" && selesai_bapt < tglpresentasi) {
            $("#alert_bapt").text("Tanggal selesai bapt lebih besar daripada tanggal presentasi!");
            $("#alert_bapt").show();
            $("#selesai_bapt").focus();            
            $("#buttonBAPT").html("Save");  
        } else {
            $.post("data/get_data.php", {
                AuditDetail: "saveDataBAPT",
                notrans: notrans,
                nomor_bapt: nomor_bapt,
                temuan_bapt: temuan_bapt,
                bapt_bapt: bapt_bapt,
                pic_bapt: pic_bapt,
                est_bapt: est_bapt,
                selesai_bapt: selesai_bapt
            }, function (response) {
                if (response == "saved") {
                    $("#buttonBAPT").html("Save");
                    $("#modalBAPT").modal('hide');
                    getAuditBAPT();
                } 
            });
        }

    });
</script>

<?php 
    include 'template/footer.php';
?>

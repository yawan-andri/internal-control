<?php 
    include 'template/header.php'; 

    $NoSOP = isset($_GET['NoSOP']) ? $_GET['NoSOP'] : null;
    echo "<script>const NoSOP = '$NoSOP';</script>";

    $NamaSOP = isset($_GET['NamaSOP']) ? $_GET['NamaSOP'] : null;
    echo "<script>const NamaSOP = '$NamaSOP';</script>";  
?>

<div class="container ">
    <h3 class="text-center">DAS SOP</h3>
    <h5 class="text-center"><?php echo $NoSOP . ' ' . $NamaSOP; ?></h5>
</div>

<div class="ms-3 me-3 mt-3" id="Temuan">
    <a href="javaScript:void(0);" 
        onclick="tambahData()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th class="col-lg-1">No</th>
                    <th class="col-lg-8">DAS</th>
                    <th class="col-lg-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="SOPDAS" class=""></tbody>
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

<div class= 'text-center'>
    <a type="button" class="btn btn-secondary btn-sm" href="sop-master.php">Kembali</a>
</div>

<div class="modal fade" id="modalDAS" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">DAS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="das_form">
                    <input type="hidden" name="nomor_das" id="nomor_das" value="" />
                    <div class="row mb-3">
                        <label for="das_das" class="col-sm-2 col-form-label col-form-label-sm">DAS</label>
                        <div class="col-sm-10">
                            <textarea class="form-control form-control-sm" id="das_das" name="das_das" val="" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="alert alert-warning" role="alert" id="alert_das"></div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submitDAS" id="submitDAS" class="btn btn-primary btn-sm"><span id="buttonDAS"> Simpan</span></button>
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
                    <input type="hidden" name="del_nomorhead" id="del_nomorhead" value="" />
                    <input type="hidden" name="del_nomordas" id="del_nomordas" value="" />
                    <input type="hidden" name="del_das" id="del_das" value="" />
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
        getDASDetail();
        $('#rowsPerPageSelect').change(function() {
            currentPage = 1;
            rowsPerPage = $('#rowsPerPageSelect').val();
            getDASDetail();
        });
    });

    function getDASDetail() {
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();
        $.post("data/get_data.php", {
            sopDAS: "getData",
            nosop: NoSOP,
            page: currentPage,
            rowsPerPage: rowsPerPageSelect
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#SOPDAS").empty();
                
                response.data.forEach((row, index) => {
                    const tableRow = `<tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.DAS}</td>
                        <td>
                            <a href="javascript:void(0)" 
                                onclick="editData(
                                    '${row.nomorDAS}',
                                    '${row.DAS}'
                                    );" 
                                class="btn btn-warning btn-sm me-1">Edit
                            </a>
                            <a href="javascript:void(0)" 
                                onclick="deleteData(
                                    '${row.NomorHead}',
                                    '${row.nomorDAS}',
                                    '${row.DAS}'
                                    );" 
                                class="btn btn-danger btn-sm">Delete
                            </a>
                        </td>
                    </tr>`;
                    $("#SOPDAS").append(tableRow);
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
        getDASDetail();
    }

    function tambahData() {
        $("#nomor_das").val('');
        $("#das_das").val('');
        $("#alert_das").hide();
        $("#modalDAS").modal('show');
        $("#buttonDAS").html("Save");
    }

    function editData(nomor_das, das_das) {
        $("#nomor_das").val(nomor_das);
        $("#das_das").val(das_das);
        $("#alert_das").hide();
        $("#modalDAS").modal('show');
        $("#buttonDAS").html("Save");
    }

    $("form#das_form").on("submit", function (e) {
        e.preventDefault();
        
        var nosop = NoSOP;
        var namasop = NamaSOP;
        var das_das = $("#das_das").val();
        var nomor_das = $("#nomor_das").val();

        $("#alert_das").hide();
        $("#buttonDAS").html("Saving...");
    
        $.post("data/get_data.php", {
            sopDAS: "saveDataDAS",
            nosop: nosop,
            das_das: das_das,
            nomor_das: nomor_das,
            namasop:namasop
        }, function (response) {
            if (response == "saved") {
                $("#buttonDAS").html("Save");
                $("#alert_das").hide();
                $("#modalDAS").modal('hide');
                getDASDetail();
            }
        });
        
    });

    function deleteData(nomor_das_head, nomor_das, das_das) {
        $("#del_nomorhead").val(nomor_das_head);
        $("#del_nomordas").val(nomor_das);
        $("#del_das").val(das_das);
        $("#alert_del").text("Hapus DAS " + das_das + " ini?");
        $("#submitDel").show();
        $("#modalDelete").modal('show');
        $("#buttonDelete").html("Delete");
    }

    $("form#del_form").on("submit", function (e) {
        e.preventDefault();
        
        var nomor_das_head = $("#del_nomorhead").val();
        var nomor_das = $("#del_nomordas").val();
        var das_das = $("#del_das").val();

        alert(nomor_das);

        $("#buttonDel").html("Deleting...");
        
        $.post("data/get_data.php", {
            sopDAS:"deleteData",
            nomor_das_head: nomor_das_head,
            nomor_das: nomor_das
        }, function (response) {
            if (response == "deleted") {
                $("#buttonDel").html("Delete");
                $("#modalDelete").modal('hide');
                getDASDetail();
            } else {
                $("#alert_del").text("Tidak bisa hapus, " + das_das + ", sudah dipakai untuk temuan Audit");
                $("#buttonDel").html("Delete");
                $("#submitDel").hide();
                getDASDetail();
            }
        });
    });
</script>

<?php 
    include 'template/footer.php';
?>

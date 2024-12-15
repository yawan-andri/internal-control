<?php 
    include 'template/header.php'; 
?>

<h3 class = "text-center">Account</h3>

<div class="ms-3 me-3">
    <!-- <div class="row">
        <div class="col-lg-2">
            <div class="form-group">      
                <label for="divisifil">Divisi</label>          
                <select name="divisifil" id="divisifil" class="form-control form-control-sm" required>
                    <div id="divisifil"></div>
                </select>
            </div>
        </div>
    </div> -->
</div>

<ul class="nav nav-tabs mt-3">
    <li class="nav-item">
        <a class="nav-link active" 
            id="userclick"
            aria-current="page" 
            href="javaScript:void(0);"  
            onclick="setUser()">User
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"
            id="aksesclick" 
            href="javaScript:void(0);"  
            onclick="setAkses()">Akses
        </a>
    </li>
</ul>

<div class="ms-3 me-3 mt-3" id="User">
    <a href="javaScript:void(0);" 
        onclick="tambahUser()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah 
    </a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th class="col-lg-1">No</th>
                    <th class="col-lg-4">Username</th>
                    <th class="col-lg-5">Nama Karyawan</th>
                    <th class="col-lg-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="userData" class=""></tbody>
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

<div class="ms-3 me-3 mt-3" id="Akses">
    <a href="javaScript:void(0);" 
        onclick="tambahAkses()" 
        data-bs-toggle="modal" 
        class="btn btn-primary btn-sm mb-2"> 
        <i class="fa fa-plus-circle"></i> Tambah Master
    </a>
    <div class="table-responsive text-center">
        <table class="table table-bordered table-hover">
            <thead id="thead">
                <tr>
                    <th>No</th>
                    <th class="col-lg-3">Akses Group</th>
                    <th class="col-lg-2">Aksi</th>
                </tr>
            </thead>
            <tbody id="aksesData" class=""></tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="form-group">
            <select id="rowsPerPageSelectAkses" class="form-select form-select-sm" style="width: auto;">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <nav>
            <ul class="pagination mb-0 pagination-sm" id="paginationControlsAkses">
            </ul>
        </nav>
    </div>
</div>

<div class= 'text-center'>
    <a type="button" class="btn btn-secondary btn-sm" href="index.php">Kembali</a>
</div>

<script>
    let currentPage = 1;
    let rowsPerPage = 10; 

    $(document).ready(function() {
        setUser();
        $('#rowsPerPageSelect').change(function() {
            currentPage = 1;
            rowsPerPage = $('#rowsPerPageSelect').val();
            getUser();
        });
    });

    function setUser() {
        document.getElementById("User").style.display = "block";
        document.getElementById("Akses").style.display = "none";

        document.getElementById("userclick").classList.add("active");
        document.getElementById("aksesclick").classList.remove("active");

        getUser();
    }

    function setAkses() {
        document.getElementById("User").style.display = "none";
        document.getElementById("Akses").style.display = "block";

        document.getElementById("userclick").classList.remove("active");
        document.getElementById("aksesclick").classList.add("active");

        getAkses();
    }

    function getUser() {
        const rowsPerPageSelect = $('#rowsPerPageSelect').val();

        $.post("data/get_data.php", {
            getUser: "getUser"
        })
        .done(function(response) {
            console.log("Response:", response);
            if (response && response.data) {
                $("#userData").empty();

                response.data.forEach((row, index) => {
                    const tableRow = `
                    <tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${row.username}</td>
                        <td>${row.NamaKaryawan}</td>
                        <td>
                            <a href="accountset.php?UserID=${row.id}" 
                                class="btn btn-outline-secondary btn-sm me-1">
                                <i class="fas fa-list"></i> Detail
                            </a>
                        </td>
                    </tr>`;
                    $("#userData").append(tableRow);
                });

                // Attach event listener for edit buttons
                attachEditTemuan();

                updatePagination(response.totalPages);
            } else {
                console.error("Unexpected response format:", response);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed:", textStatus, errorThrown);
        });
    }
</script>

<?php 
    include 'template/footer.php';
?>

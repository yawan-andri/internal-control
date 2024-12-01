<?php 
    include 'config/app.php';
    session_start(); 
    

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    } else {
        $login_username = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/yearpicker.css">
    <link href="assets/airdatepicker3/dist/air-datepicker.css" rel="stylesheet" type="text/css">
    <script src="assets/airdatepicker3/dist/air-datepicker.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="assets/js/yearpicker.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm p-3 mb-3 bg-body-tertiary rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Internal Control</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="sop-master.php">SOP</a></li>
                            <li><a class="dropdown-item" href="panduan-master.php">Panduan Audit</a></li>
                            <!-- <li><a class="dropdown-item" href="dir-master.php">Directory</a></li> -->
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="skb-master.php">SKB</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="sop-audit.php">Audit</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="das-master.php">Evaluasi Manager</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="laporan.php">Laporan</a></li>
                            <li><a class="dropdown-item" href="laporan-kip.php">Laporan KIP</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Test Site
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="test1.php">Test 1</a></li>
                            <li><a class="dropdown-item" href="test2.php">Test 2</a></li>
                            <li><a class="dropdown-item" href="test3.php">Test 3</a></li>
                            <li><a class="dropdown-item" href="test4.php">Test 4</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown nav navbar-nav navbar-right">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, <?= $login_username; ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <li><a class="dropdown-item" href="#" onclick="logout()">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<script>

    var tanggal = new Date();
    var jperiod ;
    jperiod = tanggal.getFullYear()+("0" + (tanggal.getMonth() + 1)).slice(-2);
    // console.log(jperiod);

    const localeEs = {
        days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', ],
        daysMin: ['Sun', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        today: 'Now',
        clear: 'Cancel',
        dateFormat: 'dd/mm/yyyy',
        timeFormat: 'hh:ii',
        firstDay: 1
    };

    function logout() {
        window.location.href = 'logout.php';
    }

</script>
</body>
</html>
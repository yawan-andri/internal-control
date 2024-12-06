

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Required meta tags -->
		<link rel="icon" href="assets/image/website/favicon.ico" type="image/png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Panel Admin | DES FCL System </title>

		<!-- CSS -->
		<link rel="stylesheet" href="assets/bs/css/bootstrap.css">
		<link rel="stylesheet" href="assets/bs/css/sticky-footer.css">
		<link rel="stylesheet" href="assets/other/css/dropdown-custom.css">

		<link rel="stylesheet" href="assets/fa/css/font-awesome.css">

		<!-- js -->
		<script src="assets/js/jquery-3.3.1.js"></script>

		<!-- datetimepicker -->		
		<link rel="stylesheet" href="assets/time/css/gijgo.css">
		<script src="assets/time/js/gijgo.js"></script>

		<!-- select 2 -->
		<link rel="stylesheet" href="assets/select2/css/select2.css">
		

		<!-- upload -->
		<!-- <link rel="stylesheet" href="assets/upload/css/fileinput.css">
		<link rel="stylesheet" href="assets/upload/css/fileinput-rtl.css"> -->

		<!-- easyui -->
		<link rel="stylesheet" href="assets/eui/css/easyui.css">
		<link rel="stylesheet" href="assets/eui/css/icon.css">		

		<!-- easyui -->
		<script src="assets/eui/js/jquery.easyui.min.js"></script>
		<script src="assets/eui/js/datagrid-filter.js"></script>		
		
		<!-- month picker -->
		<link rel="stylesheet" href="assets/month_picker/css/monthpicker.css">
		<script src="assets/month_picker/js/monthpicker.min.js"></script>

		<!-- flat picker  -->
		<link rel="stylesheet" href="assets/flatpickr/css/flatpickr.min.css">
		<script src="assets/flatpickr/js/flatpickr.js"></script>

		<link rel="stylesheet" href="assets/flatpickr/plugin/month_select_style.css">
		<script src="assets/flatpickr/plugin/month_select.js"></script>

		<!-- masked input  -->        
        <script src="assets/masked/jquery.maskedinput.min.js" type="text/javascript"></script>
        
        <!-- moment  -->
		<script src="assets/moment/moment.min.js" type="text/javascript"></script>

		<!-- toastr  -->
		<link rel="stylesheet" href="assets/toastr/toastr.min.css">
		<script src="assets/toastr/toastr.min.js" type="text/javascript"></script>
		<script type="application/javascript">
			var dom_content_load_state 	= 0;
		</script>
	</head>

    	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  	<a class="navbar-brand" href="https://des.saranagroups.com/"> <img src="assets/image/website/logo.png" alt="logo" width="35px"> </a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		    	<ul class="navbar-nav">
		    		
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Costing</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Costing dan Penawaran</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=estimasi"> Cost Estimate </a><a class="dropdown-item" href="?page=penawaran"> Penawaran </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Bidding dan Penawaran</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=bidding"> Bidding </a><a class="dropdown-item" href="?page=bidding-penawaran"> Bidding Penawaran </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=batas-lapor"> Batas Lapor </a><a class="dropdown-item" href="?page=cont-subsidi-silang"> Cont Subsidi Silang </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Operasional</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=ekspedisi-jadwal-kapal"> Muatan Kapal </a><a class="dropdown-item" href="?page=rkm"> RKM </a><a class="dropdown-item" href="?page=request-order"> Request Order </a><a class="dropdown-item" href="?page=seal"> Seal </a><a class="dropdown-item" href="?page=ekspedisi-alih-kapal"> Alih Kapal </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=home"> Kegiatan Telp CS Marketing </a><a class="dropdown-item" href="?page=project-plan-marketing"> Project Plan Marketing </a><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Tanda Terima Surat</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=surat-relasi"> Surat Pengantar Kasus Ops </a><a class="dropdown-item" href="?page=muatan-surat-pengantar"> Surat Pengantar BAPB Agen </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Storage Demurrage</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=storage-transaksi"> Storage Transaksi </a><a class="dropdown-item" href="?page=demurrage-transaksi"> Demurrage Transaksi </a><a class="dropdown-item" href="?page=sdr"> Rincian Storage Demurrage </a></div><a class="dropdown-item" href="?page=relokasi-transaksi"> Relokasi Transaksi </a><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Bongkaran Container</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=bapb-terima"> Tanda Terima BAPB </a><a class="dropdown-item" href="?page=alih-lokasi-bongkar"> Alih Bongkar </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=validasi-kasbon"> Validasi Kasbon Pelancar </a>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Klaim</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=klaim"> Kronologis Klaim </a><a class="dropdown-item" href="?page=klaim-stok-barang"> Stok Barang Klaim </a><a class="dropdown-item" href="?page=klaim-barang-tumpuk"> Barang Tumpuk Klaim Asuransi </a><a class="dropdown-item" href="?page=klaim-asuransi"> Klaim Proses Asuransi </a><a class="dropdown-item" href="?page=laporan-klaim-stok-barang"> Laporan Stok Klaim </a></div><a class="dropdown-item" href="?page=biaya-tambahan"> Biaya Tambahan </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Asuransi</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Master</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=asuransi-broker"> Broker Asuransi </a><a class="dropdown-item" href="?page=asuransi-relasi"> Relasi Asuransi </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Transaksi</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=asuransi-transaksi"> Asuransi Transaksi </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-relasi-asuransi"> Laporan Relasi Asuransi </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Finance</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance AR</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=piutang-giro-masuk"> Giro Masuk </a><a class="dropdown-item" href="?page=piutang-giro-ambil"> Pengambilan Giro </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=kwitansi"> Invoice </a><a class="dropdown-item" href="?page=nota"> Nota Manual </a><a class="dropdown-item" href="?page=nota-referensi"> Nota Referensi </a><a class="dropdown-item" href="?page=kwitansi-validasi"> Konfirmasi Invoice </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=piutang-cs"> Kegiatan CS Piutang </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=piutang-tukar-faktur"> Tukar Faktur Relasi </a><a class="dropdown-item" href="?page=tanda-terima-relasi"> TT Relasi Special </a><a class="dropdown-item" href="?page=surat-pengantar-ar"> Surat Pengatar AR </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=pelunasan"> Pelunasan </a><a class="dropdown-item" href="?page=pph23-master"> Pelunasan PPH23 </a><a class="dropdown-item" href="?page=piutang-tak-tertagih"> Piutang Tak Tertagih </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance AP</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=tukar_faktur"> Tukar Faktur </a><a class="dropdown-item" href="?page=ap-debit-note"> Debit Note AP </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=ap-freight"> AP Freight </a><a class="dropdown-item" href="?page=ap-trucking"> AP Trucking </a><a class="dropdown-item" href="?page=ap-agen"> AP Agen </a><a class="dropdown-item" href="?page=ap-manual"> AP Manual </a><a class="dropdown-item" href="?page=ap-kerani-kota"> AP Kerani Kota </a><a class="dropdown-item" href="?page=ap-kapal"> AP Kapal </a><a class="dropdown-item" href="?page=ap-batal-muat"> AP Batal Muat </a><a class="dropdown-item" href="?page=ap-demurrage"> AP Demurrage </a><a class="dropdown-item" href="?page=ap-storage-bayar"> AP Storage </a><a class="dropdown-item" href="?page=ap-klaim"> AP Klaim </a><a class="dropdown-item" href="?page=ap-asuransi"> AP Asuransi </a><a class="dropdown-item" href="?page=ap-relokasi"> AP Relokasi </a><a class="dropdown-item" href="?page=ap-biaya-tambahan"> AP Biaya Tambahan </a><a class="dropdown-item" href="?page=ap-alih-kapal"> AP Alih Kapal </a><a class="dropdown-item" href="?page=ap-refund"> AP Refund </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=ap-data"> AP Data </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance INT</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=trans_pembayaran"> Trans Pembayaran </a><a class="dropdown-item" href="?page=proses-biaya-rutin"> Trans Pembayaran Biaya Rutin </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=slip-setoran"> Slip Setoran </a><a class="dropdown-item" href="?page=pindah_buku"> Pindah Buku </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=rekening-mutasi"> Mutasi Rekening </a><a class="dropdown-item" href="?page=buku_bank"> Buku Kas/Bank </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance UP</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=faktur-utang-piutang"> Hutang </a><a class="dropdown-item" href="?page=laporan-utang-piutang"> Laporan Hutang </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=ap-kerani-change"> Hutang Piutang Pelancar </a><a class="dropdown-item" href="?page=laporan-ap-kerani-change"> Laporan Hutang Piutang Pelancar </a></div>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Accounting</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Accurate</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=accurate-invoice"> Accurate Invoice </a><a class="dropdown-item" href="?page=accurate-invoice-payment"> Accurate Pelunasan </a><a class="dropdown-item" href="?page=accurate-pph23-relasi"> Accurate PPH23 Relasi </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=accurate-ship"> Accurate Kapal </a><a class="dropdown-item" href="?page=accurate-container"> Accurate Container </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=accurate-biaya"> Accurate Biaya </a><a class="dropdown-item" href="?page=accurate-pelunasan-biaya"> Accurate Pelunasan Biaya </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=rekap-bukti-potong"> Rekap Bukti Potong  </a>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Master</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=master-jurnal"> Parameter Jurnal </a></div>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Laporan</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-cont"> Container </a><a class="dropdown-item" href="?page=laporan-otorisasi"> Otorisasi </a><a class="dropdown-item" href="?page=laporan-analisa-rkm"> Analisa BAPB/RKM </a><a class="dropdown-item" href="?page=laporan-tracking-container"> Analisa Tracking Container </a><a class="dropdown-item" href="?page=laporan-relasi-template"> Report Relasi </a><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Costing</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-cost-estimate"> Cost Estimate </a><a class="dropdown-item" href="?page=laporan-cost-estimate-loss"> Cost No Profit </a><a class="dropdown-item" href="?page=laporan-grade-profit"> Analisa Grade Profit </a><a class="dropdown-item" href="?page=komisi-relasi"> Komisi Relasi </a><a class="dropdown-item" href="?page=laporan-kontrak-pelayaran"> Relasi Kontrak Pelayaran </a><a class="dropdown-item" href="?page=laporan-cost-belum-digunakan"> Cost Belum Digunakan </a><a class="dropdown-item" href="?page=laporan-analisa-cost"> Analisa Costing </a><a class="dropdown-item" href="?page=laporan-subsidi-silang"> Subsidi Silang </a><a class="dropdown-item" href="?page=laporan-costing-ppn"> Cost PPN & Non PPN </a><a class="dropdown-item" href="?page=laporan-batas-cont"> Analisa Batas Cont Lapor </a><a class="dropdown-item" href="?page=laporan-analisa-ff"> Laporan Analisa FF </a><a class="dropdown-item" href="?page=laporan-serba-serbi"> Analisa Serba Serbi </a><a class="dropdown-item" href="?page=laporan-tarif-trucking"> Tarif Trucking </a><a class="dropdown-item" href="?page=laporan-cost-estimate-subsidi"> Subsidi Cost Estimate </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Invoicing</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-invoice"> Invoice </a><a class="dropdown-item" href="?page=laporan-invoice-revisi"> Invoice Revisi </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-konfirmasi-invoice"> Konfirmasi Invoice </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-nota"> Nota Manual </a><a class="dropdown-item" href="?page=laporan-nota-referensi"> Nota Referensi </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-invoice-motor"> Invoice Motor </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Piutang</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-monitoring-piutang"> Monitoring Piutang </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-tukar-faktur"> Tukar Faktur Relasi </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-invoice-jt"> Invoice Jatuh Tempo </a><a class="dropdown-item" href="?page=laporan-invoice-over-top"> Invoice Over TOP </a><a class="dropdown-item" href="?page=laporan-uang-titipan"> Uang Titipan </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-kegiatan-telpon"> Kegiatan CS Piutang </a><a class="dropdown-item" href="?page=laporan-kartu-piutang"> Laporan Kartu Piutang </a><a class="dropdown-item" href="?page=laporan-credit-limit-piutang"> Credit Limit Piutang </a><a class="dropdown-item" href="?page=laporan-pelunasan-nota"> Pelunasan Nota </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-uang-masuk-relasi"> Uang Masuk Relasi </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-pencapaian-ar"> Pencapaian AR </a><a class="dropdown-item" href="?page=laporan-pelunasan-relasi"> Pelunasan Relasi </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Marketing</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-omset"> Omset </a><a class="dropdown-item" href="?page=laporan-omset-by-tujuan"> Omset Relasi by Tujuan </a><a class="dropdown-item" href="?page=laporan-omset-pelayaran"> Omset Pelayaran </a><a class="dropdown-item" href="?page=laporan-relasi-tidak-aktif"> Relasi Tidak Aktif </a><a class="dropdown-item" href="?page=laporan-komoditi-relasi"> Komoditi Relasi </a><a class="dropdown-item" href="?page=laporan-relasi-per-cs"> Relasi per CS </a><a class="dropdown-item" href="?page=laporan-refund"> Refund </a><a class="dropdown-item" href="?page=laporan-analisa-telp"> Analisa Telp </a><a class="dropdown-item" href="?page=laporan-space-list"> Space List </a><a class="dropdown-item" href="?page=laporan-reward-punishment"> Reward Punishment </a><a class="dropdown-item" href="?page=laporan-food-grade"> Food Grade </a><a class="dropdown-item" href="?page=laporan-relasi-baru"> Relasi Baru </a><a class="dropdown-item" href="?page=laporan-strategi-market"> Buku Panduan Strategi </a><a class="dropdown-item" href="?page=laporan-relasi-terputus"> Relasi Terputus Aktif Kembali </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-entertaiment"> Entertaiment Relasi </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Operasional</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-analisa-order-gagal"> Analisa RKM Gagal </a><a class="dropdown-item" href="?page=laporan-seal"> Seal </a><a class="dropdown-item" href="?page=laporan-pelancar-muat"> Master Tarif Pelancar Muat </a><a class="dropdown-item" href="?page=laporan-analisa-surat-jalan"> Analisa Surat Jalan </a><a class="dropdown-item" href="?page=laporan-relasi-pakai-plywood"> Relasi Pakai Plywood </a><a class="dropdown-item" href="?page=laporan-relasi-pakai-kerani"> Penggunaan Kerani </a><a class="dropdown-item" href="?page=laporan-kasbon-pelancar"> Analisa Kasbon Pelancar </a><a class="dropdown-item" href="?page=laporan-bon-sementara"> Bon Sementara </a><a class="dropdown-item" href="?page=laporan-analisa-kerani"> Analisa Kerani </a><a class="dropdown-item" href="?page=laporan-analisa-klaim"> Analisa Klaim </a><a class="dropdown-item" href="?page=laporan-analisa-leadtime"> Analisa Leadtime Agen </a><a class="dropdown-item" href="?page=laporan-analisa-leadtime-storage"> Pra Storage Demurrage </a><a class="dropdown-item" href="?page=laporan-storage-demurrage"> Analisa Biaya Storage Demmurage </a><a class="dropdown-item" href="?page=laporan-storage-demurrage-belum-input"> Storage Demmurage Belum Input </a><a class="dropdown-item" href="?page=laporan-analisa-bapb-kirim"> Analisa BAPB Kirim </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-trans-pembayaran"> Trans Pembayaran </a><a class="dropdown-item" href="?page=laporan-outstanding-tf-ap"> Outstanding TF AP </a><a class="dropdown-item" href="?page=laporan-giro-ar"> Analisa Giro AR </a><a class="dropdown-item" href="?page=laporan-bon-potong-pph"> Bon Potong PPH </a><a class="dropdown-item" href="?page=laporan-analisa-giro"> Analisa Giro / Cheque </a><a class="dropdown-item" href="?page=laporan-automatic-klik-bca"> MAT Klik BCA </a><a class="dropdown-item" href="?page=report-ap-manual"> AP Manual </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Accounting</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=laporan-cek-biaya"> Cek Biaya </a><a class="dropdown-item" href="?page=laporan-ap-data"> Analisa AP Data </a><a class="dropdown-item" href="?page=laporan-belum-ada-bukti-potong"> Potong PPH23 </a></div>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Master</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=relasi"> Relasi </a><a class="dropdown-item" href="?page=relasi-group"> Level Relasi </a><a class="dropdown-item" href="?page=relasi-item-type"> Jenis Barang </a><a class="dropdown-item" href="?page=rekening-kerani"> Rekening Kerani </a><a class="dropdown-item" href="?page=master-budgeting"> Budgeting </a><a class="dropdown-item" href="?page=user-relasi"> Grup CS  </a><a class="dropdown-item" href="?page=master-estimasi-alasan"> Alasan Cost Tidak Digunakan </a><a class="dropdown-item" href="?page=master-batas-muat"> Batas Muat </a><a class="dropdown-item" href="?page=master-tagihan-claim-inap"> Tagihan Claim Mobil Inap </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=ekspedisi"> Pelayaran </a><a class="dropdown-item" href="?page=kota"> Kota </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=packing"> Tipe Kontainer </a><a class="dropdown-item" href="?page=ekspedisi-lain"> Ekspedisi Lain </a><a class="dropdown-item" href="?page=agen"> Agen </a><a class="dropdown-item" href="?page=trucking-vendor"> Vendor Trucking </a><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance AR</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=piutang-kurir"> Data Kurir </a><a class="dropdown-item" href="?page=piutang-tipe-pembayaran"> Tipe Pembayaran AR </a><a class="dropdown-item" href="?page=kwitansi-kategori"> Kategori Penagihan </a><a class="dropdown-item" href="?page=master-tipe-batal"> Tipe Revisi </a><a class="dropdown-item" href="?page=master-nota-type"> Jenis Tagihan Nota </a><a class="dropdown-item" href="?page=master-ar-level"> AR Level </a><a class="dropdown-item" href="?page=group-ar"> AR Group </a><a class="dropdown-item" href="?page=master-leadtime-tf"> Leadtime TF AR </a><a class="dropdown-item" href="?page=limit-validasi-piutang"> Limit Validasi Piutang </a><a class="dropdown-item" href="?page=relasi-tidak-bayar"> Relasi Tidak Mau Bayar </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Costing</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=klausal"> Klausal </a><a class="dropdown-item" href="?page=komisi"> Komisi </a><a class="dropdown-item" href="?page=master-perubahan-freight"> Perubahan Freight </a><a class="dropdown-item" href="?page=master-kunci-rkm"> Kunci RKM VS Cost </a><a class="dropdown-item" href="?page=nama-lapor"> Nama Lapor </a><a class="dropdown-item" href="?page=biaya-tiap-servis"> Biaya Tiap Jenis Servis </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=master-rek-refund"> Rekening Refund </a><a class="dropdown-item" href="?page=master-profit-limit"> Profit Limit </a><a class="dropdown-item" href="?page=master-grade-profit"> Grade Profit </a><a class="dropdown-item" href="?page=master-validasi-profit"> Validasi Profit </a><a class="dropdown-item" href="?page=master-validasi-profit-bypass"> Validasi Profit Bypass </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Tarif</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=door-service"> Door Service </a><a class="dropdown-item" href="?page=trucking"> Trucking </a><a class="dropdown-item" href="?page=pelancar-umum"> Pelancar Umum </a><a class="dropdown-item" href="?page=pelancar-muat-khusus"> Pelancar Muat Khusus </a><a class="dropdown-item" href="?page=ekspedisi-alih-kapal-tarif"> Tarif Alih Kapal </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=harga-unit"> Harga Unit </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Biaya</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=master-biaya"> Biaya </a><a class="dropdown-item" href="?page=master-biaya-rutin"> Biaya Rutin </a><a class="dropdown-item" href="?page=master-group-biaya"> Group Biaya </a><a class="dropdown-item" href="?page=biaya-khusus"> Biaya Khusus </a><a class="dropdown-item" href="?page=master-ob-rutin"> Biaya Tambahan Rutin </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Storage Demurrage</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=master-storage"> Storage </a><a class="dropdown-item" href="?page=master-demurrage"> Demurrage </a><a class="dropdown-item" href="?page=master-relokasi"> Relokasi </a><a class="dropdown-item" href="?page=master-alasan-overtime"> Alasan Overtime </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Finance AP dan INT</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=master_rek"> Rekening </a><a class="dropdown-item" href="?page=master_submodul"> Submodul Buku Kas/Bank </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=master_tipebon"> Tipe Bon </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=master_giro"> No. Giro / Cheque </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=data_supplier"> Data Supplier </a><a class="dropdown-item" href="?page=master_jenis_pembayaran"> Jenis Pembayaran </a><a class="dropdown-item" href="?page=master-residen-supplier"> Residen Supplier </a><a class="dropdown-item" href="?page=master-tipe-supplier"> Tipe Supplier </a><a class="dropdown-item" href="?page=master-kode-swift"> Kode Swift </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=master-tarif-pph21"> Tarif PPH21 </a><a class="dropdown-item" href="?page=master-sp-type"> Tipe SP UP </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=reward-punishment"> Reward Punishment </a><a class="dropdown-item" href="?page=master-container-motor"> Container Motor </a><a class="dropdown-item" href="?page=master-buku-panduan"> Buku Panduan Strategi </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Poin Kerani</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Master</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=jenis-poin-kerani"> Jenis Poin Kerani </a><a class="dropdown-item" href="?page=grade-poin-kerani"> Periode Kerani </a><a class="dropdown-item" href="?page=kelompok-kerani"> Kelompok Kerani </a><a class="dropdown-item" href="?page=tarif-poin-kerani"> Tarif Poin Kerani </a><a class="dropdown-item" href="?page=potongan-poin-klaim"> Pot Poin Claim </a></div><div class="dropdown-divider"></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Transaksi</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=data-kelompok-kerani"> Kelompok Kerani Detail </a><a class="dropdown-item" href="?page=poin-kerani"> Poin Kerani </a></div><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=laporan-kerani-poin"> Laporan Poin Kerani </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Rak Motor</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Master</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=relasi-rak-motor"> Relasi Rak Motor </a><a class="dropdown-item" href="?page=rak-motor"> Rak Motor </a><a class="dropdown-item" href="?page=posisi-rak-motor"> Posisi Rak Motor </a></div><a class="dropdown-item" href="?page=pergerakan-rak-motor"> Pergerakan Rak Motor </a><a class="dropdown-item" href="?page=laporan-pergerakan-rak-motor"> Laporan Pergerakan Rak Motor </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Prestasi</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Parameter</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=prestasi-parameter-tujuan"> Parameter Tujuan </a><a class="dropdown-item" href="?page=prestasi-parameter-exclude-relasi"> Parameter Relasi ByPass </a><a class="dropdown-item" href="?page=prestasi-parameter-pelayaran"> Parameter Pelayaran </a><a class="dropdown-item" href="?page=prestasi-parameter-forecast-pelayaran"> Parameter Forecast Pelayaran </a><a class="dropdown-item" href="?page=prestasi-parameter-kpi"> Parameter KPI omset  </a><a class="dropdown-item" href="?page=prestasi-parameter-forecast"> Forecast Omset </a><a class="dropdown-item" href="?page=kpi-relasi"> Parameter KPI Relasi </a><a class="dropdown-item" href="?page=prestasi-parameter-exclude-tracking"> Parameter Bypass Tracking Container </a><a class="dropdown-item" href="?page=prestasi-parameter-ontime-tracking"> Parameter Ontime Tracking Container </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=bapb-pic"> Parameter PIC BAPB </a><a class="dropdown-item" href="?page=bapb-kembali-parameter"> Parameter Tgl Acuan BAPB </a></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Marketing</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=prestasi-marketing-omset"> Prestasi Omset Container </a><a class="dropdown-item" href="?page=prestasi-marketing-omset-pelayaran"> Prestasi Omset Pelayaran </a><a class="dropdown-item" href="?page=prestasi-marketing-status-relasi"> Prestasi By Status Relasi </a><a class="dropdown-item" href="?page=prestasi-marketing-tracking-container"> Prestasi By Tracking Container </a></div>
																<div class="dropdown-submenu">
                        											<a class="dropdown-item dropdown-toggle" href="#">Operasional</a>
														        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=bapb-kembali-prestasi"> Prestasi BAPB Balik </a></div>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Tools</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=kalender"> Kalender </a><a class="dropdown-item" href="?page=ekspedisi-buku"> Buku Ekspedisi Staff </a><a class="dropdown-item" href="?page=bon_sementara"> Bon Sementara </a><div class="dropdown-divider"></div><a class="dropdown-item" href="?page=master-otorisasi"> Otorisasi </a><a class="dropdown-item" href="?page=bypass-validasi"> Bypass Validasi </a>
								        	</div>
										</li>
									
										<li class="nav-item dropdown active">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								          		<b>Pengaturan</b>
								        	</a>
								        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"><a class="dropdown-item" href="?page=master-parameter-umum"> Parameter Umum </a><a class="dropdown-item" href="?page=master-parameter-validasi-bertingkat"> Parameter Validasi Bertingkat </a><div class="dropdown-divider"></div>
								        	</div>
										</li>
									 
		    	</ul>
		    	<ul class="nav navbar-nav ml-auto">
					
					<div class="dropdown mt-1">
					  	<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    	Hello, tiwi					  	</button>
					  	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					  		<a class="dropdown-item" href="https://des.saranagroups.com/?page=user-edit-self">Edit Password</a>
					    	<a class="dropdown-item" href="https://des.saranagroups.com/logout">Logout</a>
					  	</div>
					</div>
		    	</ul>  	
		  	</div>
		</nav>

		<!-- container -->
		<div class="container-fluid">

			<!-- divider -->
			<div class="row">
				<div class="col-lg-12" style="background-color: #2771a6; height: 3px"></div>
			</div>

			<!-- header -->
			<div class="row">
				<div class="col-lg-12 text-center mt-1 mb-1">
					<h5 class="font-weight-bold">Kronologis Klaim</h5>				</div>				
			</div> 


			<!-- content -->
			
<hr/>
<div class="row" id="tb">
	<div class="col-lg-12">
		<button class="btn btn-secondary btn-sm m-1 show-master">Master Tipe Penjelasan Klaim</button>
        <a class="btn btn-secondary btn-sm m-1" href="?page=klaim-ap" title="Proses AP Klaim">AP Klaim</a>
        <a class="btn btn-secondary btn-sm m-1" href="?page=klaim-kategori-kelalaian" title="Proses AP Klaim">Kategori Klaim</a>
	</div>
    
</div>
<div class="row">
    <div class="col-lg-2">
		<div class="form-group">      
            <label> Tipe Periode </label>          
            <select class="form-control" id="filter_period_date" onchange="Header_Table()">
				<option value="rkm_date"> Tgl RKM </option>
				<option value="antar"> Tgl Antar </option>
				<option value="bongkar"> Tgl Bongkar </option>
				<option value="depo_kembali"> Tgl Depo Kembali </option>
			</select>
        </div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">      
            <label> Periode </label>          
            <input type="text" id="filter_date" class="form-control flatpicker_fy flatpickr-input" value="December 2024" readonly="readonly" onchange="Header_Table()">
        </div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">      
            <label> Status </label>          
            <select class="form-control" id="filter_status" onchange="Header_Table()">
				<option value=""> Semua </option>
				<option value="sudah_tutup_kasus"> Sudah Tutup Kasus </option>
				<option value="belum_kronologis" selected> Belum Kronologis </option>
				<option value="sudah_kronologis_belum_tutup_kasus"> Sudah Kronologis & Belum Tutup Kasus</option>
				<option value="belum_solusi_internal"> Belum Solusi Internal</option>
			</select>
        </div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">      
            <label>Barang Rusak </label>          
            <select class="form-control" id="filter_status_barang_rusak" onchange="Header_Table()">
				<option value=""> Semua </option>
				<option value="ada_barang_rusak"> Ada Barang Rusak </option>
				<option value="tidak_ada_barang_rusak"> Tidak Ada Barang Rusak </option>
			</select>
        </div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">      
            <label>Status Kerani </label>          
            <select class="form-control" id="filter_status_pakai_kerani" onchange="Header_Table()">
				<option value=""> Semua </option>
				<option value="pakai_kerani"> Pakai Kerani </option>
				<option value="tidak_pakai_kerani"> Tidak Pakai Kerani </option>
				<option value="belum_input_kerani"> Belum Input Kerani </option>
			</select>
        </div>
	</div>
	<div class="col-lg-2">
				<div class="form-group">      
            <label>Jenis Asuransi </label>          
            <select class="form-control" id="filter_jenis_asuransi" onchange="Header_Table()">
				<option value=""> Semua </option>
									<option value="39"> Fix Pertanggungan </option>
									<option value="40"> Fleksibel Pertanggungan </option>
									<option value="41"> Relasi Asuransi Sendiri </option>
									<option value="205"> Relasi Tidak Asuransi Cover ACC GM </option>
									<option value="42"> Relasi Yang Tidak Mau Asuransi </option>
							</select>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="easyui-datagrid" style="min-height:500px; width: 99%" id="dg1">
			<thead data-options="frozen:true">
				<tr>
					<th data-options="field:'rkm_number', sortable:true" width="10%" align="center">No. RKM</th>
					<th data-options="field:'rdetail_cont_number', sortable:true" width="10%" align="center">No. Cont</th>
					<th data-options="field:'relation_sender', sortable:true" width="15%" align="center">Pengirim</th>
					<th data-options="field:'relation_receiver', sortable:true" width="15%" align="center">Penerima</th>
				</tr>
			</thead>
			<thead>
				<tr>
				    <th data-options="field:'user_kerani_name', sortable:true" width="10%" align="center">Kerani</th>
				    <th data-options="field:'rkm_date', sortable:true" width="10%" align="center">Tgl RKM</th>
				    <th data-options="field:'rdetail_item_delivery', sortable:true" width="10%" align="center">Tgl Antar</th>
					<th data-options="field:'rdetail_item_unload', sortable:true" width="10%" align="center">Tgl Bongkar</th>
					<th data-options="field:'rdetail_back_depo', sortable:true" width="10%" align="center">Tgl Depo Kembali</th>
					<th data-options="field:'city_name', sortable:true" width="20%" align="center">Tujuan</th>
					<th data-options="field:'agent_name', sortable:true" width="20%" align="center">Agen</th>
					<th data-options="field:'rdetail_item_status', sortable:true" width="10%" align="center">Status</th>
					<th data-options="field:'rdetail_item_status_at', sortable:true" width="10%" align="center">Tgl Input Status</th>
					<th data-options="field:'input_total_claim', sortable:true" width="10%" align="center">Total Klaim</th>
					<th data-options="field:'input_total_discount', sortable:true" width="10%" align="center">Total Discount</th>
					<th data-options="field:'scheduled_time', sortable:false" width="10%" align="center">Tgl Info Claim</th>
					<th data-options="field:'detail', sortable:false" width="10%" align="left">Detail</th>
					<th data-options="field:'option', sortable:false" width="30%" align="center">Opsi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<div class="modal pr-0" id="header-modal-master">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title">Master Tipe Penjelasan Klaim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
            	<div class="row mx-0">

                    <div class="col-lg-12">
                    	<button class="btn btn-secondary btn-sm m-1 add-header-master">Tambah</button>
                    </div>
                    
            		<div class="col-lg-12 px-2 mt-2">
                    	<table class="table table-bordered">
            				<thead class="bg-light">
                            	<tr>
									<td align="center" width="15%">Tipe</td>
									<td align="center" width="15%">TOP</td>
                                    <td align="center" width="15%">Acuan TOP</td>
                                    <td align="center" width="10%">Option</td>
                                </tr>
                            </thead>
                            <tbody id="table_master">
                            </tbody>
                        </table>
            		</div>
            		
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal pr-0" id="header-modal-add-master">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title">Tambah Master Tipe Penjelasan Klaim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
            	<div class="row mx-0">
                	<div class="col-lg-4 px-2 mt-2">
            			<label for="master-tipe"><i>Tipe</i>*</label>
            			<input type="text" class="form-control" id="master-tipe">
            			
            		</div>
                    
                    <div class="col-lg-4 px-2 mt-2">
            			<label for="master-top"><i>TOP</i>*</label>
            			<input type="text" class="form-control number" id="master-top">
            			
            		</div>
                    
            		<div class="col-lg-4 px-2 mt-2">
            			<label for="sel-ref"><i>Acuan TOP</i>*</label>
                        <select class="form-control select2" id="sel-ref">
                        	<option value="Antar">Antar</option>
                            <option value="Kronologis">Kronologis</option>
                            <option value="Kronologis">Bongkar</option>
                        </select>
            		</div>
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-secondary submit-header-add-master">Submit</button>
            </div>
        </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal pr-0" id="header-modal-edit-master">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title">Edit Master Tipe Penjelasan Klaim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
            	<div class="row mx-0">
                	<div class="col-lg-4 px-2 mt-2">
            			<label for="master-tipe"><i>Tipe</i>*</label>
            			<input type="text" class="form-control" id="e-title">
            			
            		</div>
                    
                    <div class="col-lg-4 px-2 mt-2">
            			<label for="master-top"><i>TOP</i>*</label>
            			<input type="text" class="form-control number" id="e-top">
            			
            		</div>
                    
            		<div class="col-lg-4 px-2 mt-2">
            			<label for="sel-ref"><i>Acuan TOP</i>*</label>
                        <select class="form-control select2" id="e-ref">
                        	<option value="Antar">Antar</option>
                            <option value="Kronologis">Kronologis</option>
                            <option value="Bongkar">Bongkar</option>
                        </select>
            		</div>
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-secondary save-header-add-master">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal pr-0" id="view_load_images_container">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-2 row">
				<i class="fa fa-spinner fa-spin"></i>
				loading content ....
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal pr-0" id="modal-total-claim">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-2">
            	<div class="row mx-0">
                	<div class="col-lg-6 px-2 mt-2">
            			<label for="total_claim"><i>Total Claim</i>*</label>
						<input type="hidden" id="id_claim">
            			<input type="text" class="form-control number" id="total_claim">
            		</div>
                    
                    <div class="col-lg-6 px-2 mt-2">
            			<label for="discount"><i>Diskon</i>*</label>
            			<input type="text" class="form-control number" id="discount">
            		</div>
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-secondary save-total-claim">Submit</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	var tmp_id = '';
	$(document).ready(function() {
		Header_Table();

		$('#view_load_images_container').on('shown.bs.modal', function (event) {
			// do something…
			let modal 	= $(this);
			// related button
			let button 	= $(event.relatedTarget);
			let title 	= button.data('title');
			let rkm_id 	= button.data('rkm_id');

			modal.find('.modal-title').text(title);
			getLoadImages( rkm_id, '#view_load_images_container .modal-body' );
		});

	});

	function resendEmail( logs_email_id ){
		// next hour momentjs hour + 1
		let next_hour = moment().hour() + 1;
		$.messager.confirm("Konfirmasi", "Apakah anda yakin ingin mengirim ulang email ini? (akan dikirim pada jam "+ next_hour + ":00)", function(r) {
			if (r) {
				let url = 'https://des.saranagroups.com/data/get_logs_email?type=resend';
				let data = {
					'logs_email_id': logs_email_id
				};
				$.get(url, data,function (response, textStatus, jqXHR) {
					let alert_type 	= (response.status)?'info' : 'error';
					$.messager.alert("Informasi", response.message, alert_type, function(){
						// Callback function on alert close
					});
				}, "json");
			} 
		});
	}

	function getLoadImages( rkm_id, target_container ){
		let url 	= 'https://des.saranagroups.com/data/get_offer';
		let data 	= {
			'rkm_id': rkm_id,
			'type': 'get-load-container-images'
		};

		// clear target container
		$(target_container).html('');

		$.get(url, data,function (response, textStatus, jqXHR) {
			if( !response.status ){
				$.messager.alert("Error", response.message, "error", function () {
				});
				return false;
			} else {
				let output 		= '';
				let dropdown 	= '';

				// jika count response.rows == 0 tampilkan bootstrap alert warning
				if( response.rows.length == 0 ){
					output += '<div class="col-lg-12"><div class="alert alert-warning" role="alert">';
					output += 'Tidak ada gambar yang diupload';
					output += '</div></div>';
				}
				
				$.each(response.rows, function (index, row) {
					
					dropdown = '<div class="dropdown" style="position: absolute; top: 0; right: 0; z-index: 1;"><button data-toggle="dropdown" class="dropdown-toggle btn btn-sm remove-uploaded-image" style="background: #0000007a; color: white;" data-image-name="'+row.image_name+'"><i class="fa fa-bars"></i></button><div class="dropdown-menu"><a class="dropdown-item" href="#">Download</a><a class="dropdown-item" href="'+row.image_path+'" target="_blank">Full Gambar</a></div></div>';

					output += '<div class="col-lg-3 p-3">';
					output += '<div class="card" style="border-radius:0px;">';
					output += '<img class="card-img-top" src="'+row.image_path+'" alt="'+row.image_name+'" style="object-fit: cover; object-position: center; height: 200px;">';
					output += '<div class="card-body">';
					output += dropdown;
					output += '<p class="card-text font-weight-bold">'+row.image_name+'</p>';
					output += '<p class="card-text small">Diupload oleh: '+row.upload_username+' <br/> Pada: '+row.create_at+'</p>';
					output += '</div>';
					output += '</div>';
					output += '</div>';
				});
				$(target_container).html(output);
			}

			console.log(response);
		}, "json");
	}

	//MASTER
	$(document).on("click",".show-master",function() {
		get_master();
		$("#header-modal-master").modal("show");
	});

	$(document).on("click",".add-header-master",function() {
		$("#header-modal-master").modal("hide");
		$("#header-modal-add-master").modal("show");
	});

	$(document).on("click",".edit-header-master",function() {
		var t = $(this);
		tmp_id = t.attr("id");
		var title = t.data("title");
		var top = t.data("top");
		var ref = t.data("ref");

		$("#e-title").val(title);
		$("#e-top").val(top);
		$("#e-ref").val(ref).change();

		$("#header-modal-master").modal("hide");
		$("#header-modal-edit-master").modal("show");
	});

	$('#header-modal-add-master,#header-modal-edit-master').on('hidden.bs.modal', function() {
		$("#header-modal-master").modal("show");
	})

	$(document).on("click",".submit-header-add-master",function() {
		var t = $(this);
		var master_tipe = $("#master-tipe").val();
		var master_top 	= $("#master-top").val();
		var sel_ref 	= $("#sel-ref").val();

		if (!sel_ref || !master_tipe || !master_top){
			alert("Semua field harus diisi");
		}
		else {
			t.addClass("disabled");
			$.ajax({
				url: "data/get_offer?type=set-klaim",
				type: "POST",
				data: {
					"sel_ref": sel_ref,
					"master_tipe": master_tipe,
					"master_top": master_top,
					"act": "ins-master"
				},
				success: function(data) {
					var response = JSON.parse(data);

					if (response.status == "failed_ins") {
						alert("Gagal memasukkan data");
					}
					else if (response.status == "ok") {
						alert("Sukses")
						get_master();
						$("#header-modal-add-master").modal("hide");
					}
					t.removeClass("disabled");
				}
			});
		}
	});

	$(document).on("click",".save-header-add-master",function() {
		var t = $(this);
		var master_tipe = $("#e-title").val();
		var master_top 	= $("#e-top").val();
		var sel_ref 	= $("#e-ref").val();

		if (!sel_ref || !master_tipe || !master_top){
			alert("Semua field harus diisi");
		}
		else {
			t.attr("disabled",true);
			$.ajax({
				url: "data/get_offer?type=set-klaim",
				type: "POST",
				data: {
					"id": tmp_id,
					"sel_ref": sel_ref,
					"master_tipe": master_tipe,
					"master_top": master_top,
					"act": "edit-master"
				},
				success: function(data) {
					var response = JSON.parse(data);

					if (response.status == "failed_ins") {
						alert("Gagal update data");
					}
					else if (response.status == "ok") {
						alert("Sukses")
						get_master();
						$("#header-modal-edit-master").modal("hide");
					}
					t.removeAttr("disabled");
				}
			});
		}
	});

	function get_master() {
		$.ajax({
			url: "data/get_offer?type=set-klaim",
			type: "POST",
			data: {"act":"get-master"},
			success: function(data) {
				var response = JSON.parse(data);
				$("#table_master").html(response.out);
			}
		});
	}

	function remove_master(claim_type_id) {
		if (confirm("Hapus?")) {
			$.ajax({
				url: "data/get_offer?type=set-klaim",
				type: "POST",
				data: {"claim_type_id": claim_type_id, "act": "rem-master"},
				success: function(data) {
					var response = JSON.parse(data);

					if (response.status == "failed_update") {
						alert("Gagal menghapus data");
					}
					else if (response.status == "ok") {
						alert("Sukses")
						get_master();
					}
				}
			});
		}
		else {
			return false;  
		}
	}

	function Header_Table() {
	    var period_type 	= $("#filter_period_date").val();
		var period 			= $("#filter_date").val();
		var status 			= $('#filter_status').val();
		let status_barang_rusak = $('#filter_status_barang_rusak').val();
		let status_pakai_kerani = $('#filter_status_pakai_kerani').val();
		let filter_jenis_asuransi = $('#filter_jenis_asuransi').val();

		period 		= moment('01 '+period).format("YYYY-MM");

		var url = "data/get_offer?type=get-klaim&period="+period+"&period_type="+period_type+"&status="+status+"&status_barang_rusak="+status_barang_rusak+"&status_pakai_kerani="+status_pakai_kerani+"&filter_jenis_asuransi="+filter_jenis_asuransi;
		var dg1 = $('#dg1').datagrid({
			rownumbers: true,
			singleSelect: true,
			pagination: true,
			url: url,
			method: 'GET',
			pageSize: 20,
			nowrap: true,
			multiSort: false,
			fitColumns: true,
			remoteFilter: true,
			toolbar: '#tb',
			defaultFilterType: 'label',
			// columns:[[
			// 			{field:'user_kerani_name', title:'user_kerani_name', width:200, align:'center'},
			// 			{field:'rkm_date', title:'rkm_date', width:200, align:'center'},
			// 			{field:'rdetail_item_delivery', title:'rdetail_item_delivery', width:200, align:'center'},
			// 			{field:'rdetail_item_unload', title:'rdetail_item_unload', width:200, align:'center'},
			// 			{field:'rdetail_back_depo', title:'rdetail_back_depo', width:200, align:'center'},
			// 			{field:'city_name', title:'city_name', width:200, align:'center'},
			// 			{field:'agent_name', title:'agent_name', width:200, align:'center'},
			// 			{field:'rdetail_item_status', title:'rdetail_item_status', width:200, align:'center'},
			// 			{field:'rdetail_item_status_at', title:'rdetail_item_status_at', width:200, align:'center'},
			// 			{field:'input_total_claim', title:'input_total_claim', width:200, align:'center'},
			// 			{field:'input_total_discount', title:'input_total_discount', width:200, align:'center'},
			// 			{field:'scheduled_time', title:'scheduled_time', width:200, align:'center'},
			// 			{field:'detail', title:'detail', width:200, align:'center'},
			// 			{field:'option', title:'option', width:400, align:'center'},
			// 		]]
		});

		dg1.datagrid('enableFilter', [
			{ field:'rkm_number', type:'text' },
			{ field:'city_name', type:'text' },
			{ field:'agent_name', type:'text' },
			{ field:'rdetail_item_status', type:'text' },
			{ field:'rdetail_item_delivery', type:'text' },
			{ field:'rdetail_item_unload', type:'text' },
			{ field:'rdetail_back_depo', type:'text' },
			{ field:'user_kerani_name', type:'text' },
			
			{ field:'rkm_date', type:'text' },
			{ field:'rdetail_cont_number', type:'text' },
			{ field:'relation_sender', type:'text' },
			{ field:'relation_receiver', type:'text' }
		]);
	}

	$(document).on("click",".kasus-btn", function(){
		var t = $(this);
		var id = t.attr("id");

		if(confirm("Tutup Kasus Ini?")){
			t.attr("disabled",true);
			t.find("#loading_1").show();

			$.ajax({
				url: "data/get_offer?type=set-klaim",
				type: "POST",
				data: {"id":id,"act":"tutup_kasus"},
				success: function(data){
					var response = JSON.parse(data);

					t.removeAttr("disabled");
					t.find("#loading_1").hide();

					if(response.status == "failed"){
						alert(response.msg);
					}else if(response.status == "ok"){
						Header_Table();
					}
				}
			});
		}
	});

	// STS-1726
	// total claim dan discount
	$(document).ready(function() {
		$('#total_claim, #discount').on('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });

	$('#modal-total-claim').on('shown.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var rkm_number = button.data('rkm');
		var total_claim = button.data('total_claim');
		var discount = button.data('discount');
		
		var modal = $(this);
		modal.find('.modal-title').text('Total Claim - ' + rkm_number);
		modal.find('#id_claim').val(id);
		modal.find('#total_claim').val(total_claim);
		modal.find('#discount').val(discount);
	});

	$('.save-total-claim').on('click', function() {
		var id 			= $('#id_claim').val();
		var total_claim = $('#total_claim').val();
		var discount 	= $('#discount').val();

		console.log(id, total_claim, discount);
		$.ajax({
			url: "data/get_offer",
			type: 'GET',
			dataType: 'json',
			data: {
				'type': 'set_total_claim',
				'id': id,
				'total_claim': total_claim,
				'discount': discount
			},
			success: function(response) {
				if (response.status == false) {
				alert(response.message);
				$('#modal-total-claim').modal('hide');
			}else{
				alert(response.message);
				$('#modal-total-claim').modal('hide');
				Header_Table();
				}
			}
		});
	});
</script>


		</div>

		<footer class="footer" style="background-color: #2771a6">
	        <span class="text-light">
	        	<center>
	        		
	<center>
		Copyright &COPY; 2022 - 2024 PT. Daya Eka Samudera Jakarta. Powered by <a href="http://kloudmi.com" target="blank" style="" > <img src="assets/image/website/kloudmi.png" alt="kloudmi" width="70px"> </a>
	</center>
					</center>

        	</span>
    	</footer>
		<script>
			
		</script>

		<div class="modal fade" id="modal_page_info" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Keterangan Halaman</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<i class="fa fa-spinner fa-spin"></i>loading .... 
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							<i class="fa fa-times"></i>
							Tutup
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src="assets/bs/js/popper.min.js"></script>
		<script src="assets/bs/js/bootstrap.min.js"></script>

		

		<!-- upload -->
		<!-- <script src="assets/upload/js/fileinput.min.js"></script> -->

		<!-- select 2 js -->
		<script src="assets/select2/js/select2.full.min.js"></script>


		<!-- number -->
		<script src="assets/js/jquery.number.min.js"></script>

		<!-- chart -->
		<!-- <script src="assets/chart/Chart.js"></script> -->

		<!-- ini diberi version agar memaksa semua browser merefresh js jika ada update jsnya -->
		<script src="assets/js/app.js?version=1.0.0"></script>
		<script type="text/javascript">
			// NOTIFIKASI ORDER MASUK
			$(document).ready(function() {
				var check_access_notif = 0;
				if(check_access_notif > 0){
					countdown();
					getNewOrder();
				}
			});
			
			function get_modal_page_info( id ) {
				const modal 	= $('#modal_page_info');
				const url 		= 'https://des.saranagroups.com/data/get_master';
				$.get(url, {
					id: id,
					type: 'master_page_info'
				},function (response, textStatus, jqXHR) {
					console.log(response);	
					if( response.result.content ) {
						modal.find('.modal-body').html(response.result.content);
						modal.modal('show');						
					}								
				}, "json");
			}

			function playNotificationSound() {
				var audio = document.getElementById("newOrderSound");
				audio.play();
			}

			function checkNewOrder() {
				let executed = false;
				$.ajax({
					url: 'data/get_order?type=get_new_order',
					type: 'GET',
					dataType: 'JSON',
					success: function(response) {
						if (response.jumlah_order > 0) {
							$('.badge-number').text(response.jumlah_order);
							$('.badge-number-2').text(response.jumlah_order);
							if (needsNotificationSound()) {
								$(document).on('click', function() {
									if (!executed) {
										playNotificationSound();
										executed = true;
									}
								});
							} else {
									playNotificationSound();
							}
						}

						let output = '';
						$.each(response.rows,function(index,value){
							output += `
							<li class="notification-item">
								<div class="icon-notifications border border-info">
									<i class="fa fa-exclamation text-info mr-1" aria-hidden="true"></i>
								</div>
								<a href="?page=request-order-detail&id=`+value.id+`">
								<div>
									<h4>`+value.number+`</h4>
									<p>`+value.loc_sender+` - `+value.tujuan+`</p>
									<p>`+moment(value.tanggal_order).fromNow()+`</p>
								</div>
								</a>
							</li>
							`;
						});
						$('.notification-view').html(output);
					}
				});
			}

			// setInterval(checkNewOrder, 5 * 60 * 1000);
			// setInterval(checkNewOrder, 5000);

			function countdown(){
				var limit = 5;
				var endTime = localStorage.getItem('endTime');
				if (!endTime) {
					var startTime = moment();
					endTime = moment(startTime).add(limit, 'minutes');
					localStorage.setItem('endTime', endTime);
				} else {
					endTime = moment(endTime);
				}

				var countdownInterval = setInterval(function() {
					var now = moment();
					var diff = moment.duration(endTime.diff(now));	
					// Format durasi menjadi menit:detik
					// // Menampilkan countdown di dalam div dengan id 'countdown'
					// var formattedTime = diff.minutes() + ":" + diff.seconds();	
					// document.getElementById('countdown').innerHTML = formattedTime;

					if (diff <= 0) {
						endTime = moment(startTime).add(limit, 'minutes');
						localStorage.setItem('endTime', endTime);
						console.log('cek order');
						checkNewOrder()
					}
				}, 1000);
			}

			function getNewOrder(){
				$.ajax({
					url: 'data/get_order?type=get_new_order',
					type: 'GET',
					dataType: 'JSON',
					success: function(response) {
						if (response.jumlah_order > 0) {
							let output = '';
							$('.badge-number').text(response.jumlah_order);
							$('.badge-number-2').text(response.jumlah_order);							
							$.each(response.rows,function(index,value){
								output += `
								<li class="notification-item">
									<div class="icon-notifications border border-info">
										<i class="fa fa-exclamation text-info mr-1" aria-hidden="true"></i>
									</div>
									<a href="?page=request-order-detail&id=`+value.id+`">
									<div>
										<h4>`+value.number+`</h4>
										<p>`+value.loc_sender+` - `+value.tujuan+`</p>
										<p>`+moment(value.tanggal_order).fromNow()+`</p>
									</div>
									</a>
								</li>
								`;
							});
							$('.notification-view').html(output);
						}
					}
				});
			}

			function needsNotificationSound() {
				return document.hasFocus();
			}

			function getDivDimenstions( selector ) {
			    var $element = $( selector );
			    var offset = $element.offset();
			    var width = $element.width();
			    var height = $element.height();
			    return { top: offset.top, left: offset.left, width: width, height: height };
			}

			function adjustDatagridWidth( selector_container = '.container-fluid' ){
				// get width .container-fluid
				const container_width = getDivDimenstions( selector_container ).width;
				$('.panell').find('table .datagrid-htable').css('width', container_width);
			}


			$(document).ready(function(){
			  	$(".select2").select2();
			  	
			  	$(".select2_multiple").select2({
					tags: true,
					tokenSeparators: [',', ' ']
				})

			  	$(".numeric").keypress(function() {
				    return (/\d/.test(String.fromCharCode(event.which) ))
				})

				$(".float").on("keypress keyup blur",function (event) {
                    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                           event.preventDefault();
                        }
                });

                $('.month_picker').Monthpicker({

					// default values
					// format: mm/yyyy
					minYear: null,
					maxYear: null,
					minValue: null,
					maxValue: null,

					// i18n
					monthLabels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jui", "Aug", "Sep", "Oct", "Nov", "Dec"],

					// Callback events
					onSelect: function() { 
						// return;
						var value = $('.month_picker').val();
						$('.month_picker').val(value).change();

					},
					onClose: function() { return; }

				});


                // FLAT PICKER 
                $(".flatpicker_fy").flatpickr({
					dateFormat: "F Y",
					plugins: [new monthSelectPlugin({shorthand: false, dateFormat: "F Y", altFormat: "M Y"})],
					disableMobile: 'true',
				});
                
                
                var refreshSn = function ()
                {
                    var time = 300000; // in ms

                    setTimeout(
                        function ()
                        {
                            $.ajax({
                                url: 'https://des.saranagroups.com/core/refresh_session',
                                cache: false,
                                dataType: 'JSON',
                                
                                success: function(response){
                                    
                                    refreshSn();
                                    
                                    if( response.status == false ) {
                                        alert(response.message);
                                        window.location.href = "https://des.saranagroups.com/login";
                                    }
                                    
                                }
                                
                            });
                        },
                        time
                    );
                };

                // Call in page
                refreshSn();	
				dom_content_load_state = 1;		  	
			});			
			
			$(document).on("click",".dropdown-menu a.dropdown-toggle",function(e){
			    if (!$(this).next().hasClass('show')) {
			      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			    }
			    var $subMenu = $(this).next(".dropdown-menu");
			    $subMenu.toggleClass('show');


			    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
			      $('.dropdown-submenu .show').removeClass("show");
			    });

			    return false;
			});
			
    		$('.number').number( true, 0 ); 
    		$('.number_2').number( true, 2 ); 

	        $('.datetime').datetimepicker({
	        	uiLibrary: 'bootstrap4',
	        	size: 'small',
	        	format: 'dd-mm-yyyy HH:MM',
	        	footer: true,
	        	modal :true
	        });

	        // $('.datepicker').datepicker({
	        //     uiLibrary: 'bootstrap4',
	        //     format: 'dd-mm-yyyy'
	        // });

	        $('.datepicker').each(function() {
		  		$(this).datepicker({
		            uiLibrary: 'bootstrap4',
		            format: 'dd-mm-yyyy'
				});
			});

			$('.timepicker').each(function() {
		  		$(this).timepicker({
		            uiLibrary: 'bootstrap4',
		        	footer: true
				});
			});


            $('.datepicker2').each(function() {
                $(this).datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'dd-mm-yyyy',
                });
            });

            $('.datepicker3').each(function() {
				var today, datepicker;
        		today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $(this).datepicker({
                    uiLibrary: 'bootstrap4',
                    format: 'dd-mm-yyyy',
					minDate: today
                });
            });


	        $('.datepicker_tb').datepicker({
	            uiLibrary: 'bootstrap4',
	            format: 'dd-mm-yyyy',
	            showRightIcon: false,
	        });

		   	function btn_confirm(param = '')
		    {
		    	var text_param = 'Hapus data ini?';
		    	if ( param != '' ) {
		    		text_param = param;
		    	}

		        if(confirm(text_param)) {
		            return true;
		        }
		        else {
		            return false;  
		        } 
		   	}

		   	function to_uppercase(param) {
                param.value = param.value.toUpperCase();
            }

            // masked input 
            jQuery(function($){
                $(".masked_fp").mask("999.999-99.");
            });

            function convert_to_number(param) {
				$('#' + param.id).number(true, 0)
			}
    		   
    		function Toast(cond,message){
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-bottom-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "500",
					"hideDuration": "300",
					"timeOut": "2000",
					"extendedTimeOut": "500",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}

				if(cond == "success"){
					toastr.success(message);
				}else if(cond == "warning"){
					toastr.warning(message);
				}else if(cond == "error"){
					toastr.error(message);
				}
    		}
    	</script>
	
	</body>
	
	</html>

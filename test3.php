<?php 
    include 'template/header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container">
		<br>		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nama</th>
					<th>Umur</th>
				</tr>
			</thead>
			<tbody>
            <?php 
                $batas = 10;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman - 1) * $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                // Query to get total count of rows
                $sqlCount = "SELECT COUNT(*) AS jumlah_data FROM tbSOP";
                $stmt = $conn->query($sqlCount);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $jumlah_data = $row['jumlah_data'];
                $total_halaman = ceil($jumlah_data / $batas);

                // Query to fetch paginated data
                $sql = "SELECT NoSOP, NamaSOP, DivisiMain FROM tbSOP ORDER BY NoSOP OFFSET :halaman_awal ROWS FETCH NEXT :batas ROWS ONLY";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':halaman_awal', $halaman_awal, PDO::PARAM_INT);
                $stmt->bindParam(':batas', $batas, PDO::PARAM_INT);
                $stmt->execute();

                $nomor = $halaman_awal + 1;
                while ($d = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($d['NoSOP']); ?></td>
                        <td><?php echo htmlspecialchars($d['NamaSOP']); ?></td>
                        <td><?php echo htmlspecialchars($d['DivisiMain']); ?></td>
                    </tr>
                    <?php
                }
                ?>

			</tbody>
		</table>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x = 1; $x <= $total_halaman; $x++) { ?> 
                    <li class="page-item" id="page-<?php echo $x; ?>">
                        <a class="page-link" href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a>
                    </li>
                <?php } ?>              
                <li class="page-item">
                    <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>
	</div>

    <script>
        // JavaScript to highlight the current page
        document.addEventListener("DOMContentLoaded", function() {
            // Get the current page from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const currentPage = urlParams.get('halaman') || 1;  // Default to page 1 if no parameter
            
            // Highlight the current page link
            const currentPageItem = document.getElementById(`page-${currentPage}`);
            if (currentPageItem) {
                currentPageItem.classList.add("active");
            }
        });
    </script>
</body>
</html>
<footer class="main-footer">
	<center>
		<style>
			#btn-back-to-top {
				position: fixed;
				bottom: 10px;
				right: 10px;
				display: none;
			}
		</style>
		<p class="text-center">
			<?php
			$sql = "select count(id) as jumlah from si_visitor where DATE(tanggal) = CURDATE()";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$jumlahharini = $row['jumlah'];

			$sql = "select count(id) as jumlah from si_visitor where MONTH(tanggal) = MONTH(CURDATE()) and  YEAR(tanggal) = YEAR(CURDATE())";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$jumlahbulanini = $row['jumlah'];

			$sql = "select count(id) as jumlah from si_visitor where YEAR(tanggal) = YEAR(CURDATE())";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$jumlahtahunini = $row['jumlah'];

			$sql = "select count(id) as jumlah from si_visitor";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$jumlahtotal = $row['jumlah'];

			?>
			Pengunjung Hari ini : <?php echo $jumlahharini; ?>, Pengunjung Bulan Ini : <?php echo $jumlahbulanini; ?>, Pengunjung Tahun Ini : <?php echo $jumlahtahunini; ?>, Jumlah Total Pengunjung : <?php echo $jumlahtotal; ?>
		</p>
		<p class="text-center">Copyright &copy; <script>
				document.write(new Date().getFullYear());
			</script> <a href="https://dpupr.blorakab.go.id/" target="_blank">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Blora</a></strong> All rights
			reserved.</p>
		<!-- Back to top button -->
		<button type="button" class="btn btn-primary btn-floating btn-sm" id="btn-back-to-top" data-toggle="tooltip" data-placement="top" title="Kembali Ke Atas">
			<i class="fa fa-sort-up"></i>
		</button>
	</center>
</footer>
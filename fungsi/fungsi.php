<?php  

	function tanggal_indo($tanggal) {
		$bulan = array(1=>'Januari', 
						  'Februari',
						  'Maret',
						  'April',
						  'Mei',
						  'Juni',
						  'Juli',
						  'Agustus',
						  'September',
						  'Oktober',
						  'November',
						  'Desember'
				);

		$split = explode('-', $tanggal);
		$tanggal_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

		return $tanggal_indo;
	}

	


?>
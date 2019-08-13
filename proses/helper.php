<?php 

	define("BASE_URL", "http://localhost:8080/Tugas_Akhir/");

	function rupiah($nilai = 0){
		$string = "RP." .number_format($nilai);
		return $string;
	}

 ?>
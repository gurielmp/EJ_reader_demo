<?php 

	$arr_bank = [];
	$arr_id = [];
	$arr_tanggal = [];
	$arr_jam = [];
	$arr_noRecord = [];
	$arr_transaksi = [];
	$arr_nilai = [];

	$ejString = (str_replace(' ', '', file_get_contents('ej.txt')));

	function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start)+9;
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}
	$start = 'PENARIKANTABUNGAN';
	$end = 'SALDO';
	$raw_nilai = get_string_between($ejString, $start, $end);
	$nilai = (str_replace('.', '', $raw_nilai));

	$find_tr = strpos($ejString, $start);

		while ( $find_tr !== false) {
			$get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
			array_push($arr_nilai, $get_nilai);
			$get_total_nilai += $get_nilai;
			// echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
			// echo "<br>";
			$find_tr = strpos($ejString, $start);
			$ejString = substr($ejString, $find_tr +8);
		}
		// print_r ($arr_nilai);
		echo $get_total_nilai;


	// var_dump (strpos($ejString, 'JUMLAHRP'));
	// echo get_string_between($ejString, $start, $end);
	
	// var_dump (strpos($ejString, $start));
	// echo $find_tr;
	// echo substr($ejString, $find_tr +8);

// $ejString = (str_replace(' ', '', file_get_contents('ej.txt')));

// 	function get_string_between($string, $start, $end){
// 		$string = ' ' . $string;
// 		$ini = strpos($string, $start);
//     if ($ini == 0) return '';
//     $ini += strlen($start);
//     $len = strpos($string, $end, $ini) - $ini;
//     return substr($string, $ini, $len);
// 	}
// 	$start = 'JUMLAHRP';
// 		$end = 'SALDO';
// 		$parsed = get_string_between($ejString, $start, $end);
// 		$vpenarikan = (str_replace('.', '', $parsed));
// 		echo $vpenarikan;

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>BANK</th>
			<th>ID</th>
			<th>TANGGAL</th>
			<th>JAM</th>
			<th>NO RECORD</th>
			<th>TRANSAKSI</th>
			<th>NILAI</th>
		</tr>
		<?php while ( <= 10) {
			# code...
		} ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>></td>
		</tr>
	</table>
</body>
</html>
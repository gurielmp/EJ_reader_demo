<?php 
  $arr_bank = [];
	$arr_id = [];
	$arr_tanggal = [];
	$arr_jam = [];
	$arr_noRecord = [];
	$arr_transaksi = [];
	$arr_nilai = [];
  $test = "bangkeee";
  
  $ej_file = file_get_contents('ej.txt');
	$ejString = (str_replace(' ', '', $ej_file));

	function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start)+9;
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}

	$start = 'TRANSACTIONEND';
	$end = 'SALDO';
	$raw_nilai = get_string_between($ejString, $start, $end);
	$nilai = (str_replace('.', '', $raw_nilai));

	$find_tr = strpos($ejString, $start);
  $get_total_pengisian = 100000000 * 4;
// echo (str_replace('.', '', get_string_between($ejString, "TRANSACTIONstart", "TRANSACTIONEND")));
	while ( $find_tr !== false) {
		$get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
		array_push($arr_nilai, $get_nilai);
		$get_total_nilai += $get_nilai;
		// echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
		// echo "<br>";
		$find_tr = strpos($ejString, $start);
		$ejString = substr($ejString, $find_tr +8);
	}
  $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;
  // echo "$arr_nilai[2]";
  echo "<br>";
  


  //GET NO.RECORD
  $ejString_noRecord = $ej_file;
  // echo $ejString_noRecord;

  function get_string_between_transaction($string, $start, $end){
	$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start)-20;
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}
	function get_transaction (){
		$noRecord = (str
		while ( $find_tr_noRecord !== false) {
			$get_noRecord = (str_replace('.', '', get_string_between_transaction($ejString_noRecord, 'TRANSACTION start', 'TRANSACTION END')));
			array_push($arr_noRecord, $get_noRecord);
			// echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
			// echo "<br>";
			$find_tr_noRecord = strpos($ejString_noRecord, 'TRANSACTION start');
			$ejString_noRecord = substr($ejString_noRecord, $find_tr_noRecord +8);
		} 
	}
	$i=0;
	while($i<20){
	echo "$arr_noRecord[$i]". '<br> <br>';
	$i++;
}






		// print_r ($arr_nilai);
//		echo "<h1> Rp." . $get_total_nilai . "</h1>";
?>
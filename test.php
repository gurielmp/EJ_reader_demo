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
  $ej_transaction = $ej_file;
  // echo $ej_transaction;

  function get_string_between_transaction($string, $start, $end){
	$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start)-20;
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}

	// SEPARATING EACH TRANSACTION
	function get_transaction ($ej_transaction){
		$find_transaction = strpos($ej_transaction, 'TRANSACTION start');
		$arr_transaction = [];
		while ( $find_transaction !== false) {
			$get_transaction = get_string_between_transaction($ej_transaction, 'TRANSACTION start', 'TRANSACTION END');
			array_push($arr_transaction, $get_transaction);
			$find_transaction = strpos($ej_transaction, 'TRANSACTION start');
			$ej_transaction = substr($ej_transaction, $find_transaction +8);
		} 
		return $arr_transaction;
		// 
	}
	$transaction = (get_transaction($ej_transaction));

	// function find_cash_transaction(){
	// 	$cash_transaction = [];
	// 	$iq = 0;
	// 	while ($transaction[$iq] !== null) {
	// 		if(strpos($transaction[$iq], "CASH TAKEN") !== false){
	// 				array_push($cash_transaction, $transaction[$iq]);
	// 		}$iq++;
	// 	}return $cash_transaction;
	// }

		$cash_transaction = [];
		$iq = 0;
		while ($transaction[$iq] !== null) {
			if(strpos($transaction[$iq], "CASH TAKEN") !== false){
					array_push($cash_transaction, $transaction[$iq]);
			}$iq++;
		}
		// var_dump($cash_transaction);
		echo $cash_transaction[0] . '<br> <br>' . $cash_transaction[1];

			// print_r ($a[0]);
			// echo $b;
			// var_dump ($cash_transaction);
			//echo $cash_transaction[0];
			

	// function find_cash_transaction(){
	// 	$i= 0;
	// 	$cash_transaction = [];
	// 	while($transaction[$i] !== null){
	// 		if(strpos($transaction[$i], "CASH TAKEN") !== false){
	// 			echo "string";
	// 			array_push($cash_transaction, $transaction[$i]);
	// 			$i++;
	// 		}else {
	// 			echo "asdd";
	// 			$i++;
	// 		}
	// 	}var_dump($cash_transaction);
	// 	return $cash_transaction;
	// } find_cash_transaction();
	


// 	$i=0;
// 	while($i<20){
// 	echo "$transaction[$i]". '<br> <br>';
// 	$i++;
// }






		// print_r ($arr_nilai);
//		echo "<h1> Rp." . $get_total_nilai . "</h1>";
?>
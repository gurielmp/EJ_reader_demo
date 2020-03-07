<?php 
  $arr_bank = [];
	$arr_id = [];
	$arr_tanggal = [];
	$arr_jam = [];
	$arr_noRecord = [];
	$arr_transaksi = [];
	$arr_nilai = [];
  $test = "bangkeee";
  
  $ej_file = file_get_contents('ej2.txt');
	$ejString = (str_replace(' ', '', $ej_file));

	function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start)+9;
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}

	// $start = 'TRANSACTIONEND';
	// $end = 'SALDO';
	// $raw_nilai = get_string_between($ejString, $start, $end);
	// $nilai = (str_replace('.', '', $raw_nilai));

	// $find_tr = strpos($ejString, $start);
 //  $get_total_pengisian = 100000000 * 4;
	// while ( $find_tr !== false) {
	// 	$get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
	// 	array_push($arr_nilai, $get_nilai);
	// 	$get_total_nilai += $get_nilai;
	// 	$find_tr = strpos($ejString, $start);
	// 	$ejString = substr($ejString, $find_tr +8);
	// }
 //  $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;
 //  echo "<br>";
  


  //GET NO.RECORD
  $ej_transaction = $ej_file;
  // echo $ej_transaction;

  function get_string_between_transaction($string, $start, $end){
	$ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
	}

	// SEPARATING EACH TRANSACTION
	function get_transaction ($ej_transaction){
		$find_transaction = strpos($ej_transaction, 'CASH REQUEST: ');
		$arr_transaction = [];
		while ( $find_transaction !== false) {
			$get_transaction = get_string_between_transaction($ej_transaction, 'CASH REQUEST: ', 'CASH TAKEN');
			array_push($arr_transaction, $get_transaction);
			$find_transaction = strpos($ej_transaction, 'CASH REQUEST: ');
			$ej_transaction = substr($ej_transaction, $find_transaction +1);
		} 
		return $arr_transaction;
		// 
	}
	$transaction = (get_transaction($ej_transaction));

//=======================================================

	$i = 0;
	while($transaction[$i] !== null){
		$ns_transaction = (str_replace(' ', '', $transaction[$i]));
		$get_nilai = get_string_between_transaction($ns_transaction, 'JUMLAHRP' , 'SALDO');
		$get_noRecord = get_string_between_transaction($ns_transaction, 'NO.REKORD' , 'PENARIKAN');
		$get_jam = substr($transaction[$i],8,9);
		array_push($arr_nilai, (str_replace('.', '', $get_nilai)));
		array_push($arr_noRecord, $get_noRecord);
		array_push($arr_jam, $get_jam);
		$i++;
	}
	$pengisian = (str_replace('.', '', get_string_between_transaction($ejString, 'AWL' , 'KEL')));
	echo $pengisian;

// $it = 0;
// 	while ( $transaction[$it] !== null) {
// 		echo $transaction[$it] . '<br> <br>';
// 		echo $arr_nilai[$it] . '<br> <br>';
// 		echo $arr_noRecord[$it] . '<br> <br>';
// 		echo(rand(100000,999999)). '<br> <br>';
// 		echo $arr_jam[$it]. '<br> <br>';
// 		$it++;
// 	}



//=========================================
	// function find_cash_transaction(){
	// 	$cash_transaction = [];
	// 	$iq = 0;
	// 	while ($transaction[$iq] !== null) {
	// 		if(strpos($transaction[$iq], "CASH TAKEN") !== false){
	// 				array_push($cash_transaction, $transaction[$iq]);
	// 		}$iq++;
	// 	}return $cash_transaction;
	// }

		// $cash_transaction = [];
		// $iq = 0;
		// while ($transaction[$iq] !== null) {
		// 	if(strpos($transaction[$iq], "CASH PRESENTED") !== false){
		// 			array_push($cash_transaction, $transaction[$iq]);
		// 	}$iq++;
		// }
	//========================================

		

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
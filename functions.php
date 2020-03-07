<?php 
//   $arr_bank = [];
// 	$arr_id = [];
// 	$arr_tanggal = [];
// 	$arr_jam = [];
// 	$arr_noRecord = [];
// 	$arr_transaksi = [];
// 	$arr_nilai = [];
  
//   $ej_file = file_get_contents('ej2.txt');
// 	$ejString = (str_replace(' ', '', file_get_contents('ej2.txt')));

// 	function get_string_between($string, $start, $end){
// 		$ini = strpos($string, $start);
//     if ($ini == 0) return '';
//     $ini += strlen($start)+9;
//     $len = strpos($string, $end, $ini) - $ini;
//     return substr($string, $ini, $len);
// 	}
// 	$start = 'PENARIKANTABUNGAN';
// 	$end = 'SALDO';
// 	$raw_nilai = get_string_between($ejString, $start, $end);
// 	$nilai = (str_replace('.', '', $raw_nilai));

// 	$find_tr = strpos($ejString, $start);
//   $get_total_pengisian = 100000000 * 4;

// 		while ( $find_tr !== false) {
// 			$get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
// 			array_push($arr_nilai, $get_nilai);
// 			$get_total_nilai += $get_nilai;
// 			// echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
// 			// echo "<br>";
// 			$find_tr = strpos($ejString, $start);
// 			$ejString = substr($ejString, $find_tr +8);
// 		}
//     while ( $find_tr !== false) {
//       $get_noRecord = (str_replace('.', '', get_string_between($ejString, "NO.REKORD", "PENARIKANTABUNGAN")));
//       array_push($arr_noRecord, $get_noRecord);
//       // echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
//       // echo "<br>";
//       $find_tr = strpos($ejString, "NO.REKORD");
//       $ejString = substr($ejString, $find_tr +8);
//     }
//   $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;
// 		// print_r ($arr_nilai);
// //		echo "<h1> Rp." . $get_total_nilai . "</h1>";
//=========================================================================
  $arr_bank = [];
  $arr_id = [];
  $arr_tanggal = [];
  $arr_jam = [];
  $arr_noRecord = [];
  $arr_transaksi = [];
  $arr_nilai = [];
  $arr_id = [];
  
  $ej_file = file_get_contents('ej2.txt');
  $ejString = (str_replace(' ', '', $ej_file));

  function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini -3;
    return substr($string, $ini, $len);
  }

  // $start = 'TRANSACTIONEND';
  // $end = 'SALDO';
  // $raw_nilai = get_string_between($ejString, $start, $end);
  // $nilai = (str_replace('.', '', $raw_nilai));

  // $find_tr = strpos($ejString, $start);
 //  $get_total_pengisian = 100000000 * 4;
  // while ( $find_tr !== false) {
  //  $get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
  //  array_push($arr_nilai, $get_nilai);
  //  $get_total_nilai += $get_nilai;
  //  $find_tr = strpos($ejString, $start);
  //  $ejString = substr($ejString, $find_tr +8);
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
    $get_tanggal = get_string_between($ns_transaction, 'PRESENTED' , 'S1BTEB12KK');
    $get_jam = substr($transaction[$i],8,9);
    $get_id = rand(100000,999999);
    $get_total_nilai += (str_replace('.', '', $get_nilai));
    array_push($arr_nilai, (str_replace('.', '', $get_nilai)));
    array_push($arr_noRecord, $get_noRecord);
    array_push($arr_tanggal, $get_tanggal);
    array_push($arr_jam, $get_jam);
    array_push($arr_id, $get_id);
    $i++;
  }
  $get_total_pengisian = 100000000 * 4;
  $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;
// $it = 0;
//   while ( $transaction[$it] !== null) {
//     echo $transaction[$it] . '<br> <br>';
//     echo $arr_nilai[$it] . '<br> <br>';
//     echo $arr_noRecord[$it] . '<br> <br>';
//     echo(rand(100000,999999)). '<br> <br>';
//     echo $arr_jam[$it]. '<br> <br>';
//     $it++;
//   }



?>
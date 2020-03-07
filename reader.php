<!doctype html>
<html lang="en">

<head>
  <style>
    div.ex1 {
      background-color: none;
      width: auto;
      height: 655px;
      overflow: scroll;
    }

    div.ex2 {
      background-color: none;
      width: auto;
      height: 250px;
      overflow: scroll;
    }

    div.ex3 {
      background-color: none;
      width: auto;
      height: 150px;
      overflow: scroll;
    }
  </style>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>EJ Reader</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

  <!--  Dashboard CSS    -->
  <link href="assets/css/dashboard.css" rel="stylesheet" />
  <link href="assets/css/button.css" rel="stylesheet" />


  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
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
	$ejString = (str_replace(' ', '', file_get_contents('ej2.txt')));

	function get_string_between($string, $start, $end){
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
  $get_total_pengisian = 100000000 * 4;

		while ( $find_tr !== false) {
			$get_nilai = (str_replace('.', '', get_string_between($ejString, $start, $end)));
			array_push($arr_nilai, $get_nilai);
			$get_total_nilai += $get_nilai;
			// echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
			// echo "<br>";
			$find_tr = strpos($ejString, $start);
			$ejString = substr($ejString, $find_tr +8);
		}
    while ( $find_tr !== false) {
      $get_noRecord = (str_replace('.', '', get_string_between($ejString, "NO.REKORD", "PENARIKANTABUNGAN")));
      array_push($arr_noRecord, $get_noRecord);
      // echo (str_replace('.', '', get_string_between($ejString, $start, $end)));
      // echo "<br>";
      $find_tr = strpos($ejString, "NO.REKORD");
      $ejString = substr($ejString, $find_tr +8);
    }
  $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;
		// print_r ($arr_nilai);
//		echo "<h1> Rp." . $get_total_nilai . "</h1>";
?>

  <div class="wrapper">
    <div class="sidebar" data-color="azure">
      <div class="sidebar-wrapper">
        <div class="logo">
          <img src="assets/img/avatar.svg" width="20%" style="display: block; margin: auto;">
          <a href="#" class="simple-text">
            WELCOME
          </a>
        </div>

        <ul class="nav">
          <li>
            <a href="list.php">
              <i class="pe-7s-note2"></i>
              <p>EJ List</p>
            </a>
          </li>
          <li class="active">
            <a href="reader.php">
              <i class="pe-7s-news-paper"></i>
              <p>EJ Reader</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">EJ Reader</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="">
                  Your Name
                </a>
              </li>
              <li>
                <a href="index.php">
                  Log out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="container-fluid">
            <form class="col-md-7" action="#">
              <input id="uploadFile" placeholder="No File Selection" disabled="disabled" />
              <div class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input id="uploadBtn" type="file" class="upload" />
              </div>
              <button class="btn btn-primary" type="submit">Proses file</button>
            </form>
            <form class="col-md-3" action="#">
              <button type="submit" class="btn-reader">Find Cash Clear</button>
            </form>
            <form class="col-md-2" action="#">
              <button type="submit" class="btn-reader">Save</button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="container-fluid">
            <div class="col-md-5">
              <div class="col-md-5 card container-fluid ex1">
               <?php echo $ej_file ?>
              </div>
            </div>
            <div class="col-md-7">
              <div class="content table-responsive card ex2">
                <table class="table table-hover table-striped">
                  <thead>
                    <th>No</th>
                    <th>Bank</th>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>No Record</th>
                    <th>Transaksi</th>
                    <th>Nilai</th>
                  </thead>
                  <tbody>
                   <?php 
                    $i = 0;
                    $no = 1;
                    while($arr_nilai[$i] !== null){
                      echo "<tr>
                      <td>".$no."</td>
                      <td>BNI</td>
                      <td>123456</td>
                      <td>01/01/2001</td>
                      <td>01:00</td>
                      <td>".$arr_noRecord[$i]."</td>
                      <td>PENARIKAN</td>
                      <td>".$arr_nilai[$i]."</td>
                    </tr>";
                      $i++; 
                      $no++;
                    }
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="content table-responsive card ex3">
                <table class="table table-hover table-striped">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Total Pengisian : <?php echo "<span>". $get_total_pengisian ."</span>" ?></td>
                    </tr>
                    <tr>
                      <td>Total Penarikan : <?php echo "<span>". $get_total_nilai ."</span>" ?></td>
                    </tr>
                    <tr>
                      <td>Sisa Restosking : <?php echo "<span>". $get_sisa_restocking ."</span>" ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <h4>Transaksi Gagal</h4>
              <div class="content table-responsive card ex3">
                <table class="table table-hover table-striped">
                  <thead>
                    <th>No</th>
                    <th>Bank</th>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>No Record</th>
                    <th>Transaksi</th>
                    <th>Nilai</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Mandiri</td>
                      <td>123456</td>
                      <td>01/01/2001</td>
                      <td>01:00</td>
                      <td>1234</td>
                      <td>Pengisian</td>
                      <td>1234567890</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <p class="copyright pull-right">
            &copy; 2020 <a href="#">EJ Reader</a>,
          </p>
        </div>
      </footer>


    </div>
  </div>
</body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</html>
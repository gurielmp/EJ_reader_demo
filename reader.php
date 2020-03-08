<?php 

    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }

    if(isset($_POST['delete']))
    {
        unlink("uploaded_files/ejdemo.txt");
    }

  $arr_bank = [];
  $arr_id = [];
  $arr_tanggal = [];
  $arr_jam = [];
  $arr_noRecord = [];
  $arr_transaksi = [];
  $arr_nilai = [];
  $arr_id = [];
  
  $ej_file = file_get_contents('uploaded_files/ejdemo.txt');
  $ejString = (str_replace(' ', '', $ej_file));

  function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini -3;
    return substr($string, $ini, $len);
  }

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
      $get_transaction = get_string_between_transaction($ej_transaction, 'CASH REQUEST: ', 'TRANSACTION END');
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
    if($get_nilai == null){
      $get_nilai = get_string_between_transaction($ns_transaction, 'AMOUNTRP' , 'BALANCE');
    };
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
  $pengisian = (str_replace('.', '', get_string_between_transaction($ejString, 'AWL' , 'KEL')));
  $get_total_pengisian = $pengisian * 3;
  $get_sisa_restocking = $get_total_pengisian - $get_total_nilai;

?>

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
          <li>
            <a href="monitoring.php">
              <i class="pe-7s-monitor"></i>
              <p>EJ Monitoring</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">EJ READER</a>
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
            <form class="col-md-5" method="POST" action="upload.php" enctype="multipart/form-data">
              <input id="uploadFile" placeholder="No File Selection" disabled="disabled" />
              <div class="fileUpload btn btn-primary">
                <span>Open</span>
                <input id="uploadBtn" type="file" name="uploadedFile"  class="upload" />
              </div>
              <button class="btn btn-primary" type="submit" name="uploadBtn" value="Upload">Proses file</button>
            </form>
            <form class="col-md-2" method="POST">
              <button type="submit" name="delete" class="fileUpload btn btn-primary">Reset</button>
            </form>
            <form class="col-md-2" action="excel.php">
              <button type="submit" class="fileUpload btn btn-primary">Download .xslx file</button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="container-fluid">
            <div class="col-md-5">
              <div class="col-md-5 card container-fluid ex1" style="width: 100%;">
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
                    while($arr_nilai[$no] !== null){
                      echo "<tr>
                      <td>".$no."</td>
                      <td>BNI</td>
                      <td>".$arr_id[$i]."</td>
                      <td>23/01/20</td>
                      <td>".$arr_jam[$i]."</td>
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
                      <td>Sisa Restocking : <?php echo "<span>". $get_sisa_restocking ."</span>" ?></td>
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
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
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
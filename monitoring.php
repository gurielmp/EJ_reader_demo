<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Monitoring</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Dashboard CSS    -->
    <link href="assets/css/dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" >      
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
            <li>
                <a href="reader.php">
                <i class="pe-7s-news-paper"></i>
                <p>EJ Reader</p>
                </a>
            </li>
            <li class="active">
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
                    <a class="navbar-brand" href="">EJ Monitoring</a>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Electronic Journal Monitoring</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>NO</th>
                                        <th>ATM ID</th>
                                        <th>LOKASI</th>
                                        <th>TXN (ADMIN)</th>
                                    	<th>SISA (ADMIN)</th>
                                    	<th>SISA (BILL COUNT)</th>
                                    	<th>SISA FISIK</th>
                                        <th>SELISIH (ADMIN)</th>
                                    	<th>SELISIH (BILL COUNT)</th>
                                        <th>SELISIH ADMIN VS FISIK</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                        	<td>S1AMGDA008</td>
                                        	<td>DEPOK TWON SQUARE</td>
                                        	<td>381.500.000</td>
                                        	<td>118.500.000</td>
                                            <td>118.500.000</td>
                                            <td>118.500.000</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>NIHIL</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>S1GUID10SX</td>
                                            <td>FAK.MIPA UI DEPOK</td>
                                            <td>228.550.000</td>
                                            <td>71.450.000</td>
                                            <td>71.450.000</td>
                                            <td>72.700.000</td>
                                            <td>1.250.000</td>
                                            <td>1.250.000</td>
                                            <td>LEBIH</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2020 <a href="#">EJ Reader</a>
                </p>
            </div>
        </footer>


    </div>
</div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
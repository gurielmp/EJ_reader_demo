<?php
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=ej_excel_demo.xlsx");

?>

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
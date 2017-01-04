<?php
/**
 * Created by PhpStorm.
 * User: satya
 * Date: 03/01/17
 * Time: 15:45
 */
use app\models\Monitor;
use app\controllers\MonitorController;

$monitor = new Monitor();

$data = $monitor->cekAvailable();

//echo '<pre>';
//print_r(empty($data));
//echo '</pre>';
//exit();

?>

<table class="table table-striped">
    <tr>
        <td>
            <?php
                if(empty($data)){
                    echo MonitorController::cetakKosong();
                }
                elseif($data[1]['available'] == 1 && $data[1]['is_there'] == 0){
                    //parkiran tidak ada isinya
                    echo MonitorController::cetakKosong();
                }elseif ($data[1]['available'] == 0 && $data[1]['is_there'] == 0){
                    //parkiran sudah dipesan tapi orangnya belum datang
                    echo MonitorController::cetakReserved($data[1]);
                }elseif ($data[1]['available'] == 0 && $data[1]['is_there'] == 1){
                    //parkiran sudah dipesan dan orangnya sudah datang
                    echo MonitorController::cetakIsi($data[1]);
                }else{
                    echo MonitorController::cetakKosong();
                }

            ?>
        </td>
        <td>
            <?php
            if(empty($data)){
                echo MonitorController::cetakKosong();
            }
            elseif($data[2]['available'] == 1 && $data[2]['is_there'] == 0){
                //parkiran tidak ada isinya
                echo MonitorController::cetakKosong();
            }elseif ($data[2]['available'] == 0 && $data[2]['is_there'] == 0){
                //parkiran sudah dipesan tapi orangnya belum datang
                echo MonitorController::cetakReserved($data[2]);
            }elseif ($data[2]['available'] == 0 && $data[2]['is_there'] == 1){
                //parkiran sudah dipesan dan orangnya sudah datang
                echo MonitorController::cetakIsi($data[2]);
            }else{
                echo MonitorController::cetakKosong();
            }

            ?>
        </td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php
            if(empty($data)){
                echo MonitorController::cetakKosong();
            }
            elseif($data[3]['available'] == 1 && $data[3]['is_there'] == 0){
                //parkiran tidak ada isinya
                echo MonitorController::cetakKosong();
            }elseif ($data[3]['available'] == 0 && $data[3]['is_there'] == 0){
                //parkiran sudah dipesan tapi orangnya belum datang
                echo MonitorController::cetakReserved($data[3]);
            }elseif ($data[3]['available'] == 0 && $data[3]['is_there'] == 1){
                //parkiran sudah dipesan dan orangnya sudah datang
                echo MonitorController::cetakIsi($data[3]);
            }else{
                echo MonitorController::cetakKosong();
            }

            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            if(empty($data)){
                echo MonitorController::cetakKosong();
            }
            elseif($data[4]['available'] == 1 && $data[4]['is_there'] == 0){
                //parkiran tidak ada isinya
                echo MonitorController::cetakKosong();
            }elseif ($data[4]['available'] == 0 && $data[4]['is_there'] == 0){
                //parkiran sudah dipesan tapi orangnya belum datang
                echo MonitorController::cetakReserved($data[4]);
            }elseif ($data[4]['available'] == 0 && $data[4]['is_there'] == 1){
                //parkiran sudah dipesan dan orangnya sudah datang
                echo MonitorController::cetakIsi($data[4]);
            }else{
                echo MonitorController::cetakKosong();
            }

            ?>
        </td>
        <td>
            <?php
            if(empty($data)){
                echo MonitorController::cetakKosong();
            }
            elseif($data[5]['available'] == 1 && $data[5]['is_there'] == 0){
                //parkiran tidak ada isinya
                echo MonitorController::cetakKosong();
            }elseif ($data[5]['available'] == 0 && $data[5]['is_there'] == 0){
                //parkiran sudah dipesan tapi orangnya belum datang
                echo MonitorController::cetakReserved($data[5]);
            }elseif ($data[5]['available'] == 0 && $data[5]['is_there'] == 1){
                //parkiran sudah dipesan dan orangnya sudah datang
                echo MonitorController::cetakIsi($data[5]);
            }else{
                echo MonitorController::cetakKosong();
            }

            ?>
        </td>
        <td></td>
    </tr>
</table>


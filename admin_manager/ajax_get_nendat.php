<?php
session_start();
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/ql_duan.php";
require_once "../model/dm_nendat.php";
require_once "../model/hopdong.php";

if(isset($_GET['id_duan'])){
    $id_duan = $_GET['id_duan'];

    $page = '';
    if(isset($_GET['page']) && isset($_GET['id_hd'])){
        $page = $_GET['page'];
        $id_hd = $_GET['id_hd'];
    }

    $ql_duan = new QLDuAn();
    $hopdong = new HopDong();

    $ARR = [];
    if($page === "edit" && $id_hd != ''){
        $layHopDongShowToggle = $hopdong->layHopDongShowToggle($id_hd,$id_duan);
        if($layHopDongShowToggle){
            array_push($ARR, $layHopDongShowToggle[0]);
        }

        $layNenDatTheoDuan = $ql_duan->layNenDatTheoDuan($id_duan);
        foreach( $layNenDatTheoDuan as $item){
            $layHopDongTheoDuanAndNendat = $hopdong->layHopDongTheoDuanAndNendat($id_duan,$item['ID_nendat']);
            if(count($layHopDongTheoDuanAndNendat) === 0){
                array_push($ARR, $item);
            }
        }
    }else{
        $layNenDatTheoDuan = $ql_duan->layNenDatTheoDuan($id_duan);
        foreach( $layNenDatTheoDuan as $item){
            $layHopDongTheoDuanAndNendat = $hopdong->layHopDongTheoDuanAndNendat($id_duan,$item['ID_nendat']);
            if(count($layHopDongTheoDuanAndNendat) === 0){
                array_push($ARR, $item);
            }
        }
    }
    echo json_encode($ARR);
}


<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    switch($page){
        //beranda
        case 'data_aset':
            include 'pages/aset/data_aset.php';
        break;
        case 'tambah_aset';
            include 'pages/aset/tambah_aset.php';
        break;
        case 'ubah_aset';
            include 'pages/aset/ubah_aset.php';
        break;

        
        case 'data_unit':
            include 'pages/unit/data_unit.php';
        break;
        case 'tambah_unit';
            include 'pages/aset/tambah_unit.php';
        break;
        case 'ubah_unit';
            include 'pages/aset/ubah_unit.php';
        break;
    }
}else{
    include "pages/beranda.php";
}
?>
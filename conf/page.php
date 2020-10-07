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
            include 'pages/unit/tambah_unit.php';
        break;
        case 'ubah_unit';
            include 'pages/unit/ubah_unit.php';
        break;


        case 'data_jenis':
            include 'pages/jenis_aset/data_jenis.php';
        break;
        case 'tambah_jenis';
            include 'pages/jenis_aset/tambah_jenis.php';
        break;
        case 'ubah_jenis';
            include 'pages/jenis_aset/ubah_jenis.php';
        break;
    }
}else{
    include "pages/beranda.php";
}
?>
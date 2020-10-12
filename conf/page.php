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


        case 'data_suplier':
            include 'pages/suplier/data_suplier.php';
        break;
        case 'tambah_suplier';
            include 'pages/suplier/tambah_suplier.php';
        break;
        case 'ubah_suplier';
            include 'pages/suplier/ubah_suplier.php';
        break;


        case 'data_pemeriksaan':
            include 'pages/pemeriksaan/data_pemeriksaan.php';
        break;
        case 'tambah_pemeriksaan';
            include 'pages/pemeriksaan/tambah_pemeriksaan.php';
        break;
        case 'ubah_pemeriksaan';
            include 'pages/pemeriksaan/ubah_pemeriksaan.php';
        break;





        case 'data_petugas':
            include 'pages/petugas/data_petugas.php';
        break;
        case 'tambah_petugas';
            include 'pages/petugas/tambah_petugas.php';
        break;
        case 'ubah_petugas';
            include 'pages/petugas/ubah_petugas.php';
        break;



        //401
        case '401':
            include 'pages/401.php';
        break;
    }
}else{
    include "pages/beranda.php";
}
?>
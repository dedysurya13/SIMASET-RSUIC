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


        case 'data_ruangan':
            include 'pages/ruangan/data_ruangan.php';
        break;
        case 'tambah_ruangan';
            include 'pages/ruangan/tambah_ruangan.php';
        break;
        case 'ubah_ruangan';
            include 'pages/ruangan/ubah_ruangan.php';
        break;


        case 'data_kategori':
            include 'pages/kategori/data_kategori.php';
        break;
        case 'tambah_kategori';
            include 'pages/kategori/tambah_kategori.php';
        break;
        case 'ubah_kategori';
            include 'pages/kategori/ubah_kategori.php';
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


        case 'data_kerusakan':
            include 'pages/kerusakan/data_kerusakan.php';
        break;
        case 'tambah_kerusakan';
            include 'pages/kerusakan/tambah_kerusakan.php';
        break;
        case 'ubah_kerusakan';
            include 'pages/kerusakan/ubah_kerusakan.php';
        break;


        case 'data_perbaikan':
            include 'pages/perbaikan/data_perbaikan.php';
        break;
        case 'tambah_perbaikan';
            include 'pages/perbaikan/tambah_perbaikan.php';
        break;
        case 'ubah_perbaikan';
            include 'pages/perbaikan/ubah_perbaikan.php';
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

        

        //cetak_label
        case'cetak_label':
            include 'pages/cetak/single_label.php';
        break;
        case'cetak_multi_label':
            include 'pages/cetak/multi_label.php';
        break;

        //cari
        case'cari_aset':
            include 'pages/cari_aset/aset.php';
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
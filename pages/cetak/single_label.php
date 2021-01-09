<?php 
include "../../conf/conn.php";
include "../../plugins/phpqrcode/qrlib.php";
require_once '../../plugins/phpqrcode/qrconfig.php';
$id = $_GET['id'];

$tempDir = '../../temp/';

$fileName = 'label_'.$id.'.png';

$pngAbsoluteFilePath = $tempDir . $fileName;
$urlRelativeFilePath = '../../temp/' . $fileName;

// buat qr
if (!file_exists($pngAbsoluteFilePath)) {
    QRcode::png('http://127.0.0.1/SIMASET/SIMASET-RSUIC/pages/cari_aset/index.php?kode_aset='.$id, $pngAbsoluteFilePath);
} 
//cek lokasi file
//echo 'Server PNG File: '.$pngAbsoluteFilePath;

$sql = "SELECT * FROM aset_data as a INNER JOIN aset_unit as u ON a.kode_unit = u.kode_unit INNER JOIN aset_kategori_aset as ak ON a.kode_kategori = ak.kode_kategori LEFT JOIN aset_ruangan as ar ON a.kode_ruangan = ar.kode_ruangan WHERE kode_aset='$id'";
$sth = $conn->prepare($sql);
$sth->execute();
$row = $sth->fetch(PDO::FETCH_ASSOC);
?>
<head>
    <title>Cetak Label</title>
    <style type="text/css" media="print">
    
    /*
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    */
    #potong {
    font-size: 13px;
    width: 120px;
    margin : 6px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis /*This is where the magic happens*/
    }
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }
    body
    {
        /*border: solid 1px blue ;*/
        margin: 2mm; /* margin you want for the content */
    }
    </style>
</head>
    <body  onload="window.print()">
        <table style="height: 140px; width: 260px;">
            <tbody>
                <tr> <!-- tampil qr-->
                    <td style="width: 70px; height: 60px;"><?php echo '<img src="'.$urlRelativeFilePath.'" />';?>
                    </td>
                    <td style="width: 190px; height: 60px;">
                        <p id="potong"><?php echo $row['kode_aset']?></p>
                        <p id="potong"><?php echo $row['nama_kategori']?></p>
                        <p id="potong"><?php echo $row['merk_aset']?></p>
                        <p id="potong"><?php echo $row['nama_unit']?></p>
                        <p id="potong"><?php echo $row['nama_ruangan']?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
<?php
//hapus qr
//unlink($tempDir.$fileName);
?>


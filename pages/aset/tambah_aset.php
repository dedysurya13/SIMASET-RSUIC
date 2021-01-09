<?php
include "/../../conf/conn.php";

?>

<!--
<script type="text/javascript">
    $(document).ready(function(){
        $("#units").change(function(){
            var kode_unit = $("#units").val();
            $.ajax({
                url: 'load_ruangan.php',
                method: 'post',
                data: 'kode_unit='+kode_unit
            }).done(function(ruangans){
                console.log(ruangans);
                ruangans = JSON.parse(ruangans);
                $("#ruangans").empty();
                ruangans.forEach(function(ruangan){
                    $('#ruangans').append('<option>'+ruangan.nama_ruangan+'</option>')
                })
            })
        })
    })
</script>
-->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tambah Aset</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Aset</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" method="post" action="pages/aset/tambah_aset_proses.php">
                        <div class="box-body">
                        <div class="form-group">
                                <label>Kategori Aset</label>
                                <?php
                                    $kategoriQuery = $conn->query("SELECT * FROM aset_kategori_aset ORDER BY nama_kategori ASC");
                                ?>
                                <select id="kode_kategori" name="kode_kategori" class="form-control" id="" required>

                                    <option value=''>- Kategori Aset -</option>

                                    <?php while ($row = $kategoriQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_kategori}'>{$nama_kategori}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Merk/Tipe Aset</label>
                                <input type="text" name="merk_aset" class="form-control" placeholder="Merk Aset, ex: Epson L310" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Aset</label>
                                <select name="tahun_aset" class="form-control" id="tahun_aset">
                                    <option value="">- Pilih Tahun -</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nilai Aset</label>
                                <input type="text" name="nilai_aset" class="form-control" placeholder="Nilai Aset, ex: 300000" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Input Aset</label>
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_aset" class="form-control pull-right" id="datepicker" autocomplete="off" value="<?php echo date("Y/m/d")?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Spesifikasi Aset</label>
                                <textarea name="spesifikasi_aset" class="form-control" rows="4" class="pull-right" placeholder="Spesifikasi aset / Serial Number / Warna / Ciri" autocomplete="off" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis Aset</label>
                                <?php
                                    $jenisQuery = $conn->query("SELECT * FROM aset_jenis ORDER BY nama_jenis ASC");
                                ?>
                                <select id="jenis_aset" name="jenis_aset" class="form-control" required>

                                    <option value=''>- Jenis Aset -</option>

                                    <?php while ($row = $jenisQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_jenis}'>{$nama_jenis}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Unit</label>
                                <?php
                                    $unitQuery = $conn->query("SELECT * FROM aset_unit ORDER BY nama_unit ASC");
                                ?>
                                <select id="kode_unit" name="kode_unit" class="form-control unit_ruangan" required onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>

                                    <option value=''>- Nama Unit -</option>
                                    
                                    <?php while ($row = $unitQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_unit}'>{$nama_unit}</option>";
                                    }?>
                                </select>
                            </div>
                            <div class="form-group row" id="pilihRuangan">
                                <div class="col-md-12">
                                    <label for="">Nama Ruangan</label>
                                </div>
                                
                                <?php
                                    $ruanganQuery = $conn->query("SELECT * FROM aset_ruangan ORDER BY nama_ruangan ASC");
                                ?>
                                <div class="col-md-10">
                                    <select name="ruangan" id="ruangan" class="form-control">
                                            
                                            <option value="">- Nama Ruangan -</option>

                                            <?php while ($row = $ruanganQuery->fetch(PDO::FETCH_ASSOC)){
                                            extract($row);
                                            echo "<option value='{$kode_unit}' data-ruangan='{$kode_ruangan}' >{$nama_ruangan}</option>";
                                            }?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="kode_ruangan" id="kode_ruangan" class="form-control" placeholder="KodeRuangan" autocomplete="off" readonly>
                                </div> 
                            </div>
                            
                            <div class="form-group">
                                <label>Nama Suplier</label>
                                <?php
                                    $suplierQuery = $conn->query("SELECT * FROM aset_suplier ORDER BY nama_suplier ASC");
                                ?>
                                <select id="nama_suplier" name="nama_suplier" class="form-control" id="" required>

                                    <option value=''>- Nama Suplier -</option>

                                    <?php while ($row = $suplierQuery->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    echo "<option value='{$kode_suplier}'>{$nama_suplier}</option>";
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="simpan_data" class="btn btn-primary" title="Simpan Data"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $('#pilihRuangan').hide();
    $('#kode_unit').change(function() {
        $('#ruangan option').hide();
        $('#pilihRuangan').show();
        $('#ruangan option[value="' + $(this).val() + '"]').show();
        
        // add this code to select 1'st of streets automaticaly 
        // when city changed
            if ($('#ruangan option[value="' + $(this).val() + '"]').length) {
                $('#ruangan option[value="' + $(this).val() + '"]');
                $('#ruangan').val('');
                $('#kode_ruangan').val('');
            }
            // in case if there's no corresponding street: 
            // reset select element
            else {
                $('#ruangan').val('');
                $('#kode_ruangan').val('');
                $('#pilihRuangan').hide();
            };
        
    });

    $('#ruangan').change(function(){
        $("#kode_ruangan").val($(this).find(':selected').attr('data-ruangan')); 
    })

</script>


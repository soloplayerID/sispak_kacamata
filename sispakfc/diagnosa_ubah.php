<?php
    $row = $db->get_row("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Keluhan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=diagnosa_ubah&ID=<?=$row->kode_diagnosa?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Detail</label>
                <textarea class="form-control" name="detail" rows="8"><?=$row->detail?></textarea>
            </div>
            <div class="form-group">
                <label>Solusi</label>
                <textarea class="form-control" name="solusi" rows="8"><?=$row->solusi?></textarea>
            </div>
            <div class="page-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=diagnosa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>

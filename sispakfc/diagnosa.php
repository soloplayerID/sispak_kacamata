<div class="page-header">
    <h1>Keluhan</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="diagnosa" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-success" href="?m=diagnosa_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Diagnosa</th>
                    <th>Detail</th>
                    <th>Solusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_diagnosa
                WHERE kode_diagnosa LIKE '%$q%' OR nama_diagnosa LIKE '%$q%' OR detail LIKE '%$q%'
                ORDER BY kode_diagnosa");
            $no=0;

            foreach($rows as $row):?>
            <tr>
                <td><?=++$no ?></td>
                <td><?=$row->kode_diagnosa?></td>
                <td><?=$row->nama_diagnosa?></td>
                <td><?=get_words($row->detail, 10)?></td>
                <td><?=get_words($row->solusi, 10)?></td>
                <td class="nw">
                    <a class="btn btn-xs btn-warning" href="?m=diagnosa_ubah&ID=<?=$row->kode_diagnosa?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=diagnosa_hapus&ID=<?=$row->kode_diagnosa?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>

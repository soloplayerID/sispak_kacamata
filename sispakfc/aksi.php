<?php
require_once 'functions.php';

/** LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:index.php");
} elseif ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
}

/** diagnosa */
elseif ($mod == 'diagnosa_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $solusi = $_POST['solusi'];
    if ($kode == '' || $nama == '' || $detail == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$kode'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_diagnosa (kode_diagnosa, nama_diagnosa, detail, solusi) 
            VALUES ('$kode', '$nama', '$detail', '$solusi')");
        redirect_js("index.php?m=diagnosa");
    }
} else if ($mod == 'diagnosa_ubah') {
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $solusi = $_POST['solusi'];
    if ($nama == '' || $detail == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_diagnosa SET nama_diagnosa='$nama', detail='$detail', solusi='$solusi' 
            WHERE kode_diagnosa='$_GET[ID]'");
        redirect_js("index.php?m=diagnosa");
    }
} else if ($act == 'diagnosa_hapus') {
    $db->query("DELETE FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosa");
}

/** GEJALA */
elseif ($mod == 'gejala_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    if ($kode == '' || $nama == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala='$kode'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_gejala (kode_gejala, nama_gejala) VALUES ('$kode', '$nama')");
        redirect_js("index.php?m=gejala");
    }
} else if ($mod == 'gejala_ubah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    if ($kode == '' || $nama == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_gejala SET nama_gejala='$nama' WHERE kode_gejala='$_GET[ID]'");
        redirect_js("index.php?m=gejala");
    }
} else if ($act == 'gejala_hapus') {
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    $db->query("DELETE FROM tb_rule WHERE kode='$_GET[ID]'");
    header("location:index.php?m=gejala");
}

/** PENGETAHUAN TAMBAH */
else if ($mod == 'rule_tambah') {
    $id_rule = $_POST['id_rule'];
    $parent = $_POST['parent'];
    $tanya = $_POST['tanya'];
    $diagnosa = $_POST['diagnosa'];
    $child = $_POST['child'];

    $ada = $db->get_row("SELECT * FROM tb_rule WHERE parent='$parent' AND child='$child' AND id_rule<>'$_GET[ID]'");

    if ($id_rule == '' || ($tanya == '' && $diagnosa == '') || $child == '')
        print_msg("Pilih <strong>Parent</strong>, salah satu <strong>Tanya/Diagnosa</strong>, dan <strong>Child</strong>!");
    elseif ($db->get_row("SELECT * FROM tb_rule WHERE id_rule='$id_rule'"))
        print_msg("Id rule sudah terdaftar!");
    elseif ($ada)
        print_msg("Kombinasi parent dan child sudah ada!");
    else {
        $kode = $tanya ?: $diagnosa;
        $jenis = $tanya ? 'tanya' : 'diagnosa';

        $db->query("INSERT INTO tb_rule (id_rule, kode, jenis, parent, child) 
            VALUES ('$id_rule', '$kode', '$jenis', '$parent', '$child')");

        redirect_js("index.php?m=rule");
    }
} else if ($mod == 'rule_ubah') {
    $parent = $_POST['parent'];
    $tanya = $_POST['tanya'];
    $diagnosa = $_POST['diagnosa'];
    $child = $_POST['child'];

    $ada = $db->get_row("SELECT * FROM tb_rule WHERE parent='$parent' AND child='$child' AND id_rule<>'$_GET[ID]'");

    if ($parent == '' || ($tanya == '' && $diagnosa == '') || $child == '')
        print_msg("Pilih <strong>Parent</strong>, salah satu <strong>Tanya/Diagnosa</strong>, dan <strong>Child</strong>!");
    elseif ($ada)
        print_msg("Kombinasi parent dan child sudah ada!");
    else {
        $kode = $tanya ?: $diagnosa;
        $jenis = $tanya ? 'tanya' : 'diagnosa';

        $db->query("UPDATE tb_rule SET parent='$parent', kode='$kode', jenis='$jenis', child='$child' WHERE id_rule='$_GET[ID]'");
        redirect_js("index.php?m=rule");
    }
} else if ($act == 'rule_hapus') {
    $db->query("DELETE FROM tb_rule WHERE id_rule='$_GET[ID]'");
    header("location:index.php?m=rule");
}

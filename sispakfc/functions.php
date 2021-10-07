<?php
error_reporting(~E_NOTICE);
session_start();

include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);

$mod = $_GET['m'];
$act = $_GET['act'];

$rows = $db->get_results("SELECT * FROM tb_gejala ORDER BY kode_gejala");
$GEJALA = array();
foreach ($rows as $row) {
    $GEJALA[$row->kode_gejala] = $row->nama_gejala;
}

$rows = $db->get_results("SELECT * FROM tb_diagnosa ORDER BY kode_diagnosa");
$DIAGNOSA = array();
foreach ($rows as $row) {
    $DIAGNOSA[$row->kode_diagnosa] = $row->nama_diagnosa;
}

function get_diagnosa_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosa ORDER BY kode_diagnosa");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_diagnosa == $selected)
            $a .= "<option value='$row->kode_diagnosa' selected>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
        else
            $a .= "<option value='$row->kode_diagnosa'>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
    }
    return $a;
}

function get_gejala_option($selected = '', $ask = false)
{
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    $a = '';
    foreach ($rows as $row) {
        $select = ($row->kode_gejala == $selected) ? 'selected' : '';
        $text = ($ask) ? '[' . $row->kode_gejala . '] Apakah ' . strtolower($row->nama_gejala) . '?' : '[' . $row->kode_gejala . '] ' . $row->nama_gejala;

        $a .= "<option value='$row->kode_gejala' $select>$text</option>";
    }
    return $a;
}

function get_rule_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_rule ORDER BY id_rule");
    $a = '';
    foreach ($rows as $row) {
        $select = $row->id_rule == $selected ? 'selected' : '';
        $text = 'Rule ' . $row->id_rule  . ': ' . $row->jenis . ' [' . $row->kode . ']';

        $a .= "<option value='$row->id_rule' $select>$text</option>";
    }
    return $a;
}


function get_child_option($selected = '')
{
    $arr = array(
        'ya' => 'Ya',
        'tidak' => 'Tidak',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        $select = $key == $selected ? 'selected' : '';
        $a .= "<option value='$key' $select>$val</option>";
    }
    return $a;
}
function enter_to_br($str)
{
    return str_ireplace("\r\n", "<br />", $str);
}

function get_words($str, $limit = 20)
{
    $str = explode(' ', strip_tags($str), $limit + 1);
    //echo count($str);
    if (count($str) <= $limit) {
        return implode(' ', $str);
    } else {
        array_pop($str);
        return implode(' ', $str) . '...';
    }
}
function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function esc_field($str)
{
    return addslashes($str);
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($url)
{
    echo '<script type="text/javascript">alert("' . $url . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

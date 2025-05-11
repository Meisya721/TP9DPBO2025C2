<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("../model/Template.class.php");
include("../model/DB.class.php");
include("../model/Mahasiswa.class.php");
include("../model/TabelMahasiswa.class.php");
include("../presenter/ProsesMahasiswa.php");

$prosesmahasiswa = new ProsesMahasiswa();

if (isset($_POST['submit'])) {
    // Jika form disubmit, ambil nilai dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    // Proses tambah data mahasiswa
    if ($prosesmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp)) {
        // Jika berhasil, redirect ke halaman utama
        header("location: ../index.php");
        exit; // <- penting
    } else {
        echo "Data gagal disimpan!";
    } 
}

$tpl = new Template("../templates/form.html");

$tpl->replace("DATA_TITLE", "Tambah Data Mahasiswa");
$tpl->replace("DATA_FORM_ACTION", "add.php");
$tpl->replace("DATA_ID", "");
$tpl->replace("DATA_NIM", "");
$tpl->replace("DATA_NAMA", "");
$tpl->replace("DATA_TEMPAT", "");
$tpl->replace("DATA_TL", "");
$tpl->replace("DATA_GENDER_L", "checked");
$tpl->replace("DATA_GENDER_P", "");
$tpl->replace("DATA_EMAIL", "");
$tpl->replace("DATA_TELP", "");
$tpl->replace("DATA_BUTTON", "Tambah");

$tpl->write();
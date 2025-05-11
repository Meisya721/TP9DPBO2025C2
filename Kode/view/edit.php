<?php

include(__DIR__ . '/../model/Template.class.php');
include(__DIR__ . '/../presenter/ProsesMahasiswa.php');

$presenter = new ProsesMahasiswa();

// Cek apakah ada parameter id
if (!isset($_GET['id'])) {
    header("location: ../index.php");
}

$id = $_GET['id'];
$mahasiswa = $presenter->getMahasiswaDetail($id);

// Cek apakah data mahasiswa ditemukan
if (!$mahasiswa) {
    header("location: ../index.php");
}

if (isset($_POST['submit'])) {
    // Mendapatkan data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    // Update data mahasiswa
    $hasil = $presenter->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
    
    if ($hasil) {
        // Jika berhasil, redirect ke halaman utama
        header("location: ../index.php");
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}

$tpl = new Template("../templates/form.html");

// Menentukan status checked untuk radio button gender
$gender_laki = ($mahasiswa['gender'] == 'Laki-laki') ? 'checked' : '';
$gender_perempuan = ($mahasiswa['gender'] == 'Perempuan') ? 'checked' : '';

$tpl->replace("DATA_TITLE", "Edit Mahasiswa");
$tpl->replace("DATA_JUDUL", "Edit Data Mahasiswa");
$tpl->replace("DATA_FORM_ACTION", "edit.php?id=" . $id);
$tpl->replace("DATA_HIDDEN_ID", "<input type='hidden' name='id' value='" . $id . "'>");
$tpl->replace("DATA_NIM", $mahasiswa['nim']);
$tpl->replace("DATA_NAMA", $mahasiswa['nama']);
$tpl->replace("DATA_TEMPAT", $mahasiswa['tempat']);
$tpl->replace("DATA_TL", $mahasiswa['tl']);
$tpl->replace("DATA_GENDER_LAKI", $gender_laki);
$tpl->replace("DATA_GENDER_PEREMPUAN", $gender_perempuan);
$tpl->replace("DATA_EMAIL", $mahasiswa['email']);
$tpl->replace("DATA_TELP", $mahasiswa['telp']);
$tpl->replace("DATA_BUTTON", "Update"); 

$tpl->write();
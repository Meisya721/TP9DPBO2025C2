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

$tpl = new Template("../templates/detail.html");

$tpl->replace("DATA_ID", $id);
$tpl->replace("DATA_NIM", $mahasiswa['nim']);
$tpl->replace("DATA_NAMA", $mahasiswa['nama']);
$tpl->replace("DATA_TEMPAT", $mahasiswa['tempat']);
$tpl->replace("DATA_TL", $mahasiswa['tl']);
$tpl->replace("DATA_GENDER", $mahasiswa['gender']);
$tpl->replace("DATA_EMAIL", $mahasiswa['email']);
$tpl->replace("DATA_TELP", $mahasiswa['telp']);

$tpl->write();
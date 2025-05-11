<?php

include(__DIR__ . '/../presenter/ProsesMahasiswa.php');

// Cek apakah ada parameter id
if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
}

$id = $_GET['id'];
$presenter = new ProsesMahasiswa();

// Hapus data mahasiswa
$hasil = $presenter->deleteMahasiswa($id);

// Redirect ke halaman utama
header("location: ../index.php");
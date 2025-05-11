<?php

include_once(__DIR__ . '/../model/Template.class.php');
include_once(__DIR__ . '/../model/DB.class.php');
include_once(__DIR__ . '/../model/Mahasiswa.class.php');
include_once(__DIR__ . '/../model/TabelMahasiswa.class.php');

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
	public function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function deleteMahasiswa($id);
	public function getMahasiswaDetail($id);
}
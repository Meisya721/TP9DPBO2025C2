<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; 
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosesmahasiswa->getId($i);

			$data .= "<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
				<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
				<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
				<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
				<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
				<td>
					<a href='view/detail.php?id=" . $id . "' class='btn btn-info btn-sm mb-1'>Detail</a>
					<a href='view/edit.php?id=" . $id . "' class='btn btn-warning btn-sm mb-1'>Edit</a>
					<a href='view/delete.php?id=" . $id . "' class='btn btn-danger btn-sm mb-1' onclick='return konfirmasiHapus(" . $id . ")'>Delete</a>
				</td>
			</tr>";
		}

		$this->tpl = new Template("templates/skin.html");

		$this->tpl->replace("DATA_TABEL", $data);

		$this->tpl->write();
	}
}

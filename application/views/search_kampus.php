<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<form action="<?php echo base_url('search_kampus/search') ?>" method="get">
    <label for="kampus_id">ID Kampus</label>
    <input type="text" name="kampus_id" id="kampus_id">
    <br>
    <label for="nama_kampus">Nama Kampus</label>
    <input type="text" name="nama_kampus" id="nama_kampus">
    <br>
    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan">
    <br>
    <label for="politeknik">Politeknik</label>
    <input type="text" name="politeknik" id="politeknik">
    <br>
    <label for="provinsi">Provinsi</label>
    <input type="text" name="provinsi" id="provinsi">
    <br>
    <label for="status">Status</label>
    <input type="text" name="status" id="status">
    <br>
    <label for="tipe">Tipe</label>
    <input type="text" name="tipe" id="tipe">
    <br>
    <button type="submit">Cari</button>
</form>
</body>
</html>
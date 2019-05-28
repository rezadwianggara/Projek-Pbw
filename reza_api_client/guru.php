<?php
//Curl untuk mengambil data dari api
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/reza_api/api/guru",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
$response = json_decode($response, true);
//Curl untuk mengambil data dari api

//Curl untuk menghapus data dari api
if(isset($_GET['hapus']) && $_GET['hapus'] != ''){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/reza_api/api/guru/hapus/$_GET[hapus]",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_hapus = curl_exec($curl);
	$err = curl_error($curl);
	$response_hapus = json_decode($response_hapus, true);
	if(isset($response_hapus['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil dihapus...!!');window.location.href=\"./guru.php\";</script>";
	}else{
		echo $response_hapus['data'];
	}
} 
//Curl untuk menghapus data dari api?>
<h3>Data Dari Endpoin API guru</h3>
<p><a href="http://localhost/reza_api_client/guru_tambah.php">Tambah</a></p>
<table border="1" cellspacing="0" cellpadding="5" style='border-collapse:collapse;'>
	<tr>
		<td>Nama Guru</td>
		<td>NIP</td>
		<td>Jenis Kelamin</td>
		<td>Alamat</td>
		<td>Mata Pelajaran</td>
		<td></td><?php 
	if(isset($response['data'])){ 
		foreach($response['data'] as $value){ ?>
			<tr>
					<td><strong><?php echo $value['nama_guru']; ?></strong></td>
					<td><?php echo $value['nip']; ?></td>
					<td><?php echo $value['jenis_kelamin']; ?></td>
					<td><?php echo $value['alamat']; ?></td>
					<td><?php echo $value['mata_pelajaran']; ?></td>
					<td>
						<a href="http://localhost/reza_api_client/guru_edit.php?id=<?php echo $value['id']; ?>">edit | 
						<a href="http://localhost/reza_api_client/guru.php?hapus=<?php echo $value['id']; ?>">hapus</a>
					</td>
			</tr><?php 
		} 
	} ?>
</table>
<style>
    /* Gaya untuk tabel */
    body {
        background: url(img/bg3.jpg);
        background-size: cover;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    /* Gaya untuk judul tabel */
    th {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        text-align: center;  /* Center alignment */
    }

    /* Gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: center;  /* Center alignment */
        border-bottom: 1px solid #ddd;
    }

    /* Warna selang-seling pada baris data */
    tr:nth-child(odd) {
        background-color: #6acac5ff;
    }

    tr:nth-child(even) {
        background-color: #ffffffff;
    }

    /* Gaya untuk tabel ketika disorot */
    tr:hover {
        background-color: #ddd;
    }

    /* Gaya tombol */
    button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
    }

    p {
        text-align: center;
        font-size: 18px;
    }
</style>


<?php
define('FILE_JSON', 'barang.json');

function cekFileJson() {
    if(!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);	
    return json_decode($json, true);
}

$data_barang = cekFileJson();
$total_data = count($data_barang);
if ($total_data == 0) {
    echo "<p>Belum ada data barang yang disimpan.</p>";
} else {
	echo "<table border='1'>
		  <tr>
		      <th>No</th>
		      <th>Nama</th>
		      <th>Email</th>
		      <th>Hp</th>
		      <th>Alamat</th>
		  </tr>";

	for ($i = 0; $i < $total_data; $i++) 
	{
		$barang = $data_barang[$i];
		
		echo "<tr>";
		echo "<td>" . ($i + 1) . "</td>";
		echo "<td>" . htmlspecialchars($barang['nama']) . "</td>";
		echo "<td>" . htmlspecialchars($barang['email']) . "</td>";
		echo "<td>" . htmlspecialchars($barang['hp']) . "</td>";
		echo "<td>" . htmlspecialchars($barang['alamat']) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	echo "<center><button onclick='window.location.href=\"frmNama.html\";'>+</button></center>";
}
?>

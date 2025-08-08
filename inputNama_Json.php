<?php
// definisikan nama file JSON, yaitu barang.json
define('FILE_JSON', 'barang.json');

/* Prosedur untuk cek apakah file json ada, jika tidak ada,
maka buat fole json dengan data kosong 
*/
function cekFileJson() {

    if (!file_exists(FILE_JSON)) {
 
 
        file_put_contents(FILE_JSON, json_encode([]));
    }
}

// fungsi untuk membaca data dari file json
function bacaDataJson() {
    /* php tidak mengenal tipe data json, 
    yang ada tipe data array, jadi lakukan konversi data json ke array dengan perintah "json_decode". 
    setelah dikonversi, kembalikan hasil 
    konversi ke fungsi yang memanggilnya menggunakan perintah "return"
    */

    return json_decode(file_get_contents (FILE_JSON), true);
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
// panggil prosedur cekFIleJson()
cekFileJson();

/*simpan ke variabel ambil data dari
form (name input type)*/

$nama       = $_POST['nama'];
$email       = $_POST['email'];
$hp      = $_POST['hp'];
$alamat       = $_POST['alamat'];

// panggil fungsi bacaDataJson()
$data_barang = bacaDataJson();

// cek apakah nama sudah ada

for ($i=0; $i < count($data_barang); $i++) {
    /* perbandingan nilai (=),
       perbandingan tipe data (==)
       perbandingan nilai dan tipe data (===)

    */
    if ($data_barang[$i]['nama'] === $nama) {
        // tampilkan pesan barang sudah ada
        echo "<script>alert('Barang dengan Nama: $nama sudah ada!');</script>";
        // setelah tombol ok di klik pada pesan, alihkan halaman ke frmNama.html
        echo "<script>window.location.href = 'frmNama.html';</script>";
        exit;
    }
}

// menambahkan data baru ke dalam array
$data_barang[] = [
    'nama' => $nama,
    'email' => $email,
    'hp' => $hp,
    'alamat' => $alamat
];

/* konversi data array pada "$data_barang" ke
json dengan perintah "json_encode".
hasil konversi tempatkan ke file json
dengan perintah "file_put_contents".
format output json agar lebih mudah di baca
oleh manusia dengan perintah
"JSON_PRETTY_PRINT".
*/

file_put_contents(FILE_JSON, json_encode($data_barang, JSON_PRETTY_PRINT));

echo "<script>alert('Data berhasil ditambahkan!';</script>";
echo "<script>window.location.href = 'frmNama.html';</script>";

}



?>
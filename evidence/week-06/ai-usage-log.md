# AI Usage Log - Pertemuan 6

| Masalah/Tujuan          | Saran AI                                                           | Keputusan | Hasil Uji                                        |
| ----------------------- | ------------------------------------------------------------------ | --------- | ------------------------------------------------ |
| Branching diskon        | Pisahkan perhitungan diskon berdasarkan jenis peserta              | Diterima  | Mahasiswa 20%, guru 15%, umum 15%                 |
| Checkbox kosong         | Gunakan `$_POST['interest'] ?? []` dan validasi array              | Diterima  | Tidak ada warning saat minat kosong              |
| Pilihan kursus          | Gunakan array untuk daftar kursus dan tampilkan dengan `foreach`   | Diterima  | Semua kursus tampil pada pilihan kursus          |
| History dummy           | Render data history dari array menggunakan `foreach`               | Diterima  | Data history tampil tanpa database/CRUD          |
| Test Matrix             | Buat tabel pengujian dengan skenario, actual, expected, dan status | Diterima  | Semua pengujian tercatat dengan status PASS      |
| Validasi peserta        | Periksa input peserta agar tidak kosong                            | Diterima  | Pesan validasi muncul saat nama peserta kosong   |
| Validasi kursus         | Periksa apakah kursus sudah dipilih                                | Diterima  | Pesan validasi muncul saat kursus belum dipilih  |
| Validasi jumlah paket   | Pastikan jumlah paket sesuai ketentuan                             | Diterima  | Input jumlah paket tidak valid ditangani program |
| Perhitungan total harga | Kalikan harga kursus dengan jumlah paket dan terapkan diskon       | Diterima  | Total harga sesuai aturan program                |
| Tampilan halaman        | Gunakan HTML dan CSS untuk merapikan tampilan                      | Diterima  | Tampilan halaman lebih rapi dan mudah dibaca     |

## Kesimpulan

AI digunakan sebagai alat bantu dalam penulisan kode PHP, validasi input, perhitungan diskon, pengolahan array, dan penyusunan Test Matrix. Saran AI diterapkan sesuai kebutuhan program dan hasilnya diperiksa melalui pengujian.

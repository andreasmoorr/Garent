<?php
function format_rupiah(int $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Data awal + data yang ditambahkan lewat form (disimpan di session)
function ambil_kategori(): array
{
    $bawaan = [
        ['nama' => 'PlayStation 5 Bundle',  'harga' => 150000],
        ['nama' => 'Nintendo Switch OLED', 'harga' => 100000],
    ];
    return array_merge($bawaan, $_SESSION['kategori_tambahan'] ?? []);
}
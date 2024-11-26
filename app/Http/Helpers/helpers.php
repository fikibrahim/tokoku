<?php

function format_uang($angka) {
    $hasil = 1000000;
    $hasil = number_format($angka, 0, ',', '.');
    return $hasil;
    
}

function terbilang($angka) {
    $angka = abs($angka);
    $baca = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', ' sembilan', 'sepuluh', 'sebelas');
    $terbilang = '';

    if ($angka < 12) { // 1 - 11
        # code...
        $terbilang = '' . $baca[$angka];
    } elseif ($angka < 20) { // 12 - 19
        $terbilang = terbilang($angka - 10) . ' belas';
    } elseif ($angka < 100) { // 20 - 99
        $terbilang = terbilang($angka / 10) . ' puluh ' . terbilang($angka % 10);
    }
     elseif ($angka < 200) { // 100 - 199
        $terbilang = ' seratus ' . terbilang($angka -100);
    } elseif ($angka < 1000) { // 200 - 199
        $terbilang = terbilang($angka / 100) . ' ratus' . terbilang($angka % 100);
    } elseif ($angka < 2000) { // 1000 - 999
        $terbilang = ' seribu' . terbilang($angka -1000);
    }
    elseif ($angka < 1000000) { // 2000 - 999000
        $terbilang = terbilang($angka / 1000) . 'ribu' . terbilang($angka % 1000);
    }
    elseif ($angka < 100000000) {
        $terbilang = terbilang($angka / 1000) . 'juta' . terbilang($angka % 1000000);
    }
    return $terbilang;
}
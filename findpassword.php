<?php

$sifre = "abacı";

//print_r($a);
$kelimeler = file('kelimeler.txt'); //kelimeler.txt dosyasında ki her bir kelimeyi array'e atama

//kelimeler.txt dosyasında ki boşlukları silip diziye atadık
for ($i=0; $i < count($kelimeler); $i++) { 
    $c[] = trim($kelimeler[$i]);
    //in_array fonksiyonu ile şifre array'de var mı kontrolü
    if (in_array($sifre, $c)) {
        echo $sifre . " bulundu.";
        break;
    }
}

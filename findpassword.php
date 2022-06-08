<?php

if (isset($_POST['encrypt'])) {

    /*Bu kısım sezar şifreleme */
    $sifre = $_POST['password']; //şifremiz
    $alphabet = range('a', 'z'); //a'dan z'ye kadar dizi
    $cryptoAlphabet = array(); //harfleri şifre de ki harfler ile değiştirecek boş dizi
    $new = array(); //şifrelenmiş verileri tutacağımız dizi

    for ($j = 0; $j < 26; $j++) { //26 kere dön dönerken her şifrelenmiş veriyi $new arrayine ata
        for ($i = 0; $i < 26; $i++) { //26 kere dön ve şifreleme yap
            $index = $i + 1;
            if ($i + 1 > 25) $index = (($i + 1) % 25) - 1;

            $cryptoAlphabet[$i] = $alphabet[$index];
        }
        $cryptedData = strtr($sifre, array_combine($alphabet, $cryptoAlphabet)); //strtr ile şifremizi +1 key değerine göre değiştiriyiriyoruz.
        array_push($new, $cryptedData); //şifrelenmiş verimizi $new arrayine atıyoruz.
        $sifre = $new[$j]; //şifreyi $new'in $j'ninci elemanı ile değiştiriyoruz.
    }
    /*sezar şifreleme son*/

    $kelimeler = file('kelimeler.txt'); //kelimeler.txt dosyasında ki her bir kelimeyi array'e atama

    for ($i = 0; $i < count($kelimeler); $i++) {//kelimeler dizisinin indis sayısı kadar dön
        $c[] = trim($kelimeler[$i]);//kelimeler.txt dosyasında ki boşlukları silip diziye atadık
        $j = $i % 26;
        if (in_array($new[$j], $c)) {
            echo $new[$j] . " bulundu.";
            header("Location:index.php?sifre=" . $new[$j]);
            break;
        }
    }
}

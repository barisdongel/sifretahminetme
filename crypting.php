<?php
if(isset($_POST['encrypt'])) {
    $originpass = $_POST['password']; //şifremiz
    $originkey = $_POST['key']; //key değerimiz

    $ch = str_split($originpass); //şifreyi parçalıyoruz
    $key = str_split($originkey); //keyi parçalıyoruz

    $b = range('a', 'z'); //a'dan z'ye kadar olan bir dizi
    array_unshift($b, "phoney"); //$b dizisinin indisini 1'den başlatmak için boş eleman ekleyip 1.indisi siliyoruz
    unset($b[0]);

    for ($i = 0; $i < count($ch); $i++) { //26 kere dön
        if (!array_key_exists($i, $ch)) { //eğer $i değeri sifre uzunluğundan büyükse döngüden çık. (key harf sayısı kadar dönüyor döngü)
            break;
        } else {
            $d = array_map(null, $ch, $key); //$ch ve $key dizisinin array_map ile denkleştirilmesi
            $crypt = $d[$i][1]; //$d dizisinin tek tek her elemanından key değerine karşılık gelen harfi alıyoruz
            $keyvalue = (array_search($crypt, $b)); //harf dizimizde key değerini arıyoruz. dönen yanıt karşılık gelen value değerinin sayısı
            $passvalue = (array_search($ch[$i], $b)); // harf dizimizde şifre değerini arıyoruz. dönen yanıt karşılık gelen value değerinin sayısı
            $equal[] = (int)(fmod(($passvalue + $keyvalue), 26)+1); //şifreden dönen sayı ile keyden dönen sayıyı toplayıp 26'ya göre modunu alıyoruz ve integer a çevirip $equal dizisine ekliyoruz.

            $pass[] = $b[$equal[$i]]; //key değerinde ki harflere karşılık gelen sayıları, $b yani harfler dizimizde ki keylere denk gelen harflerle eşleştiriyoruz. Ve eşleşen harfler şifrelenmiş metnimiz oluyor
        }
    }

    $pass = (implode($pass)); //sifre dizisini string'e çeviriyoruz
    header("Location:index.php?encryptedtext=" . base64_encode($pass));
}
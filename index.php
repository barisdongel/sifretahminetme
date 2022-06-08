<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Crypting</title>
    <meta name="author" content="Barış Ömer DÖNGEL">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="text-center">
<span>Barış Ömer DÖNGEL</span>
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <h2 class="display-4 text-center mb-5 pb-5">PHP ENCRYPTPING AND DECRYPTING APP</h2>
            <div class="col-md-12">

                <form action="crypting.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">What do you want to encrypt ?</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Key Value</label>
                        <input type="text" name="key" class="form-control">
                    </div>
                    <button type="submit" name="encrypt" class="btn btn-info text-white rounded-0">Encrypt</button>
                </form>

            </div>
            <div class="col-md-6 justify-content-center">
                <br>
                <br>
                <label class="form-label fw-bold border-bottom text-success">
                    <?php 
                    if (!empty($_GET['encryptedtext'])) {
                        echo "DECRYPTED TEXT : " . base64_decode($_GET['encryptedtext']);
                    } else {
                        echo '';
                    }
                    ?>
                </label>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
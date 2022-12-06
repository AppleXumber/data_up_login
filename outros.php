<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="upload.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="imagens.php">Imagens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="docs.php">Docs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="databases.php">Databases</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="textos.php">Textos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="outros.php">Outros</a>
        </li>
    </ul>

</body>
</html>

<?php
    include("php/validador.php"); // Chama o validador para a pagina

    $pasta = "arquivos/outros/";

    $globArquivos = glob("$pasta{*.*}", GLOB_BRACE); 

    foreach ($globArquivos as $arquivo) {
        echo "<p><a download href='$arquivo'>$arquivo</a></p>";
    }
?>
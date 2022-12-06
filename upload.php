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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <input type="date" name="inputData">
        <input class="btn btn-primary" type="submit">
    </form>
    
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
    $pasta = "arquivos/";

    // Esses arrays designam a separação dos dominios
    $domImg = ["jpg", "png", "JPG", "JPEG", "bmp", "gif", "jfif"];
    $domDB = ["sql"];
    $domDoc = ["pdf"];
    $domTxt = ["txt", "html", "php", "js"];

    if (isset($_FILES["arquivo"]["size"])) {
        $tamanho = $_FILES["arquivo"]["size"]; // Pega o tamanho do arquivo
    }

    if (isset($_FILES["arquivo"])) {
        if($tamanho > 3097152) { // Se o tamanho do arquivo foi maior que 3mb
            alerta("Arquivo muito grande");
        } else {
            $dominio = pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION); // Pega o domínio do arquivo
    
            // Esses if's designam a pasta que o arquivo irá
            if(in_array($dominio, $domImg)) {
                $pasta = "arquivos/imagens/";
            } elseif(in_array($dominio, $domDB)) {
                $pasta = "arquivos/databases/";
            } elseif (in_array($dominio, $domTxt)) {
                $pasta = "arquivos/textos/";
            } elseif (in_array($dominio, $domDoc)) {
                $pasta = "arquivos/doc/";
            } else {
                $pasta = "arquivos/outros/";
            }
    
            if(!(is_dir("$pasta"))) { // Se a pasta não existe
                mkdir("$pasta", 0777); // Criar pasta
            }
        }
        if(isset($_FILES["arquivo"]["name"])) { // Se existe arquivo em upload
            $arquivoUpload = $pasta.basename($_FILES["arquivo"]["name"]); // Arquivo upload recebe o arquivo
        }
    
        move_uploaded_file($_FILES["arquivo"]["tmp_name"], $arquivoUpload); // Envia o arquivo para a pasta
    }
    
    if (isset($_POST["inputData"])) {
        $dataPost = $_POST["inputData"];
        $data = date("d/m/Y", strtotime("$dataPost + 10 day"));
        echo "Data+10 dias: $data";
    }
?>
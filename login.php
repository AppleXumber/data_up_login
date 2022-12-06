<?php
include("php/conexao.php");

function invalido() {?>
    <script>
        alert("Senha inválida");
        document.location.assign("index.php")
    </script>
    <?php
    setcookie("usuario");
    setcookie("senha");
}

if(isset($_POST["usuario"])) { // Se tem o valor no post Usuario
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $consulta = mysqli_query($conexao, "SELECT * FROM login_uc7 WHERE usuario='$usuario'"); // Pega o usuario que tem o mesmo nome no BD

    $dados = mysqli_fetch_assoc($consulta);

    if ($dados["senha"] != "") { // Se a senha do BD não é vazia
        $senhaBD = $dados["senha"]; // SenhaBD pega o valor
    } else {
        invalido();
    }
    if ($senha != "") { // Se a senha digitada não é nula
        if(md5($senha) == $senhaBD) {
            header("location: upload.php");
            setcookie("usuario", $usuario);
            setcookie("senha", md5($senha));
        } else {
            invalido();
        }
    } 
} else {
    invalido();
}

?>
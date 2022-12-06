<?php
    include("conexao.php");

    function alerta($texto) {?>
        <script>
            alert('<?=$texto?>');
        </script>
        <?php
    }

    function recusar() {
        alerta("Login inválido");
        setcookie("usuario");
        setcookie("senha");
        header("location:index.php");
        exit;
    }

    /* Só pega os valores das variaveis do cookie se elas existirem */
    if(isset($_COOKIE["usuario"])) {
        $usuario = $_COOKIE["usuario"];
    }

    if(isset($_COOKIE["senha"])) {
        $senha = $_COOKIE["senha"];
    }

    if(!(empty($usuario) or empty($senha))) { // Se as variveis existirem
        $consultaSQL = "SELECT * FROM login_uc7 WHERE usuario = '$usuario'";
        
        $querySQL = mysqli_query($conexao, $consultaSQL);
        $count = mysqli_num_rows($querySQL);

        if($count == 1) { // Se houver registro, segue
            $dados = mysqli_fetch_assoc($querySQL);
            $usuarioBD = $dados["usuario"];
            $senhaBD = $dados["senha"];

            if($senha != $senhaBD) {
                recusar();
            }
        } else {
            recusar();
        }
    } else {
        recusar();
    }

    

?>
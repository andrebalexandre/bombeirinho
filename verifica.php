<?php
    session_start();
    $login = $_POST["login"]; //pega o input
    $senha = $_POST["senha"];
echo($login);
echo($senha);
    include("conecta.php"); //conecta com o banco de dados

        $comando = $pdo->prepare("SELECT * FROM cadastro where login= '$login' and senha= '$senha' ");
        $resultado = $comando->execute();
        $n = 0;
        $admin = "n";

    while( $linhas = $comando->fetch())

        {
            $n = 1;
            $admin = $linhas["admin"];
            echo("entrei aqui");
        }

        if($n ==0)
        {
           // header("Location: index.html");
        }
        if($n ==1)
        {
            if($admin== "s")
        {
            
            $_SESSION["logado"] = $login;
           header("Location: pedidospendentes_adm.php");
        }
        else
        {
            $_SESSION["logado"] = $login;
            header("Location: html/inicial.html");
        }

        }

echo($admin);
?>
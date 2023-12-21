<?php
session_start();

if (empty($_POST) or (empty($_POST["usuario"])) or (empty($_POST["senha"]))){
    print "<script>location.href='index.php';</script>";
}

include("conexao.php");
$conn = getConnetion();

$user = $_POST["usuario"];
$pass = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE usuario = '{$user}' AND senha = '{$pass}'";

$stmt = $conn->query($sql) or die($conn->errorCode());

$row = $stmt->fetchObject();

$qtd = $stmt->rowCount();

if ($qtd > 0){
    $_SESSION["usuario"] = $user;
    $_SESSION["nome"] = $row->nome;
    print "<script>location.href='dashboard.php';</script>";
}else{
    print "<script>alert('Usuário ou senha incorretos');</script>";
    print "<script>location.href='index.php';</script>";
}


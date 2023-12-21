<?php

function getConnetion(){

    try {
        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=projetopw2;charset=utf8', 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e){
        echo "Erro na coneção: " . $e -> getMessage();
        return null;
    }
}

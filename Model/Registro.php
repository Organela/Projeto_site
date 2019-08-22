<?php
Class Registro{
private $nome;
private $email;
private $cpf;
private $endereco;
private $cidade;
private $uf;
private $senha;
private $csenha;

function __construct($nome, $email, $cpf, $endereco, $cidade, $uf, $senha, $csenha) {
    $this->nome = $nome;
    $this->email = $email;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->uf = $uf;
    $this->senha = $senha;
    $this->csenha = $csenha;
}

function getNome() {
    return $this->nome;
}

function getEmail() {
    return $this->email;
}

function getCpf() {
    return $this->cpf;
}

function getEndereco() {
    return $this->endereco;
}

function getCidade() {
    return $this->cidade;
}

function getUf() {
    return $this->uf;
}

function getSenha() {
    return $this->senha;
}

function getCsenha() {
    return $this->csenha;
}

function setNome($nome) {
    $this->nome = $nome;
}

function setEmail($email) {
    $this->email = $email;
}

function setCpf($cpf) {
    $this->cpf = $cpf;
}

function setEndereco($endereco) {
    $this->endereco = $endereco;
}

function setCidade($cidade) {
    $this->cidade = $cidade;
}

function setUf($uf) {
    $this->uf = $uf;
}

function setSenha($senha) {
    $this->senha = $senha;
}

function setCsenha($csenha) {
    $this->csenha = $csenha;
}



}
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


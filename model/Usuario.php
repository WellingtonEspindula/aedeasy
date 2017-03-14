<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Wellington
 */
require_once(dirname(__FILE__) . "./../bd/conexao.php");

class Usuario {

    private $idusuario;
    private $nome;
    private $email;
    private $login;
    private $senha;
    private $tipo;

    function getIdUsuario() {
        return $this->idusuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function getUsuarios() {
        $sql = "SELECT u.idusuario, u.login FROM usuario u";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Usuario");
    }

    function getUsuarioById($id) {
        $sql = "SELECT u.idusuario, u.login FROM usuario u"
                . " WHERE u.idusuario = :id";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Usuario");
        return $p_sql->fetch();
    }

    function excluir($id) {
        $sql = "DELETE FROM usuario WHERE usuario.idusuario = :id";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
    }

    function autentica($login, $pass) {
        $sql = "SELECT * FROM usuario "
                . "WHERE login = :login "
                . "AND senha = :pass";

        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":login", $login);
        $p_sql->bindValue(":pass", $pass);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Usuario");
        if ($p_sql->rowCount() > 0) {
            return $p_sql->fetch();
        } else {
            return false;
        }
    }

    function insert() {
        try {
            $sql = "INSERT INTO usuario (login, senha) VALUES (:login, :senha)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":login", $this->getLogin());
            $p_sql->bindValue(":senha", $this->getSenha());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

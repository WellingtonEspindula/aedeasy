<?php

require_once(dirname(__FILE__) . "./../bd/conexao.php");

class Dispositivo {

    private $iddispositivo;
    private $endereco_comp;
    private $localizacao_x;
    private $localizacao_y;
    private $nome_resp;
    private $telefone_resp;
    private $email_resp;

    function getIddispositivo() {
        return $this->iddispositivo;
    }

    function getEndereco_comp() {
        return $this->endereco_comp;
    }

    function getLocalizacao_x() {
        return $this->localizacao_x;
    }

    function getLocalizacao_y() {
        return $this->localizacao_y;
    }

    function getNome_resp() {
        return $this->nome_resp;
    }

    function getTelefone_resp() {
        return $this->telefone_resp;
    }

    function getEmail_resp() {
        return $this->email_resp;
    }

    function setIddispositivo($iddispositivo) {
        $this->iddispositivo = $iddispositivo;
    }

    function setEndereco_comp($endereco_comp) {
        $this->endereco_comp = $endereco_comp;
    }

    function setLocalizacao_x($localizacao_x) {
        $this->localizacao_x = $localizacao_x;
    }

    function setLocalizacao_y($localizacao_y) {
        $this->localizacao_y = $localizacao_y;
    }

    function setNome_resp($nome_resp) {
        $this->nome_resp = $nome_resp;
    }

    function setTelefone_resp($telefone_resp) {
        $this->telefone_resp = $telefone_resp;
    }

    function setEmail_resp($email_resp) {
        $this->email_resp = $email_resp;
    }

    function getDispositivos() {
        $sql = "SELECT * FROM dispositivo";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "Dispositivo");
    }

    function getDispositivo($id) {
        $sql = "SELECT d.iddispositivo, d.endereco_comp, d.localizacao_x, d.localizacao_y, d.nome_resp, d.telefone_resp, d.email_resp FROM dispositivo d "
                . "WHERE iddispositivo = :id";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $id);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "Dispositivo");
        return $p_sql->fetch();
    }
    
    function insert(){
        try {
            $sql = "INSERT INTO dispositivo (endereco_comp, localizacao_x, localizacao_y, nome_resp, telefone_resp, email_resp) VALUES "
                    . "(:endereco_comp, :localizacao_x, :localizacao_y, :nome_resp, :telefone_resp, :email_resp);";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":endereco_comp", $this->getEndereco_comp());
            $p_sql->bindValue(":localizacao_x", $this->getLocalizacao_x());
            $p_sql->bindValue(":localizacao_y", $this->getLocalizacao_y());
            $p_sql->bindValue(":nome_resp", $this->getNome_resp());
            $p_sql->bindValue(":telefone_resp", $this->getTelefone_resp());
            $p_sql->bindValue(":email_resp", $this->getEmail_resp());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    function excluir($id){
        try {
            $sql = "DELETE FROM dispositivo WHERE iddispositivo = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);

            return $p_sql->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

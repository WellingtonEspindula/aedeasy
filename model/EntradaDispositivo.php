<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntradaDispositivo
 *
 * @author Wellington
 */
require_once(dirname(__FILE__) . "./../bd/conexao.php");

class EntradaDispositivo {

    private $identrada_dispositivo;
    private $condutividade;
    private $ppm;
    private $salinidade;
    private $hora_entrada;
    private $dispositivo;

    function getIdentrada_dispositivo() {
        return $this->identrada_dispositivo;
    }

    function getCondutividade() {
        return $this->condutividade;
    }

    function getPpm() {
        return $this->ppm;
    }

    function getSalinidade() {
        return $this->salinidade;
    }

    function getHora_entrada() {
        return $this->hora_entrada;
    }

    function getDispositivo() {
        return $this->dispositivo;
    }

    function setIdentrada_dispositivo($identrada_dispositivo) {
        $this->identrada_dispositivo = $identrada_dispositivo;
    }

    function setCondutividade($condutividade) {
        $this->condutividade = $condutividade;
    }

    function setPpm($ppm) {
        $this->ppm = $ppm;
    }

    function setSalinidade($salinidade) {
        $this->salinidade = $salinidade;
    }

    function setHora_entrada($hora_entrada) {
        $this->hora_entrada = $hora_entrada;
    }

    function setDispositivo($dispositivo) {
        $this->dispositivo = $dispositivo;
    }

    function getEntradasByDispositivo($iddispositivo) {
        $sql = "SELECT ed.identrada_dispositivo, ed.condutividade, ed.ppm, ed.salinidade, ed.hora_entrada FROM entrada_dispositivo ed "
                . "JOIN dispositivo d ON ed.dispositivo_iddispositivo = d.iddispositivo "
                . "WHERE d.iddispositivo = :id "
                . "ORDER BY ed.hora_entrada ASC "
                . "LIMIT 10";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $iddispositivo);
        $p_sql->execute();

        return $p_sql->fetchAll(PDO::FETCH_CLASS, "EntradaDispositivo");
    }

    function getLastEntradaByDispositivo($iddispositivo) {
        $sql = "SELECT ed.identrada_dispositivo, ed.condutividade, ed.ppm, ed.salinidade, ed.hora_entrada FROM entrada_dispositivo ed "
                . "JOIN dispositivo d ON ed.dispositivo_iddispositivo = d.iddispositivo "
                . "WHERE d.iddispositivo = :id "
                . "ORDER BY ed.hora_entrada DESC "
                . "LIMIT 1";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->bindValue(":id", $iddispositivo);
        $p_sql->execute();
        $p_sql->setFetchMode(PDO::FETCH_CLASS, "EntradaDispositivo");
        return $p_sql->fetch();
    }

    function insert() {
        try {
            $sql = "INSERT INTO entrada_dispositivo (condutividade, ppm, salinidade, dispositivo_iddispositivo, hora_entrada) "
                    . "VALUES (:condutividade, :ppm, :salinidade, :dispositivo_iddispositivo, now())";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":condutividade", $this->getCondutividade());
            $p_sql->bindValue(":ppm", $this->getPpm());
            $p_sql->bindValue(":salinidade", $this->getSalinidade());
            $p_sql->bindValue(":dispositivo_iddispositivo", $this->getDispositivo());
            return $p_sql->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

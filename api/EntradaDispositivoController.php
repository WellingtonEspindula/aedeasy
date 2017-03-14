<?php

require_once(dirname(__FILE__) . "./../model/EntradaDispositivo.php");
use \Jacwright\RestServer\RestException;

class EntradaDispositivoController
{

    /**
     * Saves a user to the database
     *
     * @url POST /entradadispositivo
     */
    public function saveEntradaDispositivo($data)
    {
        // ... validate $data properties such as $data->username, $data->firstName, etc.
        // $data->id = $id;
        // $user = User::saveUser($data); // saving the user to the database
        $ed = new EntradaDispositivo;
        $ed->setCondutividade($data->condutividade);
        $ed->setPpm($data->ppm);
        $ed->setSalinidade($data->salinidade);
        $ed->setDispositivo($data->dispositivo);
        
        if ($ed->insert())
            return "Data successfully registred!";
        else 
            return "A error has ocurred saving the data!";
    }


    /**
     * Throws an error
     * 
     * @url GET /error
     */
    public function throwError() {
        throw new RestException(401, "Empty password not allowed");
    }
}
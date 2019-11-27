<?php
require ('Juridica.php');

class ClienteJ extends Juridica
{
    private $id = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function validaDocumento() {
        return "CNPJ válido";
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
<?php
interface iAnimal{
    public function atendeAnimal();
    public function excluiAnimal($id);
    public function editaAnimal($id);
    public function cadastraAnimal(Animal $animal);
}
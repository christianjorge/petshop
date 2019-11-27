<?php
interface iFinanceiro{
    public function comprar();
    public function removerItem();
    public function reduzirQuantidade($quant);
}
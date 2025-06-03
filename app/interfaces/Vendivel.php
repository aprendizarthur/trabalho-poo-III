<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\interfaces;

//interface que será implementada por todos os produtos que podem ser vendidos, tornando obrigatórios os seus métodos
interface Vendivel
{
    public function processarVendaProduto() : void;
    public function cancelarVendaProduto() : void;
}
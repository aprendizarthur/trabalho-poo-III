<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\classes;

//classe abstrata que define propriedades e métodos para todos produtos herdarem
abstract class Produto
{

    //método construtor com propriedades necessárias em todos os produtos
    public function __construct(protected string $nome, protected string $fabricante, protected string $descricao, protected float $valor){

    } 

    //método getter retornando nome
    public function getNome() : string{
        return $this->nome;
    }

    //método getter retornando descricao
    public function getDescricao() : string{
        return $this->descricao;
    }

    //método getter retornando fabricante
    public function getFabricante() : string{
        return $this->fabricante;
    }

    //método getter retornando valor
    public function getValor() : float{
        return $this->valor;
    }
}
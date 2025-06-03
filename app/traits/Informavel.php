<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\traits;

use app\classes\produto;
use app\classes\comercio;

//trait utilizada para exibir para o usuário dados de produto(s)/clientes do comércio
trait Informavel
{
    //método para exibir todos os produtos/clientes de um comércio
    public function detalhesComercio() : array{
        $detalhes = [];
        foreach($this->produtosRegistrados as $produto){
            $detalhes[] = "Nome: ".$produto->getNome()." Descrição: ".$produto->getDescricao()." Fabricante: ".$produto->getFabricante()." Valor: ".$produto->getValor();
        }

        foreach($this->clientesRegistrados as $cliente){
            $detalhes[] = "Nome: ".$cliente->getNome()." CPF: ".$cliente->getCPF();
        }
        return $detalhes;
    }

    //método para exibir detalhes de produto específico
    public function detalhesProduto() : string{
        return "Nome: ".$this->nome." Descrição: ".$this->descricao." Fabricante: ".$this->fabricante." Valor: ".$this->valor."<br>";
    }

    //método para exibir todos os produtos comprados por um usuário
    public function produtosCompradosCliente() : array{
        $detalhes = [];
        foreach($this->produtosComprados as $produto){
            $detalhes[] = "Nome: ".$produto->getNome()." Descrição: ".$produto->getDescricao()." Fabricante: ".$produto->getFabricante()." Valor: ".$produto->getValor();
        }
        return $detalhes;
    }
}
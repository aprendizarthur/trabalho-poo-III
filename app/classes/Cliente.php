<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\classes;

//classe para cliente
class Cliente
{
    //array que armazena produtos comprados pelo cliente
    private array $produtosComprados = [];

    //adicionando trait que lida com logs
    use \app\traits\logavel;

    //constante que define cliente como clinete pessoa física
    const PESSOA_FISICA = true;

    //traits para reutilização de código
    //adicionando trait mostra todos os produtos comprados pelo cliente
    use \app\traits\informavel;

    //construtor do cliente
    public function __construct(private string $nome, private string $cpf, private int $idade){
        $mensagem = "Cliente ".$this->nome." criado";
        $this->adicionarLog($mensagem);
    }

    //método para adicionar produto comprado ao cliente
    public function adicionarProdutoComprado(Produto $produto) : void{
        $this->produtosComprados[] = $produto;
        $mensagem = "Produto ".$produto->getNome()." entregue para o cliente ".$this->nome;
        $this->adicionarLog($mensagem);
    }

    //método para remover um produto comprado pelo cliente
    public function removerProdutoComprado(Produto $produto) : void{
        foreach($this->produtosComprados as $index => $comprado){
            if($comprado === $produto){
                unset($this->produtosComprados[$index]);
                $this->produtosComprados = array_values($this->produtosComprados);            }
        }

        $mensagem = "Venda cancelada e produto ".$produto->getNome()." foi retirado de ".$this->nome;
        $this->adicionarLog($mensagem);
    }

    //método getter retornando produtos comprados
    public function getProdutosComprados(){
        return $this->produtosComprados;
    }

    //método getter retornando nome do cliente
    public function getNome() : string{
        return $this->nome;
    }

    //método getter retornando cpf do cliente
    public function getCPF() : string{
        return $this->cpf;
    }

    //método getter retornando idade do cliente
    public function getIdade() : int{
        return $this->idade;
    }
}
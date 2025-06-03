<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\classes;

use app\classes\produto;

//teclado extends produto demonstra herança da classe abstrata
class Teclado extends Produto
{
    //propriedade estática que armazena o estoque do produto
    private static int $estoque = 3;
    //constante que armazena desconto no produto
    const DESCONTO = 0.10;
    //propriedade que vai receber o preco final do produto na venda
    private float $precoFinal = 0;
    
    //propriedade única do teclado é o padrão

    //traits para reutilização de código
    //adicionando trait que lida com logs
    use \app\traits\logavel;
    //adicionando trait que exibe detalhes do produto
    use \app\traits\informavel;

    //construtor do mouse herdando construtor de produto
    public function __construct(private string $padrao, private string $nome, private string $fabricante, private string $descricao, private float $valor){
        parent::__construct($nome, $fabricante, $descricao, $valor);
        $mensagem = "Teclado ".$this->nome." criado";
        $this->adicionarLog($mensagem);
    }

    //método getter retornando preço final de um produto
    public function getPrecoFinal() : float{
        return $this->precoFinal;
    }

    //método getter retornando padrão do teclado
    public function getPadrao() : string{
        return $this->padrao;
    }

    //método getter retornando estoque do produto
    public function getEstoque() : int{
        return self::$estoque;
    }

    //método para adicionar um de estoque para o produto
    public function adicionarEstoque() : void{
        self::$estoque++;
        $mensagem = "Venda cancelada e adicionado um produto ".$this->nome." ao estoque";
        $this->adicionarLog($mensagem);
    }
}
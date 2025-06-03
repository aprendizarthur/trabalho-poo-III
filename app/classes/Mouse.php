<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\classes;
use app\classes\produto;
use app\interfaces\vendivel;

//mouse extendes produto demonstra herança da classe abstrata e implements vendivel demonstra que a interface foi implementada
class Mouse extends Produto implements Vendivel
{
    //propriedade estática que armazena o estoque do produto
    private static int $estoque = 3;
    //constante que armazena desconto no produto
    const DESCONTO = 0.05;
    //propriedade que vai receber o preco final do produto na venda
    private float $precoFinal = 0;
    
    //propriedade única do produto mouse é DPI

    //traits para reutilização de código
    //adicionando trait que lida com logs
    use \app\traits\logavel;
    //adicionando trait que exibe detalhes do produto
    use \app\traits\informavel;

    //construtor do mouse herdando construtor de produto
    public function __construct(private int $DPI, private string $nome, private string $fabricante, private string $descricao, private float $valor){
        parent::__construct($nome, $fabricante, $descricao, $valor);
        $mensagem = "Mouse ".$this->nome." criado";
        $this->adicionarLog($mensagem);
        $this->precoFinal = $this->valor * (1 - self::DESCONTO);
    }

    //método obrigatório da interface vendível que processa a venda
    public function processarVendaProduto() : void{
        self::$estoque--; 
    }
    
    public function cancelarVendaProduto() : void{
        self::$estoque++;
    }

    //método getter retornando preço final de um produto
    public function getPrecoFinal() : float{
        return $this->precoFinal;
    }

    //método getter retornando dpi do mouse
    public function getDPI() : int{
        return $this->DPI;
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
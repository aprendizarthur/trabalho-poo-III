<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\classes;
use app\classes\mouse;
use app\classes\produto;

//classe para comércio que vai administrar vendas relacionando produtos e clientes
class Comercio
{
    //array que armazena produtos registrados no comercio
    private array $produtosRegistrados = [];
    //array que armazena clientes registrados no comercio
    private array $clientesRegistrados = [];
    //propriedade que armazena o total de produtos registrado
    private static int $totalProdutosRegistrados = 0;
    //constante que define comércio como de eletronicos
    const CATEGORIA_COMERCIO = "Eletrônicos";

    //traits para reutilização de código
    //adicionando trait que lida com logs
    use \app\traits\logavel;
    //adicionando trait que informa detalhes de todos produtos/clientes do comercio
    use \app\traits\informavel;

    //construtor do comercio
    public function __construct(private string $nome, private string $endereco){
        $mensagem = "Comércio ".$this->nome." criado";
        $this->adicionarLog($mensagem);
    }

    //método para vender um produto para cliente
    public function venderProduto(Produto $produto, Cliente $cliente) : void {
        //verificando se o produto é cadastrado no comércio
        $validacaoProduto = false;

        foreach($this->produtosRegistrados as $registrado){
            if($registrado->getNome() === $produto->getNome() && $registrado->getDescricao() === $produto->getDescricao()){
                $validacaoProduto = true;
                break;
            }
        }

        if(!$validacaoProduto){
            $mensagem = "Venda cancelada, o produto ".$produto->getNome()." não está cadastrado no comércio ".$this->nome;
            $this->adicionarLog($mensagem);
            return;
        }

        //verificando se o cliente é cadastrado no comércio
        $validacaoCliente = false;
        foreach($this->clientesRegistrados as $registrado){
            if($registrado->getNome() === $cliente->getNome() && $registrado->getCPF() === $cliente->getCPF()){
                $validacaoCliente = true;
                break;
            }
        }

        if(!$validacaoCliente){
            $mensagem = "Venda cancelada, o cliente ".$cliente->getNome()." não está cadastrado no comércio ".$this->nome;
            $this->adicionarLog($mensagem);
            return;
        }

        //verificando se o produto tem estoque
        if($produto->getEstoque() <= 0){
            $mensagem = "Venda cancelada, o produto ".$produto->getNome()." está sem estoque no momento";
            $this->adicionarLog($mensagem);
            return;
        }

        //se passar pelas verificacoes, processa a venda
        $cliente->adicionarProdutoComprado($produto);
        $produto->processarVendaProduto();
        $mensagem = "Venda de ".$produto->getPrecoFinal()." do produto ".$produto->getNome()." feita para ".$cliente->getNome();
        $this->adicionarLog($mensagem);
    }

    //método para cancelar uma venda
    public function cancelarVenda(Produto $produto, Cliente $cliente) : void{
        //verificando se o produto é cadastrado no comércio
        $validacaoProduto = false;

        foreach($this->produtosRegistrados as $registrado){
            if($registrado->getNome() === $produto->getNome() && $registrado->getDescricao() === $produto->getDescricao()){
                $validacaoProduto = true;
                break;
            }
        }

        if(!$validacaoProduto){
            $mensagem = "Impossível cancelar a venda, o produto ".$produto->getNome()." não está cadastrado no comércio ".$this->nome;
            $this->adicionarLog($mensagem);
            return;
        }

        //verificando se o cliente é cadastrado no comércio
        $validacaoCliente = false;
        foreach($this->clientesRegistrados as $registrado){
            if($registrado->getNome() === $cliente->getNome() && $registrado->getCPF() === $cliente->getCPF()){
                $validacaoCliente = true;
                break;
            }
        }

        if(!$validacaoCliente){
            $mensagem = "Impossível cancelar a venda, o cliente ".$cliente->getNome()." não está cadastrado no comércio ".$this->nome;
            $this->adicionarLog($mensagem);
            return;
        }

        //verificando se o cliente comprou este produto alguma vez
        $validacaoCompra = false;

        foreach($cliente->getProdutosComprados() as $comprado){
            if($comprado === $produto){
                $validacaoCompra = true;
                break;
            }
        }

        //remover produto dos comprados pelo usuario
        $cliente->removerProdutoComprado($produto);
        //adicionar um ao estoque do produto
        $produto->adicionarEstoque();
        $mensagem = "Venda do produto ".$produto->getNome()." para ".$cliente->getNome()." cancelada.";
        $this->adicionarLog($mensagem);
    }

    //método para registrar novo produto no comércio
    public function registrarProduto(Produto $produto) : void{
        //verificando se o produto já existe no comércio
        foreach($this->produtosRegistrados as $registrado){
            if($registrado->getNome() === $produto->getNome() && $registrado->getDescricao() === $produto->getDescricao()){
                $mensagem =  "Produto ".$produto->getNome()." já está registrado no comércio ".$this->nome;
                $this->adicionarLog($mensagem);
                return;
            }
        }

        //se não existe é registrado
        $this->produtosRegistrados[] = $produto;
        self::$totalProdutosRegistrados++;
        $mensagem = "Produto ".$produto->getNome()." registrado no comércio ".$this->nome;
        $this->adicionarLog($mensagem);
    }

    //método para registrar novo cliente no comércio
    public function registrarCliente(Cliente $cliente) : void{
        //verificando se o cliente já existe no comércio
        foreach($this->clientesRegistrados as $registrado){
            if($registrado->getNome() === $cliente->getNome() && $registrado->getCPF() === $cliente->getCPF()){
                $mensagem = "Cliente ".$cliente->getNome(). " já registrado no comércio ".$this->nome;
                $this->adicionarLog($mensagem);
                return;
            }
        }

        //se não existe é registrado
        $this->clientesRegistrados[] = $cliente;
        $mensagem = "Cliente ".$cliente->getNome()." registrado no comércio ".$this->nome;
        $this->adicionarLog($mensagem);
    }

    //método getter retornando nome comércio
    public function getNome() : string{
        return $this->nome;
    }

    //método getter retornando endereco do comércio
    public function getEndereco() : string{
        return $this->endereco;
    }

    //método getter retornando produtos registrados
    public function getTotalProdutosRegistradosComercio() : int{
        return self::totalProdutosRegistrados;
    }
}
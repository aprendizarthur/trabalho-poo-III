<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
require("vendor/autoload.php");

use app\classes\mouse;
use app\traits\logavel;
use app\classes\cliente;
use app\classes\teclado;
use app\classes\comercio;
use app\traits\informavel;

//criando comércio 
$comercioPICHAU = new Comercio("Pichau", "Avenida Flores da Cunha nº 203");
$comercioLOGITECH = new Comercio("Logitech", "Rua Emiliano Dias nº21");

//criando produtos
$mouseDEATHADER = new Mouse(21000, "Deathader", "Razer", "Mouse gamer com 21000 de DPI da Razer", 218.90);
$tecladoLOGITECH = new Teclado("ABNT2", "Logitech C30", "Logitech", "Teclado gamer padrão ABNT2 feito para jogos FPS", 679.90);

//criando clientes
$clienteArthur = new Cliente("Arthur Borges Vieira", "201.204.203-22", 20);

//registrando produtos em comércios
$comercioPICHAU->registrarProduto($mouseDEATHADER);
$comercioPICHAU->registrarProduto($mouseDEATHADER);
$comercioLOGITECH->registrarProduto($tecladoLOGITECH);

//registrando clientes em comércios
$comercioPICHAU->registrarCliente($clienteArthur);
$comercioPICHAU->registrarCliente($clienteArthur);
$comercioLOGITECH->registrarCliente($clienteArthur);

//realizando a venda do MOUSE para ARTHUR
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->cancelarVenda($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);
$comercioPICHAU->venderProduto($mouseDEATHADER, $clienteArthur);

//verificando detalhes de produtos individualmente
echo $mouseDEATHADER->detalhesProduto();
echo $tecladoLOGITECH->detalhesProduto();

//verificando todos produtos/clientes registrados no comércio
$detalhes = $comercioPICHAU->detalhesComercio();
foreach($detalhes as $detalhe){
    echo $detalhe."<br>";
}

//verificando todos os produtos comprados pelo cliente
$produtos = $clienteArthur->produtosCompradosCliente();
foreach($produtos as $produto){
    echo $produto."<br>";
}

//logs produto MOUSE DEATHADER
$logs = $mouseDEATHADER->getlogs();
foreach($logs as $log){
    echo $log."<br>";
}

//logs produto TECLADO LOGITECH
$logs = $tecladoLOGITECH->getlogs();
foreach($logs as $log){
    echo $log."<br>";
}

//logs comércio PICHAU
$logs = $comercioPICHAU->getlogs();
foreach($logs as $log){
    echo $log."<br>";
}

//logs comércio LOGITECH
$logs = $comercioLOGITECH->getlogs();
foreach($logs as $log){
    echo $log."<br>";
}

//logs produto CLIENTE ARTHUR
$logs = $clienteArthur->getlogs();
foreach($logs as $log){
    echo $log."<br>";
}
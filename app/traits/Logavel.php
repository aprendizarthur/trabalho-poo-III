<?php
//declaração que ativa tipagem estrita
declare(strict_types=1);
namespace app\traits;

//trait que cria, armazena e exibe logs do sistema
trait Logavel
{
    //array que armazena os logs
    private array $logs = [];

    //método da trait para adicionar um log
    public function adicionarLog(string $mensagem) : void{
        $this->logs[] = $mensagem;
    }

    //método getter da trait para retornar logs
    public function getLogs() : array{
        return $this->logs;
    }
}
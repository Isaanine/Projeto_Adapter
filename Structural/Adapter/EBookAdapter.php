<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * A classe adaptadora permite que o cliente utilize um leitor digital (EBook) 
 * como se fosse um livro físico tradicional (Book).
 */
class EBookAdapter implements Book
{
    /**
     * Recebe a instância do sistema externo incompatível via composição.
     */
    public function __construct(private EBook $eBook)
    {
    }

    /**
     * Adapta a ação padrão de abrir o livro para o comando de 
     * desbloquear a tela do leitor digital.
     */
    public function open(): void
    {
        $this->eBook->unlock();
    }

    /**
     * Adapta a ação de virar a página para o comando de 
     * avançar para a próxima tela no leitor digital.
     */
    public function turnPage(): void
    {
        $this->eBook->pressNext();
    }

    /**
     * Resolve a incompatibilidade do tipo de retorno.
     * O contrato de Book exige um inteiro, mas EBook retorna um array.
     * Esta função extrai a página atual e a retorna no formato correto.
     */
    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}
# Padrão de Projeto: Adapter (PHP)

Este repositório contém a atividade de implementação do padrão estrutural **Adapter**. O objetivo é criar uma camada intermediária que permita a um código cliente, desenvolvido para consumir a interface `Book`, interagir com o sistema legado/externo `EBook` (Kindle).

## 👥 Integrantes
- Ana Beatriz Novais Pereira
- Isabelle Gomes de Souza Andrade


## 🛠️ Passos Executados

### 1. Clonagem do Repositório e Dependências
O projeto base foi clonado e o ambiente foi configurado através da instalação das dependências via Composer:

    git clone https://github.com/DesignPatternsPHP/DesignPatternsPHP.git
    cd DesignPatternsPHP
    composer install

### 2. Mapeamento do Domínio
A análise da pasta `Structural/Adapter` revelou as seguintes responsabilidades:
- **Interface Book (Target)**: Define o contrato padrão com os métodos `open()`, `turnPage()` e `getPage(): int`.
- **Interface EBook (Adaptee)**: Representa o subsistema incompatível, utilizando os métodos `unlock()`, `pressNext()` e `getPage(): array`.

### 3. Identificação do Conflito
Foi constatado que o cliente não pode instanciar e utilizar o `EBook` diretamente devido a duas divergências principais:
1. Os nomes dos métodos que executam as ações são diferentes.
2. O tipo de retorno do método de verificação de página difere (inteiro vs. array).

### 4. Criação e Implementação da Classe Adaptadora
- **Parte 1:** Criado o arquivo `EBookAdapter.php`.
- **Parte 2:** A classe implementa o contrato `Book` para garantir compatibilidade com o cliente. Através da **composição**, a classe recebe a instância de `EBook` via injeção de dependência no construtor.
- **Tradução:** As chamadas do cliente são interceptadas e redirecionadas para os métodos corretos do `EBook` (`unlock` e `pressNext`). No método `getPage()`, o retorno em array do `EBook` é tratado para devolver apenas o número inteiro correspondente à página, satisfazendo a interface original.

### 5. Validação
A integridade da implementação foi garantida através da execução com sucesso da suíte de testes unitários do PHPUnit (`phpunit tests/Structural/Adapter/`).

**AVALIADO 86/100**

Desenvolva um sistema em PHP orientado a objetos para gerenciar uma loja de produtos eletrônicos, utilizando o Composer para gerenciar dependências e autoload de classes, interfaces e traits. O sistema deve implementar os conceitos de propriedades, métodos, construtores, herança, relacionamentos, strict types, interfaces, encapsulamento, getters, traits, constantes e métodos/propriedades estáticas.

**Requisitos**:
1. Crie uma classe abstrata para representar produtos, com propriedades protegidas, construtor e getters.
2. Implemente uma interface para produtos que podem ser vendidos, com métodos para processar e cancelar vendas.
3. Crie pelo menos duas classes concretas que herdam da classe abstrata, uma implementando a interface e outra não, cada uma com pelo menos uma propriedade privada adicional e getter correspondente.
4. Crie uma classe para gerenciar clientes, com propriedades privadas, construtor, getters e uma lista de produtos comprados (relacionamento 1:N).
5. Utilize *strict types* (`declare(strict_types=1);`) em todos os arquivos.
6. Encapsule todas as propriedades com modificadores `private` ou `protected` e forneça getters.
7. Crie um **trait** para formatar informações dos objetos e outro para registrar logs de ações, usados por pelo menos duas classes.
8. Defina pelo menos uma **constante** em cada classe para valores fixos relevantes (ex.: categorias de produtos, taxas, etc.).
9. Implemente pelo menos um **método estático** e uma **propriedade estática** em uma das classes para gerenciar informações globais (ex.: contador de produtos ou estoque total).
10. Crie uma classe gerenciadora para administrar produtos e clientes, com métodos para adicionar produtos, registrar clientes, processar vendas e exibir informações usando o trait de formatação.
11. Organize classes, interfaces e traits em arquivos separados, com estrutura de diretórios (ex.: `src/Models`, `src/Interfaces`, `src/Traits`).
12. Configure o **Composer** para autoload de classes, interfaces e traits, incluindo `vendor/autoload.php` no arquivo principal.
13. Forneça um arquivo `index.php` que demonstre o funcionamento do sistema, criando instâncias, processando vendas e exibindo informações.
14. Inclua comentários explicando o uso de cada conceito (propriedades, métodos, construtores, herança, relacionamentos, strict types, interfaces, encapsulamento, getters, traits, constantes e métodos/propriedades estáticas).
15. O código deve ser funcional, com tipagem estrita e sem erros de execução.

**Avaliação**:
- Corretude na implementação dos conceitos de orientação a objetos, incluindo herança, interfaces, constantes e métodos/propriedades estáticas (40%).
- Uso adequado de *strict types*, encapsulamento, getters e Composer com autoload (25%).
- Implementação e uso correto de **traits** para reutilização de código (15%).
- Organização do código, clareza dos comentários e estrutura do projeto (20%).

# Oficina-2.0
Sistema para cadastrar, visualizar, editar e remover os orçamentos de uma empresa. Tarefa para avaliação técnica de candidatos ao time de desenvolvimento da Codificar Sistemas Tecnológicos.

# Tecnologias
A principal linguagem de programação utilizada é PHP com o framework Laravel, acompanhando comsequentemente outras tecnologias como HTML, CSS e Bootstrap.
O banco de dados escolhido foi o MySQL, por ser um banco de dados relacional compatível. Essa escolha foi feita devido a simplicidade e estaticidade da tabela a ser gerada pelo sistema.

# Requisitos
* <b> Ações: </b> Cadastrar, Pesquisar, Visualizar, Editar e Deletar Orçamentos
* <b> Campos: </b> ID, Nome do Cliente, Data e Hora do orçamento, Vendedor, Descrição, Valor Orçado
* <b> Filtros da Pesquisa: </b> Nome do Cliente, Nome do Vendedor, Intervalo de Data

# Funcionamento
* Para rodar o sistema, é necessário fazer o download deste repositório e utilizar um servidor mySQL (no desenvolvimento foi utilizado um servidor local com o auxílio do XAMPP). As configurações contidas no arquivo 'database.php' da pasta 'config' e no arquivo '.env' podem precisar ser alteradas de acordo com o servidor utilizado. 
* Para criar os bancos de dados e tabelas, o comando "php artisan migrate" deve ser executado na linha de comando dentro da pasta do projeto.
* Para popular o banco de dados com alguns orçamentos pré definidos, o comando "php artisan db:seed" deve ser executado na linha de comando dentro da pasta do projeto.
* Por fim, a aplicação pode ser executada utilizando o comando "php artisan serve" na linha de comando dentro da pasta do projeto.
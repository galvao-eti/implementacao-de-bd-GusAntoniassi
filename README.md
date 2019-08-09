# pos-alfa-2019

Trabalho final da turma de 2019 da Disciplina Orientação a Objetos usando PHP como Linguagem de Implementação.

Aluno: Gustavo Sabior Antoniassi

## Como executar o projeto (com Docker)
Para subir o servidor Apache + PostgreSQL + MariaDB, execute o seguinte comando:
```
docker-compose up -d
```
Depois, acesse o projeto em http://localhost:8080

## Como executar o projeto (sem Docker)
Para executar o projeto sem Docker, será necessário ter as extensões do PDO para os bancos que você desejar se conectar. 

- Configure o arquivo `src/config/connections.php` com as credenciais de acesso aos bancos de dados. 
- Caso não queira usar um dos bancos (PostgreSQL ou MariaDB), basta alterar a variável `$conexoesPermitidas` no arquivo `public/index.php`.
- Execute o SQL que está em `.docker/db/initdb.sql` dentro da base para criar a tabela e inserir os registros.
- Depois de configurar, execute o seguinte comando no terminal a partir da raíz do projeto: `php -S 0.0.0.0:8080 -t public`

Depois, acesse o projeto em http://localhost:8080

## Orientações

1. Inscreva-se no trabalho [neste link](https://classroom.github.com/a/M4OzaYm2);
2. Ao se inscrever, o repositório do trabalho será clonado para sua conta do github;
3. Neste clone, no arquivo README, coloque seu nome completo;
4. Este clone conterá uma interface "BancoDeDados";
5. Você deverá criar uma implementação (classe) concreta desta interface, salvando-a em src/PosAlfa2019 e um script de teste contendo uma execução de SQL, salvo em public/;
6. Ao finalizar seu trabalho você deverá fazer o git push para o seu repositório.
7. O prazo de entrega é no dia 11 de Agosto. Neste dia os repositórios serão baixados e o trabalho verificado e avaliado.

Em caso de Dúvidas envie um e-mail para galvao@galvao.eti.br com o assunto "Dúvida Pós Alfa".

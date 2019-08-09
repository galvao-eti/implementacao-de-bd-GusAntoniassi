<?php 

/**
 * Altere este arquivo para configurar a conexão com o servidor
 * de banco de dados
 * 
 * @author Gustavo Antoniassi <gus.antoniassi@gmail.com>
 */

return [
    'postgres' => [
        'host' => 'postgres', // nome do service do Docker
        'port' => getenv('POSTGRES_PORT'), // porta do banco
        'user' => getenv('DB_USER'), // usuário do banco
        'password' => getenv('DB_PASSWORD'), // senha do banco
        'dbname' => getenv('DB_NAME'), // nome da base
    ],
    'mariadb' => [
        'host' => 'mariadb', // nome do service do Docker
        'port' => getenv('MARIADB_PORT'), // porta do banco
        'user' => getenv('DB_USER'), // usuário do banco
        'password' => getenv('DB_PASSWORD'), // senha do banco
        'dbname' => getenv('DB_NAME'), // nome da base
    ]
];
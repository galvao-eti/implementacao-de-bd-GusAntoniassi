DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos (
    id SERIAL NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    matricula VARCHAR(255) NOT NULL, 
    ativo BOOLEAN NOT NULL DEFAULT FALSE,
    createdAt TIMESTAMP NOT NULL DEFAULT NOW(),
    updatedAt TIMESTAMP NOT NULL DEFAULT NOW(),

    CONSTRAINT alunos_pkey PRIMARY KEY (id)
);

INSERT INTO alunos (nome, email, cpf, matricula, ativo) VALUES
    ('Er Galvão Abott', 'galvao@php.net', '12345678900', '001', TRUE),
    ('Gus Antoniassi', 'gus.antoniassi@gmail.com', '12345678901', '002', TRUE)
;

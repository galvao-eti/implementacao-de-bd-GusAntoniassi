<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebDev Alfa | Orientação a Objetos | Exemplo</title>
</head>

<body>
    <?php
        $conexoesPermitidas = ['mariadb'];

        $conexao = filter_input(INPUT_GET, 'conexao', FILTER_SANITIZE_STRING);
        if (!in_array($conexao, $conexoesPermitidas)) {
            $conexao = $conexoesPermitidas[0];
        }

        $dsn = ['postgres' => 'pgsql', 'mariadb' => 'mysql'];

        $db = new \PosAlfa\BancoDeDados($conexao, $dsn[$conexao]);

        $conn = $db->getConnection();
        $stmt = $db->prepare($conn, 'SELECT * FROM alunos');
        $stmt->execute();

        $alunos = $stmt->fetchAll();
    ?>

    <div>
        <?php foreach ($conexoesPermitidas as $conexaoPermitida) { ?>
            <button 
                type="button" 
                <?= $conexao === $conexaoPermitida ? 'disabled="disabled"' : '' ?>
                onclick="setConexaoBanco('<?= $conexaoPermitida ?>')"
            >
                Ativar conexão <?= ucfirst($conexaoPermitida) ?>
            </button>
        <?php } ?>
    </div>

    <br/>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Matrícula</th>
                <th>Ativo</th>
                <th>Data de cadastro</th>
                <th>Última alteração</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno) { ?>
                <?php 
                    $cpfFormatado = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $aluno['cpf']);
                ?>
                <tr>
                    <td><?= $aluno['id'] ?></td>
                    <td><?= $aluno['nome'] ?></td>
                    <td><?= $aluno['email'] ?></td>
                    <td><?= $cpfFormatado ?></td>
                    <td><?= $aluno['matricula'] ?></td>
                    <td><?= $aluno['ativo'] ? 'Sim' : 'Não' ?></td>
                    <td><?= (new \DateTime($aluno['createdat']))->format('d/m/Y h:i:s') ?></td>
                    <td><?= (new \DateTime($aluno['updatedat']))->format('d/m/Y h:i:s')?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        function setConexaoBanco(conexao) {
            var url = new URL(window.location.href);
            url.searchParams.set('conexao', conexao);

            window.location.href = url.toString();
        }
    </script>
</body>

</html>
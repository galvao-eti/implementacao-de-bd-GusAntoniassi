<?php

declare(strict_types=1);

namespace PosAlfa;

/**
 * undocumented class
 */
class BancoDeDados implements \PosAlfa\Abstraction\BancoDeDados
{
    private $config;
    private $dsnPrefix;

    public function __construct(string $configKey, string $dsnPrefix)
    {
        $this->dsnPrefix = $dsnPrefix;
        $this->configureConnection($configKey);
    }

    public function connect(string $dsn, string $user, string $pass): \PDO
    {
        return new \PDO($dsn, $user, $pass, [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_CASE     => \PDO::CASE_LOWER
        ]);
    }

    public function getConnection(): \PDO
    {
        return $this->connect($this->getDsn(), $this->config['user'], $this->config['password']);
    }

    public function prepare(\PDO $dbh, string $sql): \PDOStatement
    {
        return $dbh->prepare($sql);
    }

    protected function configureConnection(string $configKey)
    {
        $config = require(dirname(__DIR__) . '/config/connections.php');

        if (empty($config[$configKey])) {
            throw new \RuntimeException(
                sprintf('Não há nenhuma configuração definida no arquivo connections.php para a chave: %s', $configKey)
            );
        }

        $this->config = $config[$configKey];
    }

    protected function getDsn(): string
    {
        return sprintf(
            '%s:host=%s;port=%s;dbname=%s',
            $this->dsnPrefix,
            $this->config['host'],
            $this->config['port'],
            $this->config['dbname']
        );
    }
}

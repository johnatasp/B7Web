<?php

require_once 'models/Vaga.php';

class VagaDaoMysql implements VagaDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Vaga $v)
    {
        $stmt = $this->pdo->prepare("INSERT INTO vagas (titulo, descricao, ativo) VALUES (:titulo, :descricao, :ativo)");
        $stmt->bindValue(':titulo', $v->getTitulo());
        $stmt->bindValue(':descricao', $v->getDescricao());
        $stmt->bindValue('ativo', $v->getAtivo());
        $stmt->execute();

        $v->setId($this->pdo->lastInsertId());
        return $v;
    }

    public function findAll()
    {
        $array = [];

        $sqlSelect = $this->pdo->query("SELECT * FROM vagas");
        if ($sqlSelect->rowCount() > 0) {
            $row = $sqlSelect->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $item) {
                $vaga = new Vaga();
                $vaga->setId($item['id']);
                $vaga->setTitulo($item['titulo']);
                $vaga->setDescricao($item['descricao']);
                $vaga->setAtivo($item['ativo']);

                $array[] = $vaga;
            }
        }
        return $array;
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM vaga WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $vaga = new Vaga();

        }
    }

    public function update(Vaga $v)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function findByTitulo($titulo)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM vagas WHERE titulo = :titulo");
        $stmt->bindValue(':titulo', $titulo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();

            $v = new Vaga();
            $v->setTitulo($row['titulo']);
            $v->setDescricao($row['descricao']);
            $v->setAtivo($row['ativo']);

            return $v;

        } else {
             return false;
        }
    }
}
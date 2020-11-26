<?php


class Vaga
{
    private int $id;
    private string $titulo;
    private string $descricao;
    private string $ativo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }
}

interface VagaDAO 
{
    public function add(Vaga $v);
    public function findAll();
    public function findById($id);
    public function findByTitulo($titulo);
    public function update(Vaga $v);
    public function delete($id);
    
}
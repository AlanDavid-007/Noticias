<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Noticia
{
    /** 
     * Identificador único da noticia
     * @var integer
     */
    public $id;

    /** 
     * Título da noticia
     * @var string
     */
    public $titulo;

    /** 
     * Descrição da noticia (pode conter html)
     * @var string
     */
    public $descricao;

    /** 
     * Autor da noticia
     * @var string
     */
    public $autor;


    /** 
     * Data da publicação da noticia
     * @var timestamp
     */
    public $data;
    
    /** 
     * Define se a noticia está ativa (s or n)
     * @var string
     */
    public $status;

    

    /** 
     * Função para cadastrar a noticia no banco
     * @var boolean
     */

    public function cadastrar()
    {
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        //Inserir a noticia no banco e retornar o ID
        $objDatabase = new Database('noticias');
        $this->id = $objDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'autor'=> $this->autor,
            'status' => $this->status,
            'data' => $this->data,
        ]);
        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        //Retornar sucesso
        return true;
    }

    /**
     * Método responsável por obter as noticias do banco de dados

     *@params string $where 
     *@params string $order
     *@params string $limit 
     *@return array
     */

    public static function getNoticias($where = null, $order = null, $limit = null)
    {

        $objDatabase = new Database('noticias');

        return ($objDatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as noticias do banco de dados

     *@params int $id
     *@return Noticia
     */

    public static function getNoticia($id)
    {

        $objDatabase = new Database('noticias');

        return ($objDatabase)->select('id = ' . $id)->fetchObject(self::class);
    }

    /**
     * Função para excluir noticias no banco
     *@return boolean
     */

    public function excluir()
    {
        $objDatabase = new Database('noticias');

        return ($objDatabase)->delete('id =' . $this->id);
    }

    /** 
     * Função para atualizar a noticia no banco 
     * @return boolean
     */
    public function atualizar()
    {
        //Definir a data
        $this->data = date('Y-m-d');

        $objDatabase = new Database('noticias');

        return ($objDatabase)->update('id = ' . $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'autor'=> $this->autor,
            'status' => $this->status,
            'data' => $this->data,
        ]);
    }
}

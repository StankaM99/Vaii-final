<?php
include_once 'dbPrispevok.php';

class userPrispev
{
    private $id;
    private $pouzivatel;
    private $nadpis;
    private $text;


    public function __construct($id,$login, $nadpis, $prispevok)
    {
        $this->id = $id;
        $this->pouzivatel = $login;
        $this->nadpis = $nadpis;
        $this->text = $prispevok;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->pouzivatel;
    }

    public function getNadpis()
    {
        return $this->nadpis;
    }

    public function getText()
    {
        return $this->text;
    }
}

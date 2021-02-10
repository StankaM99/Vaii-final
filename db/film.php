<?php

include_once 'dbFilm.php';

class tipFilm
{
    private $id;
    private $nazov;
    private $rok;
    private $zaner;
    private $hodnotenie;
    private $obrazok;
    private $link;


    public function __construct($id, $nazov, $rok, $zaner, $hodnotenie, $obrazok, $link)
    {
        $this->id = $id;
        $this->nazov = $nazov;
        $this->rok = $rok;
        $this->zaner = $zaner;
        $this->hodnotenie = $hodnotenie;
        $this->obrazok = $obrazok;
        $this->link = $link;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getNazov()
    {
        return $this->nazov;
    }

    public function getRok()
    {
        return $this->rok;
    }

    public function getZaner()
    {
        return $this->zaner;
    }

    public function getHodnotenie()
    {
        return $this->hodnotenie;
    }

    public function getObrazok()
    {
        return $this->obrazok;
    }

    public function getLink()
    {
        return $this->link;
    }
}

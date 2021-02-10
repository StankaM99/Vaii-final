<?php

class prihlasovacieUdaje
{
    private $login;
    private $heslo;
    private $overheslo;


    public function __construct($login, $heslo, $overheslo)
    {
        $this->login = $login;
        $this->heslo = $heslo;
        $this->overheslo = $overheslo;
    }

    public function getHeslo()
    {
        return $this->heslo;
    }

   public function getLogin()
    {
        return $this->login;
    }

    public function skontrolujHeslo(): bool
    {
        return $this->heslo == $this->overheslo;
    }
}
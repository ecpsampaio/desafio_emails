<?php

class  _Exceptions
{
    private $rule;
    private $domainadress;
    private $quant;

    function __construct($domain,$rule)
    {
        $this->rule = $rule;
        $this->domainadress = $domain;
        $this->quant = 0;    
    }

    public  function getrule() {
        return $this->rule;
    }

    public function setrule($rule) {
        $this->rule = $rule;
    }
    
    public function  getdomainadress() {
        return $this->domainadress;
    }

    public function setdomainadress( $domainadress) {
        $this->domainadress = $domainadress;
    }

    public function  getquant() {
        return $this->quant;
    }

    public function setquant() {
        $this->quant++;
    }

}

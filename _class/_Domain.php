<?php
class _Domain {
    private $domain;
    private $truedomain;
    private $region;
    private $errorcount;
    private $errorcountregion;
    private $correctcount;
    private $totalcount;
    
    function __construct($value)
    {
        $this->domain = $value;
        $this->truedomain = substr($value,0,strpos($value,"."));
        if ((substr($value,-3) === "com")) {
            $this->region = "com";
        } else $this->region = substr($value,-2);
        $this->errorcount = $this->errorcount = $this->errorcountregion = 0;
    }
    function setDomain($value) {
        $this->domain = $value;
    }
    function getDomain() {
        return $this->domain;
    }
    function getRegion() {
        return $this->region;
    }
    function setErrorQuant() {
        $this->errorcount++;
    }
    function getErrorQuant() {
        return $this->errorcount;
    }
    function setTotalQuant() {
        $this->totalcount++;
    }
    function getTotalQuant() {
        return $this->totalcount;
    }
    function setCorrectQuant() {
        $this->correctcount++;
    }
    function getCorrectCount() {
        return $this->correctcount;
    }
    function setErrorQuantRegion($value) {
        $this->errorcount = $value;
    }
    function getErrorQuantRegion() {
        return $this->errorcount;
    }
    function getTrueDomain() {
        return $this->truedomain;
    }
}
?>
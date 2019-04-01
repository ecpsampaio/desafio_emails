<?php
class _Region {
    private $region;
    private $errorcount;
    private $correctcount;
    private $totalcount;

    function __construct($region) {
        $this->region = $region;
        $this->totalcount = $this->errorcount = $this->correctcount = 0;
    }

    function setErrorCount() {
        $this->errorcount++;
    }
    function getErrorCount() {
        return $this->errorcount;
    }
    function setCorrectCount() {
        $this->correctcount++;
    }
    function getCorrectCount() {
        return $this->correctcount;
    }
    function setTotalCount() {
        $this->totalcount++;
    }
    function getTotalCount() {
        return $this->totalcount;
    }
    function getRegion() {
        return $this->region;
    }
}


?>
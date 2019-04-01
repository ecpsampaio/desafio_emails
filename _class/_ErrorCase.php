<?php
class _ErrorCase
{
    private $case;
    private $errorcount;

    function __construct($case) {
        $this->case = $case;
        $this->errorcount = 0;
    }
    function setErrorCount() {
        $this->errorcount += 1;
    }
    function getErrorCount() {
        return $this->errorcount;
    }
    function getCase() {
        return $this->case;
    }
}
?>
<?php
  if (!$mysqli = new mysqli('127.0.0.1', 'root', '', 'test')) {
        echo 'ERRO AO CONCTAR AO BANCO';
        exit();
    }

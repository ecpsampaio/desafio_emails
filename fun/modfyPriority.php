<?php
function addOne($arrteste,$iten) {
    $out = null;
    foreach ($arrteste as $key => $value) {
        if ($iten == $value) {
            $out = $key;
            break;
        } else $out == null;
    }
    if ($out != 0) {
        foreach ($arrteste as $key => $value) {
            if ($key == $out-1) {
                $after = $value;
                $afterkey = $key;
            } else if ($key == $out) {
                $true = $value;
                $truekey = $key;
            }
        }
        $arrteste[$afterkey] = $true;
        $arrteste[$truekey] = $after;
        return $arrteste;
    }
    else return false;
}

function subOne($arrteste,$iten) {
    $out = null;
    foreach ($arrteste as $key => $value) {
        if ($iten == $value) {
            $out = $key;
            break;
        } else $out == null;
    }
    if ($out != count($arrteste)-1) {
        foreach ($arrteste as $key => $value) {
            if ($key == $out+1) {
                $after = $value;
                $afterkey = $key;
            } else if ($key == $out) {
                $true = $value;
                $truekey = $key;
            }
        }
        $arrteste[$afterkey] = $true;
        $arrteste[$truekey] = $after;
        return $arrteste;
    }
    else return false;
}
?>
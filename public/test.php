<?php

function add($x, $y) {
    return $x + $y;
}

if (4 === add(2, 2)) {
    echo "add is ok";
} else {
    echo "add error";
}
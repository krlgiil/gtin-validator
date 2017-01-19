<?php

require_once __DIR__.'/../Gtin.php';

use klof\gtin\Gtin;

function checkGtin($gtinCode)
{
    $validMsg   = "%s is a valid GTIN.".PHP_EOL;
    $invalidMsg = "%s is not a valid GTIN.".PHP_EOL;
    $gtin = new Gtin($gtinCode);

    return $gtin->isValid() ? sprintf($validMsg, $gtin->getCode()) : sprintf($invalidMsg, $gtin->getCode());
}

echo checkGtin('4210201128885');
echo checkGtin('5053460595406');
echo checkGtin('012345678');

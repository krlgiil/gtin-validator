<?php

namespace klof\gtin;

/**
 * Class Gtin
 * @package klof\gtin
 */
Class Gtin {
    /**
     * @var string
     */
    protected $gtinCode;

    /**
     * Gtin constructor.
     * @param string $gtinCode
     */
    public function __construct($gtinCode)
    {
        $this->gtinCode = $gtinCode;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->gtinCode;
    }

    /**
     * Check wether the GTIN code is valid or not
     * based on the documentation of the gs1.org website
     * 
     * http://www.gs1.org/how-calculate-check-digit-manually
     *
     * @return bool
     */
    public function isValid()
    {
        $gtinLength = strlen($this->gtinCode);
        //check wether the gtin is only composed of digits
        //And the GTIN length must be 8, 12, 13, or 14 digits
        if (!ctype_digit((string) $this->gtinCode) || !in_array($gtinLength, [8, 12, 13, 14])) {
            return false;
        }

        $gtinArray = str_split($this->gtinCode);
        //Check digit is the last GTIN digit
        $checkDigit = $gtinArray[$gtinLength - 1];
        array_splice($gtinArray, -1, 1);
        $gtinArray = array_reverse($gtinArray);

        while (list($key, $val) = each($gtinArray)) {
            //multiply by 3, pair numbers in the reverse version of the array
            $gtinArray[$key] = $key & 1 ? $val : $val * 3;
        }

        //Check Calculation
        $sumArray = array_sum($gtinArray);
        $multiple10 = ceil($sumArray / 10) * 10;
        $isValid = (int) ($multiple10 - $sumArray) === (int) $checkDigit;

        return $isValid;
    }
}
<?php

namespace Bijective;

use Bijective\Exception\BijectiveException;

/**
 * @author Brian Freytag <brian@idltg.in>
 */
class BijectiveTranslator implements BijectiveTranslatorInterface
{
    /** @var string */
    private $alphabet;

    /**
     * @param $alphabet
     */
    public function __construct($alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $this->alphabet = $alphabet;
    }

    /**
     * Encodes any integer into an encoded string
     *
     * @param integer $int
     *
     * @throws BijectiveException
     * @return string
     */
    public function encode($int)
    {
        if (is_int($int)) {
            $int = (string) $int;
        }

        if (!ctype_digit($int)) {
            throw new BijectiveException('You can only encode a number');
        }

        if ($int == 0) {
            return $this->alphabet[0];
        }

        $string = '';
        $base = strlen($this->alphabet);

        while ($int > 0) {
            $string .= $this->alphabet[($int % $base)];

            $int = floor($int / $base);
        }

        return strrev($string);
    }

    /**
     * Decodes any string into an interval value
     *
     * @param $str
     *
     * @throws BijectiveException
     * @return int
     */
    public function decode($str)
    {
        if (!is_string($str)) {
            throw new BijectiveException('You can only decode a string');
        }

        $int = 0;

        $base = strlen($this->alphabet);

        for ($i=0; $i < strlen($str); $i++) {
            $pos = strpos($this->alphabet, $str[$i]);

            $int = $int * $base + $pos;
        }

        return $int;
    }
}

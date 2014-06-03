<?php

namespace Bijective;

/**
 * @author Brian Freytag <brian@idltg.in>
 */
class Bijective implements BijectiveInterface
{
    /** @var string */
    private $alphabet;

    /**
     * @param $alphabet
     */
    public function __construct($alphabet)
    {
        $this->alphabet = $alphabet;
    }

    /**
     * Encodes any integer into an encoded string
     *
     * @param integer $int
     *
     * @throws \InvalidArgumentException
     * @return string
     */
    public function encode($int)
    {
        if (!is_int($int)) {
            throw new \InvalidArgumentException('You can only encode an integer');
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
     * @throws \InvalidArgumentException
     * @return int
     */
    public function decode($str)
    {
        if (!is_string($str)) {
            throw new \InvalidArgumentException('You can only decode a string');
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

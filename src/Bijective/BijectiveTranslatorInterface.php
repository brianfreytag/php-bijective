<?php

namespace Bijective;

/**
 * @author Brian Freytag <brian@idltg.in>
 */
interface BijectiveTranslatorInterface
{
    /**
     * @param $int
     *
     * @return string
     */
    public function encode($int);

    /**
     * @param $str
     *
     * @return integer
     */
    public function decode($str);
}

<?php

namespace Bijective;

/**
 * @author Brian Freytag <brian@idltg.in>
 */
interface BijectiveInterface
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

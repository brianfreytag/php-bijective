<?php

namespace Bijective\Tests;

use Bijective\BijectiveTranslator;

/**
 * @coversDefaultClass Bijective\BijectiveTranslator
 *
 * @package Bijective
 *
 * @author Brian Freytag <brian@idltg.in>
 */
class BijectiveTranslatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var BijectiveTranslator */
    private $bijective;

    public function setUp()
    {
        $this->bijective = new BijectiveTranslator();
    }

    public function testEncodeReturnsString()
    {
        $this->assertInternalType('string', $this->bijective->encode("123"));
        $this->assertInternalType('string', $this->bijective->encode(1234));
        $this->assertInternalType('string', $this->bijective->encode('432'));
    }

    /**
     * @expectedException \Bijective\Exception\BijectiveException
     */
    public function testEncodeThrowsExceptionOnInvalidTypes()
    {
        $this->bijective->encode(array());
        $this->bijective->encode("string");
        $this->bijective->encode(new \stdClass());
    }

    public function testDecodeReturnsInteger()
    {
        $this->assertInternalType('integer', $this->bijective->decode("asfdw"));
        $this->assertInternalType('integer', $this->bijective->decode("jiadoasdf"));
        $this->assertInternalType('integer', $this->bijective->decode("ADSjf3asdf"));
    }

    /**
     * @expectedException \Bijective\Exception\BijectiveException
     */
    public function testDecodesThrowsExceptionOnInvalidTypes()
    {
        $this->bijective->decode(1234);
        $this->bijective->decode(array());
        $this->bijective->decode(new \stdClass());
    }

    public function testEncodeDecodeReturnExpectedValues()
    {
        $this->assertEquals('ct', $this->bijective->encode(123));
        $this->assertEquals(123, $this->bijective->decode('ct'));

        $this->assertEquals(
            'fdspadsf',
            $this->bijective->encode($this->bijective->decode('fdspadsf'))
        );

        $this->assertEquals(
            43489,
            $this->bijective->decode($this->bijective->encode(43489))
        );
    }
}

<?php

namespace Vandpibe\Test\Validator;

use Vandpibe\Validator\Constraint\Blacklist;
use Vandpibe\Validator\Constraint\BlacklistValidator;

/**
 * @author Henrik Bjornskov <henrik@bjrnskov.dk>
 */
class BlacklistValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->context = $this->getMockBuilder('Symfony\Component\Validator\ExecutionContext')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->validator = new BlacklistValidator();
        $this->validator->initialize($this->context);
    }

    public function testValidateOnlyAcceptsBlacklist()
    {
        $this->setExpectedException('InvalidArgumentException');

        $this->validator->validate('value', $this->getMockForAbstractClass('Symfony\Component\Validator\Constraint'));
    }

    public function testValdateWithInvalidValue()
    {
        $blacklist = new Blacklist(array('blacklist'));

        $this->context
            ->expects($this->exactly(2))
            ->method('addViolation')
        ;

        $this->validator->validate('blacklist', $blacklist);

        $this->validator->validate('BlAcKliSt', $blacklist);
    }

    public function testValidateWithValidValue()
    {
        $blacklist = new Blacklist(array('blacklist'));

        $this->context
            ->expects($this->never())
            ->method('addViolation')
        ;

        $this->validator->validate('valid', $blacklist);
    }
}

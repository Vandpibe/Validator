<?php

namespace Vandpibe\Test\Validator;

use Vandpibe\Validator\Constraint\Blacklist;
use Symfony\Component\Validator\Constraint;

/**
 * @author Henrik Bjornskov <henrik@bjrnskov.dk>
 */
class BlacklistTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultOption()
    {
        $constraint = new Blacklist(array('Blacklisted'));
        $this->assertEquals(array('Blacklisted'), $constraint->blacklist);
        $this->assertEquals('blacklist', $constraint->getDefaultOption());
    }

    public function testTarget()
    {
        $constraint = new Blacklist(array('Something'));

        $this->assertEquals(Constraint::PROPERTY_CONSTRAINT, $constraint->getTargets());
    }

    public function testRequiredOptions()
    {
        $constraint = new Blacklist(array('Something'));
        $this->assertEquals(array('blacklist'), $constraint->getRequiredOptions());
    }
}

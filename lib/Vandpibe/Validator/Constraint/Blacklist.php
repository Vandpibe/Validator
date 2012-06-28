<?php

namespace Vandpibe\Validator\Constraint;

/**
 * @author Henrik Bjornskov <henrik@bjrnskov.dk>
 */
class Blacklist extends \Symfony\Component\Validator\Constraint
{
    /**
     * @var array
     */
    public $blacklist = array();

    /**
     * @var string
     */
    public $message = 'The value "{{ value }}" is invalid.';

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions()
    {
        return array('blacklist');
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption()
    {
        return 'blacklist';
    }
}

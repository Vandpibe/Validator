<?php

namespace Vandpibe\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @author Henrik Bjornskov <henrik@bjrnskov.dk>
 */
class BlacklistValidator extends \Symfony\Component\Validator\ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (false == $constraint instanceof Blacklist) {
            throw new \InvalidArgumentException('"$constraint" must be an instance of Blacklist. "' . get_class($constraint) . '" given.');
        }

        // Ignore case
        $blacklist = array_map('strtolower', $constraint->blacklist);

        if (in_array(strtolower($value), $blacklist)) {
            $this->context->addViolation($constraint->message, array('{{ value }}' => $value));
        }
    }
}

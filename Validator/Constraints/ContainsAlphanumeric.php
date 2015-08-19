<?php

namespace ConnectHolland\PiccoloContentBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
	public $message = 'The string "%string%" contains an illegal character. It can only contain letters or numbers.';
}
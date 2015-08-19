<?php

namespace ConnectHolland\PiccoloContentBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsAlphanumericValidator extends ConstraintValidator
{
	/*
	Will trigger when the given name contains characters different from
	a-z, A-Z, 0-9 and/or -
	*/
	public function validate($value, Constraint $constraint)
	{
		if (!preg_match('/([A-Za-z0-9\-]+)/', $value, $matches)) {
			$this->context->addViolation(
				$constraint->message,
				array('%string%' => $value)
			);
		}
	}
}
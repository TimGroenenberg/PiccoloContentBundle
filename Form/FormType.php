<?php

namespace ConnectHolland\PiccoloContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sender');
        $builder->add('email', 'email');
        $builder->add('subject');
        $builder->add('message', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
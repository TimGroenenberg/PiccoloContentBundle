<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Contactform block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class ContactBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_contactform.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_contactform.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_contactform.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

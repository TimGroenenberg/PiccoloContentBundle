<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Call to action block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class CallToActionBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_calltoaction.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_calltoaction.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_calltoaction.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

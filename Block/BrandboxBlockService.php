<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Brandbox block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class BrandboxBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_brandbox.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_brandbox.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_brandbox.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * GoogleMap block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class GoogleMapBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_googlemap.html.twig';
    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_googlemap.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_googlemap.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

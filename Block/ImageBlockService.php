<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Image block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class ImageBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_image.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_image.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_image.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

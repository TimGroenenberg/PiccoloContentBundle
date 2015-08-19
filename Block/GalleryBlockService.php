<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Gallery block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class GalleryBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_gallery.html.twig';
    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_gallery.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_gallery.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

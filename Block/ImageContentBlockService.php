<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Image contentblock service
 *  
 * Derived from simpleblock service
 * 
 * @author Arthur Hoek <arthur@connectholland.nl>
 */
class ImageContentBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_imagecontent.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_imagecontent.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_imagecontent.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

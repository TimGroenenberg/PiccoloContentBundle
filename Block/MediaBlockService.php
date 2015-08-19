<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

/**
 * Media block service
 *  
 * Derived from simpleblock service
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 */
class MediaBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_media.html.twig';

    public function __construct($name, $templating, $template = null) {
        if ($templating->exists('ConnectHollandMainBundle:Block:block_media.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_media.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }
}

<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
//use Symfony\Cmf\Bundle\ContentBundle\Document\StaticContent;

/**
 * Piccolo home content page
 * 
 * @author Lars Hoevenaar <lars@connectholland.nl>
 *
 * @PHPCRODM\Document
 */
class HomePage extends StandardPage
{

    /**
     * @PHPCRODM\String()
     */
    protected $brandbox = 'foo';

    /**
     * Get the brandbox
     */
    public function getBrandbox()
    {
        return $this->brandbox;
    }

    public function setBrandbox($brandbox)
    {
        // $this->brandbox = $brandbox;
        $this->brandbox = 'foo';
    }

}
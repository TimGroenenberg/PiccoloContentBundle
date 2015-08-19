<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Piccolo news content page
 * 
 * @author Arthur Hoek <arthur@connectholland.nl>
 *
 * @PHPCRODM\Document
 */
class NewsPage extends StandardPage {
    /**
     * @PHPCRODM\Date()
     */
    protected $date;

    public function __construct() {
        parent::__construct();
        $this->date = new \DateTime();
        $this->containerBlocks = new ArrayCollection();
    }

    /**
     * Get the date
     */
    public function getDate() {
        $keywords = $this->getKeywords();
        return $this->date->format('d-m-Y H:i');
    }

    public function setDate(\DateTime $date = null) {
        $this->date = new \DateTime();
    }

    public function getRelatedPage() {
    }
}
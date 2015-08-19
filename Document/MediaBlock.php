<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Piccolo media block
 *
 * @PHPCR\Document(referenceable=true)
 */
class MediaBlock extends AbstractBlock {
	
	/**
     * @PHPCR\String(nullable=true)
     */
    protected $title;

	/**
     * @PHPCR\String(nullable=true)
     */
    protected $body;

    /**
     * @PHPCR\String(nullable=false)
     */
    protected $url;

    /**
     * @PHPCR\String(nullable=false)
     */
    protected $size = array();

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

	/**
     * Set body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    /**
	 * @return array Names of the allowed container child blocks
	 */
	public function setAllowedContainerBlocks() {
		return [];
	}
	
	public function getType() {
		return 'connectholland_piccolocontent.block.media';
	}
}

<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Piccolo contact block
 *
 * @PHPCR\Document(referenceable=true)
 */
class ContactBlock extends ContentBlock {
	
	/**
     * @PHPCR\String(nullable=true)
     */
	protected $title;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $body;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getBody() {
		return $this->body;
	}

	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * @todo Function to allow only certain children, config from settings
	 * 
	 * @return array Names of the allowed container child blocks
	 */
	public function setAllowedContainerBlocks() {
		return [];
	}
	
	public function getType() {
		return 'connectholland_piccolocontent.block.contact';
	}
}
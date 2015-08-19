<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\ODM\PHPCR\DocumentManager;

/**
 * Block that is a collection of NewsPage content's
 * 
 * @todo Finish this function
 *
 * @PHPCR\Document(referenceable=true)
 */
class LatestNewsBlock extends AbstractBlock
{
	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $title;

	/**
	 * @PHPCR\String(nullable=false)
	 */
	protected $style;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getStyle() {
		return $this->style;
	}

	public function setStyle($style) {
		$this->style = $style;
	}

	public function get($id)
    {
        return $this->container->get($id);
    }

	/**
	 * @todo Function to allow only certain children, config from settings
	 * 
	 * @return array Names of the allowed container child blocks
	 */
	public function setAllowedContainerBlocks() {
		return [];
	}

	public function getType()
    {
        return 'connectholland_piccolocontent.block.latestnews';
    }
}

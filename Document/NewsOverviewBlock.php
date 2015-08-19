<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Doctrine\ODM\PHPCR\DocumentManager;

/**
 * News overview block
 *
 * @PHPCR\Document(referenceable=true)
 */
class NewsOverviewBlock extends AbstractBlock
{
	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $title;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
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
        return 'connectholland_piccolocontent.block.newsoverview';
    }
}

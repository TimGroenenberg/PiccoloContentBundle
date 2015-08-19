<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * Piccolo news content block
 *
 * @PHPCR\Document(referenceable=true)
 */
class ImageBlock extends AbstractBlock
{
	/**
     * @PHPCR\String(nullable=true)
     */
    protected $title;

    /**
     * @PHPCR\ReferenceOne(strategy="weak")
     */
    protected $image;

    /**
	 * @todo Function to allow only certain children, config from settings
	 * 
	 * @return array Names of the allowed container child blocks
	 */
	public function setAllowedContainerBlocks() {
		return [];
	}

	/**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'connectholland_piccolocontent.block.image';
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
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /** 
     * @param ImageInterface|UploadedFile|null $image optional the image to update
     */
    public function setImage($image = null) {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return reference
     */
    public function getImage() {
        return $this->image;
    }
}
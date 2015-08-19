<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * Piccolo brandbox block
 *
 * @PHPCR\Document(referenceable=true)
 */
class BrandboxBlock extends AbstractBlock
{
    
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
    protected $style;

    /**
     * @PHPCR\ReferenceOne(strategy="weak")
     */
    protected $brandboxImage;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function getBody() {
        return $this->body;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function getStyle() {
        return $this->style;
    }

    /**
     * @param ImageInterface|UploadedFile|null $brandboxImage optional the brandboxImage to update
     */
    public function setBrandboxImage($image = null) {
        $this->brandboxImage = $image;
        return $this;
    }

    /**
     * Get brandboxImage
     *
     * @return reference
     */
    public function getBrandboxImage() {
        return $this->brandboxImage;
    }

    public function getType()
    {
        return 'connectholland_piccolocontent.block.brandbox';
    }

    /**
     * @todo Function to allow only certain children, config from settings
     * 
     * @return array Names of the allowed container child blocks
     */
    public function setAllowedContainerBlocks() {
        return [];
    }
}
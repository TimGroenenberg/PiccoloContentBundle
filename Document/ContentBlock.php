<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use ConnectHolland\PiccoloCmsBundle\Form\Type\ImageType;

/**
 * Piccolo content block
 *
 * @author Arthur Hoek <arthur@connectholland.nl>
 *
 * @PHPCR\Document(referenceable=true)
 */
class ContentBlock extends AbstractBlock {
	/**
     * @PHPCR\String(nullable=true)
     */
	protected $title;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $body;

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
     * Set body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
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

    public function getType() {
        return 'connectholland_piccolocontent.block.content';
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

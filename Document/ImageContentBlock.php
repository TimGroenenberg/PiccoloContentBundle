<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Piccolo image content block
 *
 * @PHPCR\Document(referenceable=true)
 */
class ImageContentBlock extends ContentBlock
{
	/**
	 * targetDocument="Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image",
     * @var Reference to an image in de media repository
	 *
     * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $image;

    /**
     * CSS styling, used to align image left or right
     *
     * @var string
     * @PHPCR\String(nullable=true)
     */
    protected $style;

    public function getType()
    {
        return 'connectholland_piccolocontent.block.imagecontent';
    }

	/**
	 * Set the image for this block.
	 *
	 * Setting null will do nothing, as this is what happens when you edit this
	 * block in a form without uploading a replacement file.
	 *
	 * If you need to delete the Image, you can use getImage and delete it with
	 * the document manager. Note that this block does not make much sense
	 * without an image, though.
	 *
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

    /**
     * Set the block style
     *
     * @param string $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
	 * Get block style
	 *
	 * @return string Css class name
	 */
	public function getStyle() {
		return $this->style;
	}
}
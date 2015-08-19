<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Piccolo call to action block
 *
 * @PHPCR\Document(referenceable=true)
 */
class CallToActionBlock extends ContentBlock {
	
	/**
     * @PHPCR\String(nullable=false)
     */
	protected $url;

	/**
     * @PHPCR\String(nullable=true)
     */
	protected $label;

	/**
     * @PHPCR\String(nullable=true)
     */
	protected $window;
	
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

	/**
     * Get url
     *
     * @return string
     */
	public function getUrl() {
		return $this->url;
	}

	/**
     * Set url
     *
     * @param string $url
     */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
     * Get label
     *
     * @return string
     */
	public function getLabel() {
		return $this->label;
	}

	/**
     * Set label
     *
     * @param string $label
     */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
     * Get window
     *
     * @return string
     */
	public function getWindow() {
		return $this->window;
	}

	/**
     * Set window
     *
     * @param string $window
     */
	public function setWindow($window) {
		$this->window = $window;
	}
	
	public function getType() {
		return 'connectholland_piccolocontent.block.calltoaction';
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
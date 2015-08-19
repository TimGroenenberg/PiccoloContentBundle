<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * Gallery block
 *
 * @PHPCR\Document(referenceable=true)
 */
class GalleryBlock extends AbstractBlock
{
	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $title;

	/**
	 * targetDocument="Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\firstImage",
     * @var Reference to an firstImage in de media repository
	 *
     * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $firstImage;

	/**
	 * @PHPCR\String(nullable=false)
	 */
	protected $firstSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $firstBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $firstUrl;

	/**
	 * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $secondImage;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $secondSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $secondBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $secondUrl;

	/**
	 * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $thirdImage;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $thirdSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $thirdBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $thirdUrl;

	/**
	 * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $fourthImage;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fourthSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fourthBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fourthUrl;

	/**
	 * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $fifthImage;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fifthSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fifthBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $fifthUrl;

	/**
	 * @PHPCR\ReferenceOne(strategy="weak")
	 */
	protected $sixthImage;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $sixthSubtitle;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $sixthBody;

	/**
	 * @PHPCR\String(nullable=true)
	 */
	protected $sixthUrl;

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $firstImage optional the firstImage to update
	 */
	public function setFirstImage($firstImage = null) {
        $this->firstImage = $firstImage;
        return $this;
	}

	/**
	 * Get firstImage
	 *
	 * @return reference
	 */
	public function getFirstImage() {
		return $this->firstImage;
	}

	public function setFirstSubtitle($firstSubtitle) {
		$this->firstSubtitle = $firstSubtitle;
	}

	public function getFirstSubtitle() {
		return $this->firstSubtitle;
	}

	public function setFirstBody($firstBody) {
		$this->firstBody = $firstBody;
	}

	public function getFirstBody() {
		return $this->firstBody;
	}

	public function setFirstUrl($firstUrl) {
		$this->firstUrl = $firstUrl;
	}

	public function getFirstUrl() {
		return $this->firstUrl;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $secondImage optional the secondImage to update
	 */
	public function setSecondImage($secondImage = null) {
        $this->secondImage = $secondImage;
        return $this;
	}

	/**
	 * Get secondImage
	 *
	 * @return reference
	 */
	public function getSecondImage() {
		return $this->secondImage;
	}

	public function setSecondSubtitle($secondSubtitle) {
		$this->secondSubtitle = $secondSubtitle;
	}

	public function getSecondSubtitle() {
		return $this->secondSubtitle;
	}

	public function setSecondBody($secondBody) {
		$this->secondBody = $secondBody;
	}

	public function getSecondBody() {
		return $this->secondBody;
	}

	public function setSecondUrl($secondUrl) {
		$this->secondUrl = $secondUrl;
	}

	public function getSecondUrl() {
		return $this->secondUrl;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $thirdImage optional the thirdImage to update
	 */
	public function setThirdImage($thirdImage = null) {
        $this->thirdImage = $thirdImage;
        return $this;
	}

	/**
	 * Get thirdImage
	 *
	 * @return reference
	 */
	public function getThirdImage() {
		return $this->thirdImage;
	}

	public function setThirdSubtitle($thirdSubtitle) {
		$this->thirdSubtitle = $thirdSubtitle;
	}

	public function getThirdSubtitle() {
		return $this->thirdSubtitle;
	}

	public function setThirdBody($thirdBody) {
		$this->thirdBody = $thirdBody;
	}

	public function getThirdBody() {
		return $this->thirdBody;
	}

	public function setThirdUrl($thirdUrl) {
		$this->thirdUrl = $thirdUrl;
	}

	public function getThirdUrl() {
		return $this->thirdUrl;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $fourthImage optional the fourthImage to update
	 */
	public function setFourthImage($fourthImage = null) {
        $this->fourthImage = $fourthImage;
        return $this;
	}

	/**
	 * Get fourthImage
	 *
	 * @return reference
	 */
	public function getFourthImage() {
		return $this->fourthImage;
	}

	public function setFourthSubtitle($fourthSubtitle) {
		$this->fourthSubtitle = $fourthSubtitle;
	}

	public function getFourthSubtitle() {
		return $this->fourthSubtitle;
	}

	public function setFourthBody($fourthBody) {
		$this->fourthBody = $fourthBody;
	}

	public function getFourthBody() {
		return $this->fourthBody;
	}

	public function setFourthUrl($fourthUrl) {
		$this->fourthUrl = $fourthUrl;
	}

	public function getFourthUrl() {
		return $this->fourthUrl;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $fifthImage optional the fifthImage to update
	 */
	public function setFifthImage($fifthImage = null) {
        $this->fifthImage = $fifthImage;
        return $this;
	}

	/**
	 * Get fifthImage
	 *
	 * @return reference
	 */
	public function getFifthImage() {
		return $this->fifthImage;
	}

	public function setFifthSubtitle($fifthSubtitle) {
		$this->fifthSubtitle = $fifthSubtitle;
	}

	public function getFifthSubtitle() {
		return $this->fifthSubtitle;
	}

	public function setFifthBody($fifthBody) {
		$this->fifthBody = $fifthBody;
	}

	public function getFifthBody() {
		return $this->fifthBody;
	}

	public function setFifthUrl($fifthUrl) {
		$this->fifthUrl = $fifthUrl;
	}

	public function getFifthUrl() {
		return $this->fifthUrl;
	}

	/**
	 * @param firstImageInterface|UploadedFile|null $sixthImage optional the sixthImage to update
	 */
	public function setSixthImage($sixthImage = null) {
        $this->sixthImage = $sixthImage;
        return $this;
	}

	/**
	 * Get sixthImage
	 *
	 * @return reference
	 */
	public function getSixthImage() {
		return $this->sixthImage;
	}

	public function setSixthSubtitle($sixthSubtitle) {
		$this->sixthSubtitle = $sixthSubtitle;
	}

	public function getSixthSubtitle() {
		return $this->sixthSubtitle;
	}

	public function setSixthBody($sixthBody) {
		$this->sixthBody = $sixthBody;
	}

	public function getSixthBody() {
		return $this->sixthBody;
	}

	public function setSixthUrl($sixthUrl) {
		$this->sixthUrl = $sixthUrl;
	}

	public function getSixthUrl() {
		return $this->sixthUrl;
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
        return 'connectholland_piccolocontent.block.gallery';
    }
}
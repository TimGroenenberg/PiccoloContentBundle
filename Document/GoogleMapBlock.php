<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Piccolo Google Map block
 *
 * @PHPCR\Document(referenceable=true)
 */
class GoogleMapBlock extends ContentBlock
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
    protected $address;

    /**
     * @PHPCR\String(nullable=false)
     */
    protected $city;

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

    public function setAddress($address) {
	   $this->address = $address;
    }

    public function getAddress() {
	   return $this->address;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function getType()
    {
        return 'connectholland_piccolocontent.block.googlemap';
    }
}

<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * Piccolo highlight block
 *
 * @PHPCR\Document(referenceable=true)
 */
class HighlightBlock extends AbstractBlock
{
    /**
     * @PHPCR\String(nullable=false)
     */
    protected $url;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $title;

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getOptions()
    {
        $options = array(
            'url' => $this->url,
        );

        return $options;
    }

    public function getType()
    {
        return 'connectholland_piccolocontent.block.highlight';
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
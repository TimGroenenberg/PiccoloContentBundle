<?php

namespace ConnectHolland\PiccoloContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use LogicException;
use Knp\Menu\NodeInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
//use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishWorkflowInterface;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ContainerBlock;
use Doctrine\ODM\PHPCR\ChildrenCollection;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Cmf\Component\Routing\RouteObjectInterface;

use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Base Piccolo content page
 *
 * @author Arthur Hoek <arthur@connectholland.nl>
 * 
 * @PHPCRODM\Document
 */
class StandardPage extends Route implements
    NodeInterface,
    RouteReferrersReadInterface, // this must not be the write interface, it would make no sense
    TranslatableInterface
{
    /**
     * @PHPCRODM\Node
     */
    //public $node;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex("/([A-Za-z0-9\-\_]+)/")
     * @Assert\Length(
     *      min = 2,
     *      max = 60,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters long"
     * )
     */
    protected $name;

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $title;

    /**
     * @PHPCRODM\String()
     */
    //protected $label;

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $body;

    /**
     * @PHPCRODM\Date()
     * @Assert\Type("\DateTime")
     */
    protected $createDate;

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $online;

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $maintenanceMessage;

    /**
     * Child container blocks
     * 
     * @todo Filter only ContainerBlocks
     * 
     * @PHPCRODM\Children(cascade={"all"})
     */
    protected $containerBlocks;
    protected $allowedContainerBlocks;
    protected $template;

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $description;

    /**
     * @PHPCRODM\String(multivalue=true, nullable=true)
     */
    protected $keywords = array();

    /**
     * @PHPCRODM\String(nullable=true)
     */
    protected $showKeywords;

    public function __construct()
    {
        parent::__construct();
        $this->createDate = new \DateTime();
        $this->containerBlocks = new ArrayCollection();
    }

    /**
     * Content method: set the page name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Content method: get the page name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Content method: set the page title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Content method: get the page title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Content method: set the page body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Content method: get the page body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    public function setOnline($online) {
        $this->online = $online;
    }

    /**
     * Get the online status
     *
     * @return string
     */
    public function getOnline() {
        return $this->online;
    }

    /**
     * Content method: set the page maintenanceMessage
     *
     * @param string $maintenanceMessage
     */
    public function setMaintenanceMessage($maintenanceMessage)
    {
        $this->maintenanceMessage = $maintenanceMessage;
    }

    /**
     * Content method: get the page maintenanceMessage
     *
     * @return string
     */
    public function getMaintenanceMessage()
    {
        return $this->maintenanceMessage;
    }

    /**
     * Overwrite the creation date manually
     *
     * On creation of a Page, the createDate is automatically set to the
     * current time.
     *
     * @param \DateTime $createDate
     */
    public function setCreateDate(\DateTime $createDate = null)
    {
        $this->createDate = $createDate;
    }

    /**
     * Get the creation date
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $keywords \Traversable list of tag strings
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setShowKeywords($showKeywords) {
        $this->showKeywords = $showKeywords;
    }

    /**
     * Get the showKeywords status
     *
     * @return string
     */
    public function getShowKeywords() {
        return $this->showKeywords;
    }

    /**
     * Content method: Get the routes that point to this content
     *
     * {@inheritDoc}
     */
    public function getRoutes()
    {
        return array($this);
    }

    /**
     * Route method: The content of this route is the object itself.
     *
     * {@inheritDoc}
     */
    public function getContent()
    {
        return $this;
    }

    /**
     * @todo Get missing container blocks
     * @return type
     */
    public function getContainerBlocks()
    {
        // Prepare new container blocks
        if ($this->containerBlocks->count() === 0) {
            foreach ($this->getAllowedContainerBlocks() as $allowedContainerBlock) {

                $containerBlock = new ContainerBlock();
                $containerBlock->setParentDocument($this);
                $containerBlock->setName($allowedContainerBlock['label']);
                $this->containerBlocks->add($containerBlock);
            }
        }
        return $this->containerBlocks;
    }

    public function setContainerBlocks(ChildrenCollection $containerBlocks)
    {
        return $this->containerBlocks = $containerBlocks;
    }

    /**
     * Get the allowed containerblocks for this page type
     * 
     * @todo Function to allow only certain children, config from settings
     * 
     * @return array Names of the allowed container child blocks
     */
    public function getAllowedContainerBlocks()
    {
        return $this->allowedContainerBlocks;
    }

    public function setAllowedContainerBlocks(array $blocks)
    {
        $this->allowedContainerBlocks = $blocks;
    }

    public function getTemplate()
    {
        return $this->getDefault(RouteObjectInterface::TEMPLATE_NAME);
    }

    public function setTemplate($template)
    {
        $this->setDefault(RouteObjectInterface::TEMPLATE_NAME, $template);
    }

    public function __toString()
    {
        return (string) $this->name;
    }

	/**
     * {@inheritDoc}
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * {@inheritDoc}
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}
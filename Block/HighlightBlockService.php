<?php

namespace ConnectHolland\PiccoloContentBundle\Block;
use Doctrine\ODM\PHPCR\DocumentManager;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Highlight block service
 *  
 * Derived from simpleblock service
 */
class HighlightBlockService extends ContentBlockService
{
    protected $doctrine;
    protected $templating;

    public function __construct($name, $templating, $doctrine, $template = null) {
        $this->doctrine = $doctrine;
        $this->templating = $templating;
        
        parent::__construct($name, $templating);
    }

    /**
     * Define valid options for a block of this type.
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver) {
        if ($this->templating->exists('ConnectHollandMainBundle:Block:block_highlight.html.twig')) {
            $template = 'ConnectHollandMainBundle:Block:block_highlight.html.twig';
        } else {
            $template = 'ConnectHollandPiccoloContentBundle:Block:block_highlight.html.twig';
        }

        $resolver->setDefaults(array(
            'url'      => 'url',
            'title'    => 'title',
            'template' => $template,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null) {
        if (!$response) {
            $response = new Response();
        }

        $block = $blockContext->getBlock();

        // merge settings with those of the concrete block being rendered
        $settings = $blockContext->getSettings();
        $resolver = new OptionsResolver();
        $resolver->setDefaults($settings);
        $settings = $resolver->resolve($block->getOptions());

        $dm = $this->doctrine;
        $qb = $dm->createQueryBuilder();
        $qb->from()->document('ConnectHolland\PiccoloContentBundle\Document\StandardPage', 'n');
        $queryResult = $qb->getQuery()->execute();

        $highlightData = array();

        foreach ($queryResult as $item) {
        	if ($item->getName() == $settings["url"]) {
            	$highlightData = array($item->getName(),$item->getTitle(),$item->getBody(),$item->getCreateDate());
        	}
        }

        if ($blockContext->getBlock()->getEnabled()) {
            $response = $this->renderResponse($blockContext->getTemplate(), array(
                'highlight_data' => $highlightData,
                'block'     => $blockContext->getBlock()
                ), $response);
        }

        return $response;
    }
}
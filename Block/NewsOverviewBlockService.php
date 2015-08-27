<?php

namespace ConnectHolland\PiccoloContentBundle\Block;
use Doctrine\ODM\PHPCR\DocumentManager;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * News overview service
 *  
 * Derived from simpleblock service
 */
class NewsOverviewBlockService extends ContentBlockService
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_newsoverview.html.twig';
    protected $doctrine;

    public function __construct($name, $templating, $doctrine, $template = null) {
        $this->doctrine = $doctrine;
        
        if ($templating->exists('ConnectHollandMainBundle:Block:block_newsoverview.html.twig') ) {
            $template = 'ConnectHollandMainBundle:Block:block_newsoverview.html.twig';
            $this->template = $template;
        }

        parent::__construct($name, $templating);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null) {  
        if (!$response) {
            $response = new Response();
        }

        $dm = $this->doctrine;
        $qb = $dm->createQueryBuilder();
        $qb->from()->document('ConnectHolland\PiccoloContentBundle\Document\NewsPage', 'n');
        $qb->orderBy()->desc()->field('n.online');
        $qb->addOrderBy()->desc()->field('n.date');
        $newsItems = $qb->getQuery()->execute();

        $items = array();

        foreach ($newsItems as $item) {
            array_push($items, array($item->getName(), $item->getTitle(), $item->getDate(), $item->getOnline()));
        }

        if ($blockContext->getBlock()->getEnabled()) {
            $response = $this->renderResponse($blockContext->getTemplate(), array(
                'newsItems' => $items,
                'block'     => $blockContext->getBlock()
                ), $response);
        }

        return $response;
    }
}
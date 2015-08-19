<?php

namespace ConnectHolland\PiccoloContentBundle\Block;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BlockServiceInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Content block service, derived from simpleblock service
 * 
 * @author Arthur Hoek <arthur@connectholland.nl>
 */
class ContentBlockService extends BaseBlockService implements BlockServiceInterface
{
    protected $template = 'ConnectHollandPiccoloContentBundle:Block:block_content.html.twig';

    public function __construct($name, $templating, $template = null)
    {
        if ($template) {
            $this->template = $template;
        }
        parent::__construct($name, $templating);
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $form, BlockInterface $block)
    {
        throw new \RuntimeException('Not used at the moment, editing using a frontend or backend UI could be changed here');
    }

    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        throw new \RuntimeException('Not used at the moment, validation for editing using a frontend or backend UI could be changed here');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {

        if (!$response) {
            $response = new Response();
        }

        if ($blockContext->getBlock()->getEnabled()) {
            $response = $this->renderResponse($blockContext->getTemplate(), array(
                'block' => $blockContext->getBlock()
                ), $response);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'template' => $this->template
        ));
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

}

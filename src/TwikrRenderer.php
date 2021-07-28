<?php

namespace twocore\twikr;

use mako\view\renderers\RendererInterface;

use Twig\Environment;

class TwikrRenderer implements RendererInterface
{
    /**
     * Twig Environment Instance
     * 
     * @access  private
     * @var     Twig\Environment
     */

    private $twig = null;

    /**
     * Constructor
     * 
     * @param   Twig\Environment    $twig
     */

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Render the view
     * 
     * @param   string  $__view__
     * @param   array   $__data__
     * @return  string
     */

    public function render($__view__, $__data__): string
    {
        $paths = $this->twig->getLoader()->getPaths();

        $__view__ = str_replace($paths[0], '', $__view__);

        $__view__ = ltrim($__view__, '/');

        return $this->twig->render($__view__, $__data__);
    }
}
<?php declare(strict_types=1);

namespace twocore\twikr\extensions;

use mako\http\routing\URLBuilder;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class Url extends AbstractExtension
{
    /**
     * Mako's URLBuilder Instance
     * 
     * @access private
     * @var    mako\http\routing\URLBuilder
     */

    private $builder;

    /**
     * Constructor
     * 
     * @param mako\http\routing\URLBuilder $builder
     */

    public function __construct(URLBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * {@inheritDoc}
     */

    public function getFunctions()
    {
        return [
            new TwigFunction('url', [$this->builder, 'to']),
            new TwigFunction('url_base', [$this->builder, 'base']),
            new TwigFunction('url_current', [$this->builder, 'current']),
            new TwigFunction('url_matches', [$this->builder, 'matches']),
        ];
    }
}
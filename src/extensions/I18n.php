<?php declare(strict_types=1);

namespace twocore\twikr\extensions;

use mako\i18n\I18n as I18nService;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class I18n extends AbstractExtension
{
    /**
     * Mako's I18n Instance
     * 
     * @access private
     * @var    mako\i18n\I18n
     */

    private $i18n;

    /**
     * Constructor
     * 
     * @param   mako\i18n\I18n $i18n
     */

    public function __construct(I18nService $i18n)
    {
        $this->i18n = $i18n;
    }

    /**
     * {@inheritDoc}
     */

    public function getFunctions()
    {
        return [
            new TwigFunction('i18n', [$this->i18n, 'get']),
            new TwigFunction('i18n_get', [$this->i18n, 'get']),
            new TwigFunction('i18n_has', [$this->i18n, 'has']),
        ];
    }
}
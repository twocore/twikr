<?php

namespace twocore\twikr;

use mako\application\Package;
use twocore\twikr\console\commands\Clear;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwikrPackage extends Package
{
    /**
     * Package's Name
     * 
     * @var string
     */

    protected $packageName = 'twocore/twikr';

    /**
     * Package's Namespace
     * 
     * @var string
     */

    protected $fileNamespace = 'twikr';

    /**
     * Package's Commands
     * 
     * @var array
     */

    protected $commands =
    [
        'twikr::clear' => Clear::class,
    ];

    /**
     * Register the service(s)
     * 
     * @access protected
     */

    protected function bootstrap(): void
    {
        $this->container
            ->registerSingleton([Environment::class, 'twig'], function ($container)
            {
                $environment = $container->get('config')
                    ->get('twikr::environment', [
                        'debug'            => false,
                        'charset'          => 'utf-8',
                        'cache'            => MAKO_APPLICATION_PATH . '/storage/cache/views/twig',
                        'auto_reload'      => false,
                        'strict_variables' => false,
                        'autoescape'       => false,
                        'optimizations'    => -1
                    ]);

                $loader = new FilesystemLoader(
                    MAKO_APPLICATION_PATH . '/resources/views'
                );

                $twig = new Environment($loader, $environment);

                // -- --------------------------------------------------

                $extensions = $container->get('config')
                    ->get('twikr::extensions');
                
                foreach ($extensions as $extension) {
                    if (!class_exists($extension)) {
                        throw new \RuntimeException(sprintf(
                            'Class doesn\'t exists: [ %s ]',
                            $extension
                        ));
                    }

                    $instance = $container->get($extension);

                    $twig->addExtension( $instance );
                }

                // -- --------------------------------------------------

                return $twig;
            });
        
        $this->container->get('view')
            ->extend('.twig', TwikrRenderer::class);
    }
}
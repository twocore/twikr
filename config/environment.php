<?php

/*
 * ------------------------------------------------------------
 * Twig Environment Configuration
 * ------------------------------------------------------------
 */

return
[
    'debug'            => false,
    'charset'          => 'utf-8',
    'cache'            => MAKO_APPLICATION_PATH . '/storage/cache/views/twig',
    'auto_reload'      => false,
    'strict_variables' => false,
    'autoescape'       => false,
    'optimizations'    => -1
];
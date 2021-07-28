<?php

namespace twocore\twikr\console\commands;

use mako\cli\input\Input;
use mako\cli\output\Output;
use mako\config\Config;
use mako\reactor\Command;
use mako\file\FileSystem;

class Clear extends Command
{
    /**
     * Command's Name
     * 
     * @var string
     */

    protected $name = 'twikr::clear';

    /**
     * Command's Description
     * 
     * @var string
     */

    protected $description = 'Clear Twig\'s Cache';

    /**
     * Mako's Config Instance
     * 
     * @access private
     * @var    mako\config\Config
     */

    private $config;

    /**
     * Mako's FileSystem Instance
     * 
     * @access private
     * @var    mako\file\FileSystem
     */

    private $filesystem;

    /**
     * Constructor
     * 
     * @param mako\cli\input\Input  $input
     * @param mako\cli\input\Outout $output
     * @param mako\config\Config    $config
     * @param mako\file\FileSystem  $filesystem
     */

    public function __construct(Input $input, Output $output, Config $config, FileSystem $filesystem)
    {
        parent::__construct($input, $output);

        $this->config     = $config;
        $this->filesystem = $filesystem;
    }

    /**
     * Clear the Twig cache
     * 
     * @access public
     * @return void
     */

    public function execute(): void
    {
        $cache = MAKO_APPLICATION_PATH . '/storage/cache/twig';

        if ( $this->filesystem->isDirectory($cache) )
        {
            if ( $this->filesystem->removeDirectory($cache) )
            {
                $this->write('<green>OK:</green> Cache cleaned.');
            }
            else
            {
                $this->write('<red>EE:</red> Failed to clean the cache!');
            }
        }
        else
        {
            $this->write('<yellow>II:</yellow> Cache doesn\'t exists.');
        }
    }
}
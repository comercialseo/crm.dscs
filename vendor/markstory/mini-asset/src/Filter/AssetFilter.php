<?php
/**
 * MiniAsset
 * Copyright (c) Mark Story (http://mark-story.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Mark Story (http://mark-story.com)
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace MiniAsset\Filter;

use MiniAsset\AssetProcess;
use MiniAsset\AssetTarget;
use MiniAsset\Filter\FilterInterface;
use RuntimeException;

/**
 * A simple base class you can build filters on top of
 * if you only want to implement either input() or output()
 */
class AssetFilter implements FilterInterface
{
    /**
     * Settings
     *
     * @var array
     */
    protected $_settings = array();

    /**
     * Gets settings for this filter. Will always include 'paths'
     * key which points at paths available for the type of asset being generated.
     *
     * @param array $settings Array of settings.
     * @return array Array of updated settings.
     */
    public function settings(array $settings = null)
    {
        if ($settings) {
            $this->_settings = array_merge($this->_settings, $settings);
        }
        return $this->_settings;
    }

    /**
     * Input filter.
     *
     * @param string $filename Name of the file
     * @param string $content Content of the file.
     */
    public function input($filename, $content)
    {
        return $content;
    }

    /**
     * Output filter.
     *
     * @param string $target The build target being made.
     * @param string $content The content to filter.
     */
    public function output($target, $content)
    {
        return $content;
    }

    /**
     * Overloaded in filters that are pre-processors.
     *
     * Preprocessor filters can use this hook method to find a list of dependent
     * files.
     *
     * @param AssetTarget $target The target to find dependencies for this filter.
     * @return array An array of MiniAsset\File\Local objects.
     */
    public function getDependencies(AssetTarget $file)
    {
        return [];
    }

    /**
     * Run the compressor command and get the output
     *
     * @param string $cmd The command to run.
     * @param string $content The content to run through the command.
     * @return The result of the command.
     * @throws RuntimeException
     */
    protected function _runCmd($cmd, $content, $environment = null)
    {
        $Process = new AssetProcess();
        $Process->environment($environment);
        $Process->command($cmd)->run($content);

        if ($Process->error()) {
            throw new RuntimeException($Process->error());
        }
        return $Process->output();
    }

    /**
     * Find the command executable. If $file is an absolute path
     * to a file that exists $search will not be looked at.
     *
     * @param array $search Paths to search.
     * @param string $file The executable to find.
     */
    protected function _findExecutable($search, $file)
    {
        $file = str_replace('/', DIRECTORY_SEPARATOR, $file);
        if (file_exists($file)) {
            return $file;
        }
        foreach ($search as $path) {
            $path = rtrim($path, DIRECTORY_SEPARATOR);
            if (file_exists($path . DIRECTORY_SEPARATOR . $file)) {
                return $path . DIRECTORY_SEPARATOR . $file;
            }
        }
        return null;
    }
}

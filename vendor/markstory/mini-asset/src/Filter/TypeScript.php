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

use MiniAsset\Filter\AssetFilter;

/**
 * Pre-processing filter that adds support for TypeScript files.
 *
 * Requires both nodejs and TypeScript to be installed.
 */
class TypeScript extends AssetFilter
{

    protected $_settings = array(
        'ext' => '.ts',
        'typescript' => '/usr/local/bin/tsc',
    );

    /**
     * Runs `tsc` against files that match the configured extension.
     *
     * @param string $filename Filename being processed.
     * @param string $content Content of the file being processed.
     * @return string
     */
    public function input($filename, $input)
    {
        if (substr($filename, strlen($this->_settings['ext']) * -1) !== $this->_settings['ext']) {
            return $input;
        }

        $tmpFile = tempnam(TMP, 'TYPESCRIPT');
        $cmd = $this->_settings['typescript'] . " " . escapeshellarg($filename) . " --out " . $tmpFile;
        $this->_runCmd($cmd, null);
        $output = file_get_contents($tmpFile);
        unlink($tmpFile);
        return $output;
    }
}

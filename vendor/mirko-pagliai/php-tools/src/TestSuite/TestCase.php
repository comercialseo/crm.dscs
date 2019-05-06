<?php
/**
 * This file is part of php-tools.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright (c) Mirko Pagliai
 * @link        https://github.com/mirko-pagliai/php-tools
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 * @since       1.1.11
 */
namespace Tools\TestSuite;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Tools\ReflectionTrait;
use Tools\TestSuite\TestTrait;

/**
 * TestCase class
 */
class TestCase extends PHPUnitTestCase
{
    use ReflectionTrait, TestTrait;

    /**
     * Teardown any static object changes and restore them
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();

        unlink_recursive(TMP);
    }
}

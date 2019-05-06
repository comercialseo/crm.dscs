<?php
/**
 * This file is part of cakephp-database-backup.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright (c) Mirko Pagliai
 * @link        https://github.com/mirko-pagliai/cakephp-database-backup
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 * @since       2.0.0
 */
namespace DatabaseBackup\TestSuite;

use Cake\Core\Configure;
use Cake\TestSuite\TestCase as CakeTestCase;
use DatabaseBackup\TestSuite\TestCaseTrait;
use Tools\ReflectionTrait;

/**
 * TestCase class
 */
abstract class TestCase extends CakeTestCase
{
    use ReflectionTrait;
    use TestCaseTrait;

    /**
     * Setup the test case, backup the static object values so they can be
     * restored. Specifically backs up the contents of Configure and paths in
     *  App if they have not already been backed up
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->deleteAllBackups();
    }

    /**
     * Teardown any static object changes and restore them
     * @return void
     * @uses deleteAllBackups()
     */
    public function tearDown()
    {
        parent::tearDown();

        $this->deleteAllBackups();

        Configure::write(DATABASE_BACKUP . '.connection', 'test');
    }

    /**
     * Loads all fixtures declared in the `$fixtures` property
     * @return void
     */
    public function loadFixtures()
    {
        $fixtures = $this->getProperty($this->fixtureManager, '_fixtureMap');

        foreach (array_keys($fixtures) as $fixture) {
            parent::loadFixtures($fixture);
        }
    }
}

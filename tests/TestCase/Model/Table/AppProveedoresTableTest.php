<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppProveedoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppProveedoresTable Test Case
 */
class AppProveedoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppProveedoresTable
     */
    public $AppProveedores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_proveedores',
        'app.app_proveedores_tipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppProveedores') ? [] : ['className' => AppProveedoresTable::class];
        $this->AppProveedores = TableRegistry::getTableLocator()->get('AppProveedores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppProveedores);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

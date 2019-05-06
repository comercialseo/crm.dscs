<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppProductosTable Test Case
 */
class AppProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppProductosTable
     */
    public $AppProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_productos',
        'app.app_departamentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppProductos') ? [] : ['className' => AppProductosTable::class];
        $this->AppProductos = TableRegistry::getTableLocator()->get('AppProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppProductos);

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

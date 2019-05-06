<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppGastosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppGastosTable Test Case
 */
class AppGastosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppGastosTable
     */
    public $AppGastos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_gastos',
        'app.app_proveedores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppGastos') ? [] : ['className' => AppGastosTable::class];
        $this->AppGastos = TableRegistry::getTableLocator()->get('AppGastos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppGastos);

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

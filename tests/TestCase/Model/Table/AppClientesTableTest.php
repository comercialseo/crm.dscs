<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppClientesTable Test Case
 */
class AppClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppClientesTable
     */
    public $AppClientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_clientes',
        'app.app_usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppClientes') ? [] : ['className' => AppClientesTable::class];
        $this->AppClientes = TableRegistry::getTableLocator()->get('AppClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppClientes);

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

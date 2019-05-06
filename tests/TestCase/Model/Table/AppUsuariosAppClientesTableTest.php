<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppUsuariosAppClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppUsuariosAppClientesTable Test Case
 */
class AppUsuariosAppClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppUsuariosAppClientesTable
     */
    public $AppUsuariosAppClientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_usuarios_app_clientes',
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
        $config = TableRegistry::getTableLocator()->exists('AppUsuariosAppClientes') ? [] : ['className' => AppUsuariosAppClientesTable::class];
        $this->AppUsuariosAppClientes = TableRegistry::getTableLocator()->get('AppUsuariosAppClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppUsuariosAppClientes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

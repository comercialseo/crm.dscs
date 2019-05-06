<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppClienteNegocioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppClienteNegocioTable Test Case
 */
class AppClienteNegocioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppClienteNegocioTable
     */
    public $AppClienteNegocio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_cliente_negocio',
        'app.app_cliente_negocio_sectores',
        'app.app_clientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppClienteNegocio') ? [] : ['className' => AppClienteNegocioTable::class];
        $this->AppClienteNegocio = TableRegistry::getTableLocator()->get('AppClienteNegocio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppClienteNegocio);

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

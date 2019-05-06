<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppFacturasLineasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppFacturasLineasTable Test Case
 */
class AppFacturasLineasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppFacturasLineasTable
     */
    public $AppFacturasLineas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_facturas_lineas',
        'app.app_productos',
        'app.app_clientes_negocios',
        'app.fl_facturas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppFacturasLineas') ? [] : ['className' => AppFacturasLineasTable::class];
        $this->AppFacturasLineas = TableRegistry::getTableLocator()->get('AppFacturasLineas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppFacturasLineas);

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

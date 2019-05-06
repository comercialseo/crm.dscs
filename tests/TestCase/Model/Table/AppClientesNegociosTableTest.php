<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppClientesNegociosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppClientesNegociosTable Test Case
 */
class AppClientesNegociosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppClientesNegociosTable
     */
    public $AppClientesNegocios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_clientes_negocios',
        'app.app_clientes_negocios_sectores',
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
        $config = TableRegistry::getTableLocator()->exists('AppClientesNegocios') ? [] : ['className' => AppClientesNegociosTable::class];
        $this->AppClientesNegocios = TableRegistry::getTableLocator()->get('AppClientesNegocios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppClientesNegocios);

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

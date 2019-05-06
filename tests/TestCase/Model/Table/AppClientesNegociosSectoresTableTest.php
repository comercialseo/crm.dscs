<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppClientesNegociosSectoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppClientesNegociosSectoresTable Test Case
 */
class AppClientesNegociosSectoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppClientesNegociosSectoresTable
     */
    public $AppClientesNegociosSectores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_clientes_negocios_sectores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppClientesNegociosSectores') ? [] : ['className' => AppClientesNegociosSectoresTable::class];
        $this->AppClientesNegociosSectores = TableRegistry::getTableLocator()->get('AppClientesNegociosSectores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppClientesNegociosSectores);

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
}

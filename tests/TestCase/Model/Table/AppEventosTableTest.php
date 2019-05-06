<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppEventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppEventosTable Test Case
 */
class AppEventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppEventosTable
     */
    public $AppEventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_eventos',
        'app.ev_app_usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppEventos') ? [] : ['className' => AppEventosTable::class];
        $this->AppEventos = TableRegistry::getTableLocator()->get('AppEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppEventos);

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

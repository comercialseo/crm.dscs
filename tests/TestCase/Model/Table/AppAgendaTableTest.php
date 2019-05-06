<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppAgendaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppAgendaTable Test Case
 */
class AppAgendaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppAgendaTable
     */
    public $AppAgenda;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_agenda',
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
        $config = TableRegistry::getTableLocator()->exists('AppAgenda') ? [] : ['className' => AppAgendaTable::class];
        $this->AppAgenda = TableRegistry::getTableLocator()->get('AppAgenda', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppAgenda);

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

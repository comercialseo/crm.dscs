<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppOpcionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppOpcionesTable Test Case
 */
class AppOpcionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppOpcionesTable
     */
    public $AppOpciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_opciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppOpciones') ? [] : ['className' => AppOpcionesTable::class];
        $this->AppOpciones = TableRegistry::getTableLocator()->get('AppOpciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppOpciones);

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

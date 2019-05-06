<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppEquiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppEquiposTable Test Case
 */
class AppEquiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppEquiposTable
     */
    public $AppEquipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_equipos',
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
        $config = TableRegistry::getTableLocator()->exists('AppEquipos') ? [] : ['className' => AppEquiposTable::class];
        $this->AppEquipos = TableRegistry::getTableLocator()->get('AppEquipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppEquipos);

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

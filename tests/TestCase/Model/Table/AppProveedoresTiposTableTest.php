<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppProveedoresTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppProveedoresTiposTable Test Case
 */
class AppProveedoresTiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppProveedoresTiposTable
     */
    public $AppProveedoresTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_proveedores_tipos',
        'app.app_proveedores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppProveedoresTipos') ? [] : ['className' => AppProveedoresTiposTable::class];
        $this->AppProveedoresTipos = TableRegistry::getTableLocator()->get('AppProveedoresTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppProveedoresTipos);

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

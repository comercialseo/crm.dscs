<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppDepartamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppDepartamentosTable Test Case
 */
class AppDepartamentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppDepartamentosTable
     */
    public $AppDepartamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_departamentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppDepartamentos') ? [] : ['className' => AppDepartamentosTable::class];
        $this->AppDepartamentos = TableRegistry::getTableLocator()->get('AppDepartamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppDepartamentos);

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

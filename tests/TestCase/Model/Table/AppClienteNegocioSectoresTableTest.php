<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppClienteNegocioSectoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppClienteNegocioSectoresTable Test Case
 */
class AppClienteNegocioSectoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppClienteNegocioSectoresTable
     */
    public $AppClienteNegocioSectores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.app_cliente_negocio_sectores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AppClienteNegocioSectores') ? [] : ['className' => AppClienteNegocioSectoresTable::class];
        $this->AppClienteNegocioSectores = TableRegistry::getTableLocator()->get('AppClienteNegocioSectores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AppClienteNegocioSectores);

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

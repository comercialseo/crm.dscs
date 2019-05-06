<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppUsuariosAppClientesFixture
 *
 */
class AppUsuariosAppClientesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'app_cliente_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'app_usuarios_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fx_app_usuarios_' => ['type' => 'index', 'columns' => ['app_usuarios_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['app_cliente_id', 'app_usuarios_id'], 'length' => []],
            'fx_app_clientes_' => ['type' => 'foreign', 'columns' => ['app_cliente_id'], 'references' => ['app_clientes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fx_app_usuarios_' => ['type' => 'foreign', 'columns' => ['app_usuarios_id'], 'references' => ['app_usuarios', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'app_cliente_id' => 1,
                'app_usuarios_id' => 1
            ],
        ];
        parent::init();
    }
}

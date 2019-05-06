<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppFacturasLineasFixture
 *
 */
class AppFacturasLineasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fl_cantidad' => ['type' => 'tinyinteger', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fl_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'fl_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fl_productos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fl_negocios_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fl_facturas_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idx_fl_productos_id' => ['type' => 'index', 'columns' => ['fl_productos_id'], 'length' => []],
            'idx_facturas_id' => ['type' => 'index', 'columns' => ['fl_facturas_id'], 'length' => []],
            'idx_clientes_negocios_id' => ['type' => 'index', 'columns' => ['fl_negocios_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fx_negocios_lineas' => ['type' => 'foreign', 'columns' => ['fl_negocios_id'], 'references' => ['app_clientes_negocios', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'fx_productos_lineas' => ['type' => 'foreign', 'columns' => ['fl_productos_id'], 'references' => ['app_productos', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'fl_cantidad' => 1,
                'fl_creacion' => 1556910569,
                'fl_modificacion' => '2019-05-03 19:09:29',
                'fl_productos_id' => 1,
                'fl_negocios_id' => 1,
                'fl_facturas_id' => 1
            ],
        ];
        parent::init();
    }
}

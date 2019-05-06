<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppFacturasFixture
 *
 */
class AppFacturasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fc_codigo' => ['type' => 'string', 'fixed' => true, 'length' => 8, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'fc_periodo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fc_iva_estipulado' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_iva' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_irpf_estipulado' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_irpf' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_base_imponible' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_descuento' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'fc_total' => ['type' => 'decimal', 'length' => 8, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fc_entregada' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'fc_abonada' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'fc_comentarios' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'fc_fecha_facturacion' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fc_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'fc_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fc_app_negocios_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fc_app_usuarios_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idx_negocios_id' => ['type' => 'index', 'columns' => ['fc_app_negocios_id'], 'length' => []],
            'idx_usuarios_id' => ['type' => 'index', 'columns' => ['fc_app_usuarios_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ux_fc_codigo' => ['type' => 'unique', 'columns' => ['fc_codigo'], 'length' => []],
            'fx_app_negocios_clientes' => ['type' => 'foreign', 'columns' => ['fc_app_negocios_id'], 'references' => ['app_clientes_negocios', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'fx_app_usuarios_facturas' => ['type' => 'foreign', 'columns' => ['fc_app_usuarios_id'], 'references' => ['app_usuarios', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
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
                'fc_codigo' => 'Lorem ',
                'fc_periodo' => 'Lorem ipsum dolor sit amet',
                'fc_iva_estipulado' => 1.5,
                'fc_iva' => 1.5,
                'fc_irpf_estipulado' => 1.5,
                'fc_irpf' => 1.5,
                'fc_base_imponible' => 1.5,
                'fc_descuento' => 1.5,
                'fc_total' => 1.5,
                'fc_entregada' => 1,
                'fc_abonada' => 1,
                'fc_comentarios' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'fc_fecha_facturacion' => '2019-05-03',
                'fc_creacion' => 1556910540,
                'fc_modificacion' => '2019-05-03 19:09:00',
                'fc_app_negocios_id' => 1,
                'fc_app_usuarios_id' => 1
            ],
        ];
        parent::init();
    }
}

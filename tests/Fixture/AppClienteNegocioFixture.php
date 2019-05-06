<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppClienteNegocioFixture
 *
 */
class AppClienteNegocioFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'app_cliente_negocio';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cn_tipo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'em', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_razon_social' => ['type' => 'string', 'length' => 90, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_cif_nif' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_direccion' => ['type' => 'string', 'length' => 70, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_codigo_postal' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cn_poblacion' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_provincia' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_gerente' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_telefono_princ' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cn_telefono_secun' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cn_email' => ['type' => 'string', 'length' => 70, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cn_comentario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cn_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'cn_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_cliente_negocio_sector_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'app_clientes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idx_app_negocio_clientes_id' => ['type' => 'index', 'columns' => ['app_clientes_id'], 'length' => []],
            'idx_negocio_negocio_sector' => ['type' => 'index', 'columns' => ['app_cliente_negocio_sector_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ux_cif_nif' => ['type' => 'unique', 'columns' => ['cn_cif_nif'], 'length' => []],
            'ux_email' => ['type' => 'unique', 'columns' => ['cn_email'], 'length' => []],
            'ux_razon_social' => ['type' => 'unique', 'columns' => ['cn_razon_social'], 'length' => []],
            'fx_app_cliente_negocio_sector' => ['type' => 'foreign', 'columns' => ['app_cliente_negocio_sector_id'], 'references' => ['app_cliente_negocio_sectores', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fx_app_clientes_app_negocios' => ['type' => 'foreign', 'columns' => ['app_clientes_id'], 'references' => ['app_clientes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'cn_tipo' => 'Lorem ipsum dolor sit amet',
                'cn_razon_social' => 'Lorem ipsum dolor sit amet',
                'cn_cif_nif' => 'Lorem ip',
                'cn_direccion' => 'Lorem ipsum dolor sit amet',
                'cn_codigo_postal' => 1,
                'cn_poblacion' => 'Lorem ipsum dolor sit amet',
                'cn_provincia' => 'Lorem ipsum dolor sit amet',
                'cn_gerente' => 'Lorem ipsum dolor sit amet',
                'cn_telefono_princ' => 1,
                'cn_telefono_secun' => 1,
                'cn_email' => 'Lorem ipsum dolor sit amet',
                'cn_comentario' => 1,
                'cn_creacion' => 1554130858,
                'cn_modificacion' => '2019-04-01 15:00:58',
                'app_cliente_negocio_sector_id' => 1,
                'app_clientes_id' => 1
            ],
        ];
        parent::init();
    }
}

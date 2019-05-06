<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppProveedoresFixture
 *
 */
class AppProveedoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pr_nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pr_direccion' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pr_codigo_postal' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pr_poblacion' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pr_provincia' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'madrid', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pr_telefono_princ' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pr_telefono_secun' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pr_email' => ['type' => 'string', 'length' => 70, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pr_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'pr_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_proveedores_tipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fx_proveedores_tipos' => ['type' => 'index', 'columns' => ['app_proveedores_tipo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ux_pr_nombre' => ['type' => 'unique', 'columns' => ['pr_nombre'], 'length' => []],
            'ux_pr_email' => ['type' => 'unique', 'columns' => ['pr_email'], 'length' => []],
            'fx_proveedores_tipos' => ['type' => 'foreign', 'columns' => ['app_proveedores_tipo_id'], 'references' => ['app_proveedores_tipos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'pr_nombre' => 'Lorem ipsum dolor sit amet',
                'pr_direccion' => 'Lorem ipsum dolor sit amet',
                'pr_codigo_postal' => 1,
                'pr_poblacion' => 'Lorem ipsum dolor sit amet',
                'pr_provincia' => 'Lorem ipsum dolor sit amet',
                'pr_telefono_princ' => 1,
                'pr_telefono_secun' => 1,
                'pr_email' => 'Lorem ipsum dolor sit amet',
                'pr_creacion' => 1554395932,
                'pr_modificacion' => '2019-04-04 16:38:52',
                'app_proveedores_tipo_id' => 1
            ],
        ];
        parent::init();
    }
}

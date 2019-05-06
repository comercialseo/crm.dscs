<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppAgendaFixture
 *
 */
class AppAgendaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'app_agenda';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ag_nombre' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_apellidos' => ['type' => 'string', 'length' => 75, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_contacto' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_telefono_princ' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ag_telefono_secun' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ag_email' => ['type' => 'string', 'length' => 90, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_direccion' => ['type' => 'string', 'length' => 70, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_codigo_postal' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ag_poblacion' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_provincia' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_cumpleannos' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ag_twitter' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_facebook' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_foto' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_foto_url' => ['type' => 'string', 'length' => 75, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_web' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ag_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'ag_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'app_usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idx_agenda_app_usuario_id' => ['type' => 'index', 'columns' => ['app_usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ux_ag_contacto' => ['type' => 'unique', 'columns' => ['ag_contacto'], 'length' => []],
            'ux_telefono_principal' => ['type' => 'unique', 'columns' => ['ag_telefono_princ'], 'length' => []],
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
                'ag_nombre' => 'Lorem ipsum dolor sit amet',
                'ag_apellidos' => 'Lorem ipsum dolor sit amet',
                'ag_contacto' => 'Lorem ipsum dolor sit amet',
                'ag_telefono_princ' => 1,
                'ag_telefono_secun' => 1,
                'ag_email' => 'Lorem ipsum dolor sit amet',
                'ag_direccion' => 'Lorem ipsum dolor sit amet',
                'ag_codigo_postal' => 1,
                'ag_poblacion' => 'Lorem ipsum dolor sit amet',
                'ag_provincia' => 'Lorem ipsum dolor sit amet',
                'ag_cumpleannos' => '2019-04-04',
                'ag_twitter' => 'Lorem ipsum dolor sit amet',
                'ag_facebook' => 'Lorem ipsum dolor sit amet',
                'ag_foto' => 'Lorem ipsum dolor sit amet',
                'ag_foto_url' => 'Lorem ipsum dolor sit amet',
                'ag_web' => 'Lorem ipsum dolor sit amet',
                'ag_creacion' => 1554410967,
                'ag_modificacion' => '2019-04-04 20:49:27',
                'app_usuario_id' => 1
            ],
        ];
        parent::init();
    }
}

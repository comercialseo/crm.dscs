<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppUsuariosAppEquiposFixture
 *
 */
class AppUsuariosAppEquiposFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'app_equipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'app_usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fx_equipos_usuarios_id' => ['type' => 'index', 'columns' => ['app_usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['app_equipo_id', 'app_usuario_id'], 'length' => []],
            'fx_equipos_usuarios_id' => ['type' => 'foreign', 'columns' => ['app_usuario_id'], 'references' => ['app_usuarios', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'fx_usuarios_equipos_id' => ['type' => 'foreign', 'columns' => ['app_equipo_id'], 'references' => ['app_equipos', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'app_equipo_id' => 1,
                'app_usuario_id' => 1
            ],
        ];
        parent::init();
    }
}

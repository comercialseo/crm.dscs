<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppOpcionesFixture
 *
 */
class AppOpcionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'op_meta' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'op_valor' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'op_tipo' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'st', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'op_creacion' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'op_modificacion' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'ux_op_meta' => ['type' => 'unique', 'columns' => ['op_meta'], 'length' => []],
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
                'op_meta' => 'Lorem ipsum dolor sit amet',
                'op_valor' => 'Lorem ipsum dolor sit amet',
                'op_tipo' => 'Lorem ipsum dolor sit amet',
                'op_creacion' => 1554240031,
                'op_modificacion' => '2019-04-02 21:20:31'
            ],
        ];
        parent::init();
    }
}

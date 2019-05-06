<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SettingsConfiguration Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property string|null $description
 * @property string $type
 * @property bool $editable
 * @property int $weight
 * @property bool $autoload
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class SettingsConfiguration extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*' => true
    ];
}

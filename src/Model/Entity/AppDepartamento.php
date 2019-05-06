<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppDepartamento Entity
 *
 * @property int $id
 * @property string $dp_departamento
 * @property string|null $dp_descripcion
 * @property int $dp_labores
 * @property \Cake\I18n\FrozenTime $dp_creacion
 * @property \Cake\I18n\FrozenTime $dp_modificacion
 */
class AppDepartamento extends Entity
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

    /**
     * Método para formatear las fechas de usuarios
     */
    protected function _getDpCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getDpModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppEquipo Entity
 *
 * @property int $id
 * @property string $eq_nombre
 * @property string|null $eq_descripcion
 * @property \Cake\I18n\FrozenTime|null $eq_creacion
 * @property \Cake\I18n\FrozenTime|null $eq_modificacion
 * @property int $app_usuarios_id
 *
 * @property \App\Model\Entity\AppUsuario[] $app_usuarios
 */
class AppEquipo extends Entity
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
        'app_usuarios_id' => false,
        '*' => true
    ];

    /**
     * Método para formatear las fechas de usuarios
     */
    protected function _getEqCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getEqModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppEvento Entity
 *
 * @property int $id
 * @property string $ev_evento
 * @property string|null $ev_descripcion
 * @property \Cake\I18n\FrozenTime $ev_comienzo
 * @property \Cake\I18n\FrozenTime $ev_final
 * @property string $ev_prioridad
 * @property \Cake\I18n\FrozenTime $ev_creacion
 * @property \Cake\I18n\FrozenTime $ev_modificacion
 * @property int $ev_app_usuarios_id
 *
 * @property \App\Model\Entity\EvAppUsuario $ev_app_usuario
 */
class AppEvento extends Entity
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
        '*'  => true
    ];

    /**
     * Método para formatear las fechas de usuarios
     */
    protected function _getEvCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getEvModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

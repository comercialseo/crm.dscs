<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppCliente Entity
 *
 * @property int $id
 * @property string $cl_nombre
 * @property string $cl_apellidos
 * @property string $cl_email
 * @property int $cl_telefono_princ
 * @property int|null $cl_telefono_secun
 * @property string|null $cl_comentario
 * @property \Cake\I18n\FrozenTime|null $cl_creacion
 * @property \Cake\I18n\FrozenTime|null $cl_modificacion
 * @property int $cl_app_usuarios_id
 *
 * @property \App\Model\Entity\AppUsuario $app_usuario
 */
class AppCliente extends Entity
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
    protected function _getClCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getClModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

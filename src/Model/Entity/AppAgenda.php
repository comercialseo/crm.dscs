<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppAgenda Entity
 *
 * @property int $id
 * @property string|null $ag_nombre
 * @property string|null $ag_apellidos
 * @property string $ag_contacto
 * @property int $ag_telefono_princ
 * @property int|null $ag_telefono_secun
 * @property string|null $ag_email
 * @property string|null $ag_direccion
 * @property int|null $ag_codigo_postal
 * @property string|null $ag_poblacion
 * @property string|null $ag_provincia
 * @property \Cake\I18n\FrozenDate|null $ag_cumpleannos
 * @property string|null $ag_twitter
 * @property string|null $ag_facebook
 * @property string|null $ag_foto
 * @property string|null $ag_foto_url
 * @property string|null $ag_web
 * @property \Cake\I18n\FrozenTime|null $ag_creacion
 * @property \Cake\I18n\FrozenTime|null $ag_modificacion
 * @property int $app_usuario_id
 *
 * @property \App\Model\Entity\AppUsuario $app_usuario
 */
class AppAgenda extends Entity
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

    protected function _setAgFoto($value)
    {
        if(!empty($value))
        {
            return $value;
        }else {
            return 'user.png';
        }        
    }

    protected function _setAgFotoUrl($value)
    {
        if(!empty($value))
        {
            return $value;
        }else {
            return 'webroot/img/contactos/AppAgendas/ag_foto';
        }
    }

    /**
     * Método para formatear las fechas de usuarios
     */
    protected function _getAgCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getAgModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

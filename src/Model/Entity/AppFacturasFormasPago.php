<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppFacturasFormasPago Entity
 *
 * @property int $id
 * @property string $fp_forma
 * @property string|null $fp_comentario
 * @property \Cake\I18n\FrozenTime $fp_creacion
 * @property \Cake\I18n\FrozenTime|null $fp_modificacion
 */
class AppFacturasFormasPago extends Entity
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
    protected function _getFpCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getFpModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

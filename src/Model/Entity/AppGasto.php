<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppGasto Entity
 *
 * @property int $id
 * @property string|null $ga_codigo
 * @property float $ga_iva
 * @property float|null $ga_irpf
 * @property float|null $ga_descuento
 * @property float $ga_base
 * @property float $ga_total
 * @property string|null $ga_factura
 * @property string|null $fa_factura_url
 * @property string|null $ga_comentario
 * @property \Cake\I18n\FrozenTime|null $ga_creacion
 * @property \Cake\I18n\FrozenTime|null $ga_modificacion
 * @property int $app_proveedores_id
 *
 * @property \App\Model\Entity\AppProveedore $app_proveedore
 */
class AppGasto extends Entity
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
    protected function _getGaCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getGaModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

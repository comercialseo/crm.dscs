<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppFacturasLinea Entity
 *
 * @property int $id
 * @property int $fl_cantidad
 * @property \Cake\I18n\FrozenTime|null $fl_creacion
 * @property \Cake\I18n\FrozenTime|null $fl_modificacion
 * @property int $fl_productos_id
 * @property int $fl_negocios_id
 * @property int|null $fl_facturas_id
 *
 * @property \App\Model\Entity\AppProducto $app_producto
 * @property \App\Model\Entity\AppClientesNegocio $app_clientes_negocio
 * @property \App\Model\Entity\FlFactura $fl_factura
 */
class AppFacturasLinea extends Entity
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
    protected function _getFlCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getFlModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

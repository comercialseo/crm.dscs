<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppFactura Entity
 *
 * @property int $id
 * @property string|null $fc_codigo
 * @property string $fc_periodo
 * @property float $fc_iva_estipulado
 * @property float $fc_iva
 * @property float $fc_irpf_estipulado
 * @property float $fc_irpf
 * @property float $fc_base_imponible
 * @property float|null $fc_descuento
 * @property float $fc_total
 * @property bool $fc_entregada
 * @property bool $fc_abonada
 * @property string|null $fc_comentarios
 * @property \Cake\I18n\FrozenDate $fc_fecha_facturacion
 * @property \Cake\I18n\FrozenTime|null $fc_creacion
 * @property \Cake\I18n\FrozenTime|null $fc_modificacion
 * @property int $fc_app_negocios_id
 * @property int $fc_app_usuarios_id
 *
 * @property \App\Model\Entity\AppClientesNegocio $app_clientes_negocio
 * @property \App\Model\Entity\AppUsuario $app_usuario
 */
class AppFactura extends Entity
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
    protected function _getFcCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getFcModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

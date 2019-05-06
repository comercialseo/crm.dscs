<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppClientesNegocio Entity
 *
 * @property int $id
 * @property string $cn_tipo
 * @property string $cn_razon_social
 * @property string $cn_cif_nif
 * @property string $cn_direccion
 * @property int $cn_codigo_postal
 * @property string $cn_poblacion
 * @property string $cn_provincia
 * @property string|null $cn_gerente
 * @property int $cn_telefono_princ
 * @property int|null $cn_telefono_secun
 * @property string $cn_email
 * @property int $cn_comentario
 * @property \Cake\I18n\FrozenTime|null $cn_creacion
 * @property \Cake\I18n\FrozenTime|null $cn_modificacion
 * @property int $app_cliente_negocio_sector_id
 * @property int $app_clientes_id
 *
 * @property \App\Model\Entity\AppClientesNegociosSectore $app_clientes_negocios_sectore
 * @property \App\Model\Entity\AppCliente $app_cliente
 */
class AppClientesNegocio extends Entity
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
    protected function _getCnCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getCnModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppProveedore Entity
 *
 * @property int $id
 * @property string $pr_nombre
 * @property string|null $pr_direccion
 * @property int|null $pr_codigo_postal
 * @property string|null $pr_poblacion
 * @property string|null $pr_provincia
 * @property int $pr_telefono_princ
 * @property int|null $pr_telefono_secun
 * @property string|null $pr_email
 * @property \Cake\I18n\FrozenTime|null $pr_creacion
 * @property \Cake\I18n\FrozenTime|null $pr_modificacion
 * @property int $app_proveedores_tipo_id
 *
 * @property \App\Model\Entity\AppProveedoresTipo $app_proveedores_tipo
 */
class AppProveedore extends Entity
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
    protected function _getPrCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getPrModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}

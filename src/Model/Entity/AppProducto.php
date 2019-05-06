<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppProducto Entity
 *
 * @property int $id
 * @property string $pr_nombre
 * @property string|null $pr_descripcion
 * @property string $pr_tipo
 * @property float $pr_base_imponible
 * @property \Cake\I18n\FrozenTime|null $pr_creacion
 * @property \Cake\I18n\FrozenTime $pr_modificacion
 * @property int $app_departamentos_id
 *
 * @property \App\Model\Entity\AppDepartamento $app_departamento
 */
class AppProducto extends Entity
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

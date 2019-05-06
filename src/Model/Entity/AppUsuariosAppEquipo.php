<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppUsuariosAppEquipo Entity
 *
 * @property int $app_equipo_id
 * @property int $app_usuario_id
 *
 * @property \App\Model\Entity\AppEquipo $app_equipo
 * @property \App\Model\Entity\AppUsuario $app_usuario
 */
class AppUsuariosAppEquipo extends Entity
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
        'app_equipo' => true,
        'app_usuario' => true
    ];
}

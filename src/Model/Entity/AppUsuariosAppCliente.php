<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppUsuariosAppCliente Entity
 *
 * @property int $app_cliente_id
 * @property int $app_usuarios_id
 *
 * @property \App\Model\Entity\AppCliente $app_cliente
 * @property \App\Model\Entity\AppUsuario $app_usuario
 */
class AppUsuariosAppCliente extends Entity
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
        'app_cliente' => true,
        'app_usuario' => true
    ];
}

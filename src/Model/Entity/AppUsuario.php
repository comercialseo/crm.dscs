<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * AppUsuario Entity
 *
 * @property int $id
 * @property string $us_usuario
 * @property string $us_password
 * @property string $us_email
 * @property string $us_nombre
 * @property string $us_apellidos
 * @property string $us_rol
 * @property bool $us_valido
 * @property \Cake\I18n\FrozenTime $us_creacion
 * @property \Cake\I18n\FrozenTime $us_modificacion
 */
class AppUsuario extends Entity
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
        '*'  => true,
        'id' => false,
    ];

    /**
     * Método para crear reglas en el nombre de usuario
     */
    protected function _setUsUsuario($value) 
    {
        $denegadas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "Ñ", " ");
        $value     = str_replace($denegadas, "", $value);
        $value     = trim(strtolower($value));
        return $value;
    }

    /**
     * Método para encriptar passwords Accessors & Mutators
     */
    protected function _setUsPassword($value) 
    {
        if(!empty($value)) {
            return (new DefaultPasswordHasher)->hash($value);
        }else 
        {
            $idUsuario       = $this->_properties['id'];
            $usuarioPassword = TableRegistry::get('AppUsuarios')->recuperarPassword($idUsuario);
            return $usuarioPassword;
        }
        
    }

    /**
     * Método para formatear las fechas de usuarios
     */
    protected function _getUsCreacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
    protected function _getUsModificacion($value) 
    {
        return @date_format($value,"d-m-Y [H:i]");
    }
}
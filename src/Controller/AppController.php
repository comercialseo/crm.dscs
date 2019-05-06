<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Settings\Core\Setting;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $helpers = array(
        'AssetCompress.AssetCompress'
    );

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', ['enableBeforeRedirect' => false,]);
        $this->loadComponent('Flash');

        /**
        ===========================================
        ===========================================
        == Autenticación de Administradores =======
        ===========================================
        */
        /**
         * 
         $this->loadComponent('Auth', [
            'authError'    => 'Zona con acceso restringido',
            'flashElement' => 'success',
            'authorize'    => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'AppUsuarios',
                    'finder'    => 'sesionadminsautorizados',
                    'fields'    => ['username' => 'us_usuario', 'password' => 'us_password']
                    ]
            ],   
            'storage' => 'Session',
            'loginAction' => [
                'controller' => 'Webroot',
                'action'     => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Webroot',
                'action'     => 'display', 'home' 
            ],
            'logoutRedirect' => [
                'controller' => 'Webroot',
                'action'     => 'login'            
            ],
            'unauthorizedRedirect' => $this->referer()
        ]);
         */
        $this->loadComponent('Auth', [
            'authError'    => 'Zona con acceso restringido',
            'flashElement' => 'success',
            'authorize'    => ['Controller'],
            'authenticate' => [
                'Tools.MultiColumn' => [
                    'userModel' => 'AppUsuarios',
                    'finder'    => 'sesionadminsautorizados',
                    'fields' => [
                        'username' => 'us_usuario',
                        'password' => 'us_password'
                    ],
                    'columns' => ['us_usuario', 'us_email'],
                ]
            ],   
            'storage' => 'Session',
            'loginAction' => [
                'controller' => 'Webroot',
                'action'     => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Webroot',
                'action'     => 'display', 'home' 
            ],
            'logoutRedirect' => [
                'controller' => 'Webroot',
                'action'     => 'login'            
            ],
            'unauthorizedRedirect' => $this->referer()
        ]);
        // END Autenticación de Administradores ===

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        Setting::register('App.RazSoc', 'Nombre Empresa S.L.', ['description' => 'La razón social de la empresa', 'type' => 'sistema']);
        Setting::register('App.Direc', 'C/Ejemplo 1', ['description' => 'La dirección de facturación de la empresa', 'type' => 'sistema']);
        Setting::register('App.CodPos', '28001', ['description' => 'El código postal', 'type' => 'sistema']);
        Setting::register('App.Poblac', 'Madrid', ['description' => 'La población', 'type' => 'sistema']);
        Setting::register('App.Provin', 'Madrid', ['description' => 'La provincia', 'type' => 'sistema']);
        Setting::register('App.Telef', '91-1234567', ['description' => 'El teléfono principal', 'type' => 'sistema']);
        Setting::register('App.TelefMov', '666 776 887', ['description' => 'El teléfono móvil', 'type' => 'sistema']);
        Setting::register('App.Email', 'dirreccion@email.com', ['description' => 'El email de la empresa', 'type' => 'sistema']);
        Setting::register('App.Logo', 'logotipo.png', ['description' => 'El archivo logotipo', 'type' => 'sistema']);
        Setting::register('App.IVA', '21', ['description' => 'El valor impositivo del IVA', 'type' => 'sistema']);
        Setting::register('App.IRPF', '15', ['description' => 'El valor impositivo del IRPF', 'type' => 'sistema']);
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) && 
            in_array($this->response->getType(), ['application/json', 'application/xml']))
        {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) 
    {
        /**
         * Carga de datos del usuario actual en variable
         * @usuarioActual
         */
        $this->set('usuarioActual', $this->Auth->user());
    }

    public function isAuthorized($usuario_actual)
    {
        /**
         *  Condicional padre para permisos de administración 
        */
        if(isset($usuarioActual['us_rol']) && $usuarioActual['us_rol'] !== '')
        {
            return true;
        } 
        else 
        {
            $this->Flash->error('El acceso a esta zona está restringido', ['key' => 'auth']);
            return false;
        }
    }
}

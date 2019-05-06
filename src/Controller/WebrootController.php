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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Webroot/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/webroot-controller.html
 */
class WebrootController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cache.PartialCache', [
            'actions' => 
                [
                    'login' => YEAR,
                    'display' => MONTH
                ]
        ]);
    }

    public function beforeFilter(Event $event) 
    {
        /**
         * Claves de enrutamiento para visitantes a la app
         */$this->Auth->allow(['login', 'logout']);
         parent::beforeFilter($event);
    }

    public function isAuthorized($usuarioActual)
    {
        if(isset($usuarioActual['us_rol']))
        {
            return true;
        }
        return parent::isAuthorized($usuarioActual);
    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Webroot_Index]', [], ['ip' => true, 'referer' => true]);
    }

    public function login()
    {
        if ($this->request->is('post'))
        {
            $appusuarios = $this->Auth->identify();
            if($appusuarios)
            {
                $this->Auth->setUser($appusuarios);
                $user = $this->request->getSession()->read('Auth.User.us_usuario');
                $this->loadComponent('Logging.Log');
                $this->Log->info('RegAcces', '[Login]', ['user' => $user], ['ip' => true, 'referer' => true]);

                return $this->redirect($this->Auth->redirectUrl());
            }else {
                //$userNameIntento = $this->request->getData('us_usuario');
                //$passNameIntento = $this->request->getData('us_password');
                $this->Flash->error('Datos fallidos, por favor inténtalo de nuevo', ['key' => 'auth']);
            }  
        }
    }

    public function logout() 
    {
        //$userNameAcceso = $this->request->session()->read('Auth.User.us_usuario');
        $this->Flash->success('Has cerrado tu sesión de forma correcta');

        $user = $_SESSION['Auth']['User']['us_usuario'];
        $this->loadComponent('Logging.Log');
        $this->Log->info('RegAcces', '[Logout]', ['user' => $user], ['ip' => true, 'referer' => true]);

        return $this->redirect($this->Auth->logout());
    }
}

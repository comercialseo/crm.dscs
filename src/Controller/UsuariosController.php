<?php
/**
 * =====================================================================
 * Controlador de Usuarios de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppUsuariosTable $AppUsuarios
 * @method    \App\Model\Entity\AppUsuario[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppUsuarios Controller
 *
 * @property \App\Model\Table\AppUsuariosTable $AppUsuarios
 *
 * @method \App\Model\Entity\AppUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event) 
    {
        parent::beforeFilter($event);
    }

    public function isAuthorized($usuarioActual)
    {
        if(isset($usuarioActual['us_rol']) && ($usuarioActual['us_rol'] == 'sa'))
        {
            if(in_array($this->request->getParam('action'), ['index', 'ver', 'crear', 'editar', 'borrar', 'perfil']))
            {
                return true;
            }
        }
        return parent::isAuthorized($usuarioActual);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('AppUsuarios');
        $appUsuarios = $this->AppUsuarios->find('all');

        $this->set(compact('appUsuarios'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppUsuarios');
        $this->loadModel('AppClientes');
        $appUsuario = $this->AppUsuarios->get($id, [
            'contain' => ['AppClientes']
        ]);

        $this->set('appUsuario', $appUsuario);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppUsuarios');
        $appUsuario = $this->AppUsuarios->newEntity();
        if ($this->request->is('post')) {
            $appUsuario = $this->AppUsuarios->patchEntity($appUsuario, $this->request->getData());
            $appUsuario->us_token      = 1;
            $appUsuario->us_token_pass = 1;
            if($this->request->data('us_nombre') == '')
            {
                $appUsuario->us_nombre = NULL;
            }else {
                $appUsuario->us_nombre = $this->request->data('us_nombre');
            }
            if($this->request->data('us_apellidos') == '')
            {
                $appUsuario->us_apellidos = NULL;
            }else {
                $appUsuario->us_apellidos = $this->request->data('us_apellidos');
            }
            if ($this->AppUsuarios->save($appUsuario)) {
                $this->Flash->success(__('El Usuario se ha creado con éxito.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear el nuevo Usuario. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $this->set(compact('appUsuario'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Crear]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppUsuarios');
        $appUsuario = $this->AppUsuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appUsuario = $this->AppUsuarios->patchEntity($appUsuario, $this->request->getData());
            if ($this->AppUsuarios->save($appUsuario)) {
                $this->Flash->success(__('Los datos del Usuario se han actualizado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se han podido guardar los datos del Usuario. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $this->set(compact('appUsuario'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Perfil method
     *
     * @param string|null $id App Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function perfil($id = null)
    {
        $this->loadModel('AppUsuarios');

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Perfil]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Delete method
     *
     * @param string|null $id App Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('AppUsuarios');
        $appUsuario = $this->AppUsuarios->get($id);
        if ($this->AppUsuarios->delete($appUsuario)) {
            $this->Flash->success(__('El Usuario se ha borrado con éxito.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar el Usuario. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Usuarios_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}

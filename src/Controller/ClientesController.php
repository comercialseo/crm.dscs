<?php
/**
 * =====================================================================
 * Controlador de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesTable $AppClientes
 * @method    \App\Model\Entity\AppCliente[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppClientes Controller
 *
 * @property \App\Model\Table\AppClientesTable $AppClientes
 *
 * @method \App\Model\Entity\AppCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
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
    if(isset($usuarioActual['us_rol']) && ( 
        ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') 
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'asignar', 'borrar']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'ed')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'au')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'us')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver']))
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
        $this->loadModel('AppClientes');
        $appClientes = $this->AppClientes->find('all', [
            'contain' => ['AppUsuarios']
        ]);

        $appCliente = $this->AppClientes->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appCliente = $this->AppClientes->patchEntity($appCliente, $this->request->getData());
            if ($this->AppClientes->save($appCliente)) {

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Clientes_Crear]', [], ['ip' => true, 'referer' => true]);

                $this->Flash->success(__('El Cliente se ha creado con éxito.'));
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Clientes_Crear]', [], ['ip' => true, 'referer' => true]);
            }            
        }
        $appUsuarios = $this->AppClientes->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario'
                                                ]);
        $this->set(compact('appClientes', 'appCliente', 'appUsuarios'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Clientes_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppClientes');
        $this->loadModel('AppUsuarios');
        $this->loadModel('AppClientesNegocios');
        $appCliente = $this->AppClientes->get($id, [
            'contain' => ['AppUsuarios', 'AppClientesNegocios']
        ]);

        $this->set('appCliente', $appCliente);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Clientes_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppClientes');
        $appCliente = $this->AppClientes->newEntity();
        if ($this->request->is('post')) {
            $appCliente = $this->AppClientes->patchEntity($appCliente, $this->request->getData());
            if ($this->AppClientes->save($appCliente)) {
                $this->Flash->success(__('El Cliente se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Clientes_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Clientes_Crear]', [], ['ip' => true, 'referer' => true]);
            }
            
        }
        $appUsuarios = $this->AppClientes->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario'
                                                ]);
        $this->set(compact('appCliente', 'appUsuarios'));        
    }

    /**
     * Asignar method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function asignar($id = null)
    {
        $this->loadModel('AppClientes');
        $appCliente = $this->AppClientes->newEntity();
        if ($this->request->is('post')) {
            $appCliente = $this->AppClientes->patchEntity($appCliente, $this->request->getData());
            if ($this->AppClientes->save($appCliente)) {
                $this->Flash->success(__('El Cliente se ha asignado con éxito al usuario.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Clientes_Asignar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['controller' => 'usuarios', 'action' => 'ver', $id]);
            }else {
                 $this->Flash->error(__('No se ha podido asignar el nuevo Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Clientes_Asignar]', ['id' => $id], ['ip' => true, 'referer' => true]);
            }           
        }
        $appUsuarios = $this->AppClientes->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario'
                                                ]);
        $this->set(compact('appCliente', 'appUsuarios'));

        $this->loadModel('AppUsuarios');
        $this->loadModel('AppClientes');
        $appUsuario = $this->AppUsuarios->get($id, [
            'contain' => ['AppClientes']
        ]);

        $this->set('appUsuario', $appUsuario);        
    }

    /**
     * Edit method
     *
     * @param string|null $id App Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppClientes');
        $appCliente = $this->AppClientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appCliente = $this->AppClientes->patchEntity($appCliente, $this->request->getData());
            if ($this->AppClientes->save($appCliente)) {
                $this->Flash->success(__('Los datos del Cliente se han actualizado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Clientes_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se han actualizado los datos del Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Clientes_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
            }            
        }
        $appUsuarios = $this->AppClientes->AppUsuarios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'us_usuario'
                                                ]);
        $this->set(compact('appCliente', 'appUsuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('AppClientes');
        $appCliente = $this->AppClientes->get($id);
        if ($this->AppClientes->delete($appCliente)) {
            $this->Flash->success(__('El Cliente se ha borrado con éxito.'));
            $this->loadComponent('Logging.Log');
            $this->Log->info('RegBrouser', '[Clientes_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);
        } else {
            $this->Flash->error(__('No se ha podido borrar del sistema al Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
            $this->loadComponent('Logging.Log');
            $this->Log->error('RegBrouser', '[Clientes_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);
        }        

        return $this->redirect(['action' => 'index']);
    }
}

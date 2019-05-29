<?php
/**
 * =====================================================================
 * Controlador de Negocios de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesNegociosTable $AppClientesNegocios
 * @method    \App\Model\Entity\AppClientesNegocio[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
/**
 * AppClientesNegocios Controller
 *
 * @property \App\Model\Table\AppClientesNegociosTable $AppClientesNegocios
 *
 * @method \App\Model\Entity\AppClientesNegocio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesNegociosController extends AppController
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
        $this->loadModel('AppClientesNegocios');
        $appClientesNegocios = $this->AppClientesNegocios->find('all', [
            'contain' => ['AppClientesNegociosSectores', 'AppClientes']
        ]);

        $appClientesNegocio = $this->AppClientesNegocios->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appClientesNegocio = $this->AppClientesNegocios->patchEntity($appClientesNegocio, $this->request->getData());
            if ($this->AppClientesNegocios->save($appClientesNegocio)) {
                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegocios_Crear]', [], ['ip' => true, 'referer' => true]);

                $this->Flash->success(__('El Negocio de Cliente se ha creado con éxito.'));
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Negocio de Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegocios_Crear]', [], ['ip' => true, 'referer' => true]);
            }            
            return $this->redirect(['action' => 'index']);
        }

        $appClientesNegociosSectores = $this->AppClientesNegocios->AppClientesNegociosSectores->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'nt_sector'
                                            ]);
        $appClientes = $this->AppClientesNegocios->AppClientes->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'cl_apellidos'
                                            ]);

        $this->set(compact('appClientesNegocio', 'appClientesNegocios', 'appClientesNegociosSectores', 'appClientes'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ClientesNegocios_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Clientes Negocio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppClientesNegocios');
        $appClientesNegocio = $this->AppClientesNegocios->get($id, [
            'contain' => ['AppClientesNegociosSectores', 'AppClientes', 'AppFacturas']
        ]);

        $this->set('appClientesNegocio', $appClientesNegocio);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ClientesNegocios_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppClientesNegocios');
        $appClientesNegocio = $this->AppClientesNegocios->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appClientesNegocio = $this->AppClientesNegocios->patchEntity($appClientesNegocio, $this->request->getData());
            if ($this->AppClientesNegocios->save($appClientesNegocio)) {
                $this->Flash->success(__('El Negocio de Cliente se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegocios_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Negocio de Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegocios_Crear]', [], ['ip' => true, 'referer' => true]);
            }            
        }
        $appClientesNegociosSectores = $this->AppClientesNegocios->AppClientesNegociosSectores->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'nt_sector'
                                            ]);
        $appClientes = $this->AppClientesNegocios->AppClientes->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'cl_apellidos'
                                            ]);
        $this->set(compact('appClientesNegocio', 'appClientesNegociosSectores', 'appClientes'));        
    }

    /**
     * Asignar method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function asignar($id = null)
    {
        $this->loadModel('AppClientesNegocios');
        $appClientesNegocio = $this->AppClientesNegocios->newEntity();
        if ($this->request->is('post')) {
            $appClientesNegocio = $this->AppClientesNegocios->patchEntity($appClientesNegocio, $this->request->getData());
            if ($this->AppClientesNegocios->save($appClientesNegocio)) {
                $this->Flash->success(__('El Negocio de Cliente se ha asignado con éxito al cliente.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegocios_Asignar]', ['ip' => $ip], ['ip' => true, 'referer' => true]);

                return $this->redirect(['controller' => 'clientes', 'action' => 'ver', $id]);
            }else {
                $this->Flash->error(__('No se ha podido asignar el nuevo Negocio de Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegocios_Asignar]', ['ip' => $ip], ['ip' => true, 'referer' => true]);
            }
        }
        $appClientesNegociosSectores = $this->AppClientesNegocios->AppClientesNegociosSectores->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'nt_sector'
                                            ]);
        $appClientes = $this->AppClientesNegocios->AppClientes->find('list', ['limit' => 200]);
        $this->set(compact('appClientesNegocio', 'appClientesNegociosSectores', 'appClientes'));

        $this->loadModel('AppClientes');
        $appCliente = $this->AppClientes->get($id, [
            'contain' => ['AppUsuarios']
        ]);

        $this->set('appCliente', $appCliente);

        $this->loadModel('AppClientes');
        $this->loadModel('AppUsuarios');
        $this->loadModel('AppClientesNegocios');
        $appCliente = $this->AppClientes->get($id, [
            'contain' => ['AppUsuarios', 'AppClientesNegocios']
        ]);

        $this->set('appCliente', $appCliente);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Clientes Negocio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppClientesNegocios');
        $appClientesNegocio = $this->AppClientesNegocios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appClientesNegocio = $this->AppClientesNegocios->patchEntity($appClientesNegocio, $this->request->getData());
            if ($this->AppClientesNegocios->save($appClientesNegocio)) {
                $this->Flash->success(__('Los datos del Negocio del Cliente se han actualizado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegocios_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se han actualizado los datos del Negocio del Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegocios_Editar]', ['ip' => $ip], ['ip' => true, 'referer' => true]);
            }
        }
        $appClientesNegociosSectores = $this->AppClientesNegocios->AppClientesNegociosSectores->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'nt_sector'
                                            ]);
        $appClientes = $this->AppClientesNegocios->AppClientes->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'cl_apellidos'
                                            ]);
        $this->set(compact('appClientesNegocio', 'appClientesNegociosSectores', 'appClientes'));        
    }

    /**
     * Delete method
     *
     * @param string|null $id App Clientes Negocio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->loadModel('AppClientesNegocios');
        $this->request->allowMethod(['post', 'delete']);
        $appClientesNegocio = $this->AppClientesNegocios->get($id);
        if ($this->AppClientesNegocios->delete($appClientesNegocio)) {
            $this->Flash->success(__('El Negocio del Cliente se ha borrado con éxito.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar del sistema el Negocio del Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

            $this->loadComponent('Logging.Log');
            $this->Log->error('RegBrouser', '[ClientesNegocios_Borrar]', ['ip' => $ip], ['ip' => true, 'referer' => true]);
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ClientesNegocios>Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}

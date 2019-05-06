<?php
/**
 * =====================================================================
 * Controlador de Sectores Negocios de Clientes de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppClientesNegociosSectoresTable $AppClientesNegociosSectores
 * @method    \App\Model\Entity\AppClientesNegociosSectore[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppClientesNegociosSectores Controller
 *
 * @property \App\Model\Table\AppClientesNegociosSectoresTable $AppClientesNegociosSectores
 *
 * @method \App\Model\Entity\AppClientesNegociosSectore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesNegociosSectoresController extends AppController
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
        $this->loadModel('AppClientesNegociosSectores');
        $appClientesNegociosSectores = $this->AppClientesNegociosSectores->find('all', [
            'contain' => []
        ]);

        $appClientesNegociosSectore = $this->AppClientesNegociosSectores->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appClientesNegociosSectore = $this->AppClientesNegociosSectores->patchEntity($appClientesNegociosSectore, $this->request->getData());
            if ($this->AppClientesNegociosSectores->save($appClientesNegociosSectore)) {

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegociosSectores_Crear]', [], ['ip' => true, 'referer' => true]);

                $this->Flash->success(__('El Sector de Negocios de Clientes se ha creado con éxito.'));
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Sector de Negocios de Clientes. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegociosSectores_Crear]', [], ['ip' => true, 'referer' => true]);
            }            
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('appClientesNegociosSectores', 'appClientesNegociosSectore'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ClientesNegociosSectores_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Ver method
     *
     * @param string|null $id App Clientes Negocios Sectore id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppClientesNegociosSectores');
        $appClientesNegociosSectore = $this->AppClientesNegociosSectores->get($id, [
            'contain' => ['AppClientesNegocios']
        ]);
        $this->set('appClientesNegociosSectore', $appClientesNegociosSectore);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[ClientesNegociosSectores>Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Crear method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppClientesNegociosSectores');
        $appClientesNegociosSectore = $this->AppClientesNegociosSectores->newEntity();
        if ($this->request->is('post')) {
            $appClientesNegociosSectore = $this->AppClientesNegociosSectores->patchEntity($appClientesNegociosSectore, $this->request->getData());
            if ($this->AppClientesNegociosSectores->save($appClientesNegociosSectore)) {
                $this->Flash->success(__('El Sector de Negocios de Clientes se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegociosSectores_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Sector de Negocios de Clientes. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegociosSectores_Crear]', [], ['ip' => true, 'referer' => true]);
            }
        }
        $this->set(compact('appClientesNegociosSectore'));
    }

    /**
     * Editar method
     *
     * @param string|null $id App Clientes Negocios Sectore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppClientesNegociosSectores');
        $appClientesNegociosSectore = $this->AppClientesNegociosSectores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appClientesNegociosSectore = $this->AppClientesNegociosSectores->patchEntity($appClientesNegociosSectore, $this->request->getData());
            if ($this->AppClientesNegociosSectores->save($appClientesNegociosSectore)) {
                $this->Flash->success(__('The app clientes negocios sectore has been saved.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[ClientesNegociosSectores_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {

                $this->Flash->error(__('The app clientes negocios sectore could not be saved. Please, try again.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[ClientesNegociosSectores_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

            }
        }
        $this->set(compact('appClientesNegociosSectore'));
    }

    /**
     * Borrar method
     *
     * @param string|null $id App Clientes Negocios Sectore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->loadModel('AppClientesNegociosSectores');
        $this->request->allowMethod(['post', 'delete']);
        $appClientesNegociosSectore = $this->AppClientesNegociosSectores->get($id);
        if ($this->AppClientesNegociosSectores->delete($appClientesNegociosSectore)) {
            $this->Flash->success(__('The app clientes negocios sectore has been deleted.'));

            $this->loadComponent('Logging.Log');
            $this->Log->info('RegBrouser', '[ClientesNegociosSectores_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        } else {
            $this->Flash->error(__('The app clientes negocios sectore could not be deleted. Please, try again.'));

            $this->loadComponent('Logging.Log');
            $this->Log->error('RegBrouser', '[ClientesNegociosSectores_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);
        }

        return $this->redirect(['action' => 'index']);
    }
}

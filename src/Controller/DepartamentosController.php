<?php
/**
 * =====================================================================
 * Controlador de Departamentos del negocio en la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppDepartamentosTable $AppDepartamentos
 * @method    \App\Model\Entity\AppDepartamento[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppDepartamentos Controller
 *
 *
 * @method \App\Model\Entity\AppDepartamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartamentosController extends AppController
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'borrar']))
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
        $this->loadModel('AppDepartamentos');
        $appDepartamentos = $this->AppDepartamentos->find('all');

        $appDepartamento = $this->AppDepartamentos->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appDepartamento = $this->AppDepartamentos->patchEntity($appDepartamento, $this->request->getData());
            if ($this->AppDepartamentos->save($appDepartamento)) {
                $this->Flash->success(__('El Departamento se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Departamentos_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Departamento. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Departamentos_Crear]', [], ['ip' => true, 'referer' => true]);
            }
        }

        $this->set(compact('appDepartamentos', 'appDepartamento'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Departamentos_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Departamento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppDepartamentos');
        $appDepartamento = $this->AppDepartamentos->get($id, [
            'contain' => []
        ]);

        $this->set('appDepartamento', $appDepartamento);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Departamentos_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppDepartamentos');
        $appDepartamento = $this->AppDepartamentos->newEntity();
        if ($this->request->is('post')) {
            $appDepartamento = $this->AppDepartamentos->patchEntity($appDepartamento, $this->request->getData());
            if ($this->AppDepartamentos->save($appDepartamento)) {
                $this->Flash->success(__('El Departamento se ha creado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Departamentos_Crear]', [], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se ha podido crear el nuevo Departamento. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Departamentos_Crear]', [], ['ip' => true, 'referer' => true]);

            }
        }
        $this->set(compact('appDepartamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Departamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppDepartamentos');
        $appDepartamento = $this->AppDepartamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appDepartamento = $this->AppDepartamentos->patchEntity($appDepartamento, $this->request->getData());
            if ($this->AppDepartamentos->save($appDepartamento)) {
                $this->Flash->success(__('Los datos del Departamento se han actualizado con éxito.'));

                $this->loadComponent('Logging.Log');
                $this->Log->info('RegBrouser', '[Departamentos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('No se han actualizado los datos del Cliente. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));

                $this->loadComponent('Logging.Log');
                $this->Log->error('RegBrouser', '[Departamentos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);

            }
        }
        $this->set(compact('appDepartamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Departamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appDepartamento = $this->AppDepartamentos->get($id);
        if ($this->AppDepartamentos->delete($appDepartamento)) {
            $this->Flash->success(__('The app departamento has been deleted.'));

            $this->loadComponent('Logging.Log');
            $this->Log->info('RegBrouser', '[Departamentos_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        } else {
            $this->Flash->error(__('The app departamento could not be deleted. Please, try again.'));

            $this->loadComponent('Logging.Log');
            $this->Log->error('RegBrouser', '[Departamentos_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);
        }

        return $this->redirect(['action' => 'index']);
    }
}

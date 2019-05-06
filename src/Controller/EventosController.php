<?php
/**
 * =====================================================================
 * Controlador de Eventos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppEventossTable $AppEventos
 * @method    \App\Model\Entity\AppEvento[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppEventos Controller
 *
 *
 * @method \App\Model\Entity\AppEvento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventosController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Calendar.Calendar');
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'borrar', 'calendar']))
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
        $this->loadModel('AppEventos');
        $appEventos = $this->paginate($this->AppEventos);

        $this->set(compact('appEventos'));
    }

    /**
     * View method
     *
     * @param string|null $id App Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $appEvento = $this->AppEventos->get($id, [
            'contain' => []
        ]);

        $this->set('appEvento', $appEvento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $appEvento = $this->AppEventos->newEntity();
        if ($this->request->is('post')) {
            $appEvento = $this->AppEventos->patchEntity($appEvento, $this->request->getData());
            if ($this->AppEventos->save($appEvento)) {
                $this->Flash->success(__('The app evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app evento could not be saved. Please, try again.'));
        }
        $this->set(compact('appEvento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $appEvento = $this->AppEventos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appEvento = $this->AppEventos->patchEntity($appEvento, $this->request->getData());
            if ($this->AppEventos->save($appEvento)) {
                $this->Flash->success(__('The app evento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app evento could not be saved. Please, try again.'));
        }
        $this->set(compact('appEvento'));
    }

    /**
     * @param string|null $year
     * @param string|null $month
     * @return void
     */
    public function calendar($year = null, $month = null) {
        $this->loadModel('AppEventos');
        $this->Calendar->init($year, $month);

        // Fetch calendar items (like events, birthdays, ...)
        $options = [
            'year' => $this->Calendar->year(),
            'month' => $this->Calendar->month(),
        ];
        $appEventos = $this->AppEventos->find('calendar', $options);
        
        $this->set(compact('appEventos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appEvento = $this->AppEventos->get($id);
        if ($this->AppEventos->delete($appEvento)) {
            $this->Flash->success(__('The app evento has been deleted.'));
        } else {
            $this->Flash->error(__('The app evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

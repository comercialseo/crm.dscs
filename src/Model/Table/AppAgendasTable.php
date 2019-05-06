<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppAgenda Model
 *
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 *
 * @method \App\Model\Entity\AppAgenda get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppAgenda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppAgenda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppAgenda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppAgenda|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppAgenda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppAgenda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppAgenda findOrCreate($search, callable $callback = null, $options = [])
 */
class AppAgendasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('app_agendas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'app_usuario_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'ag_foto' => [
                'path' => 'webroot{DS}img{DS}contactos{DS}{model}{DS}{field}',
                'fields' => [
                    'dir' => 'ag_foto_url'
                ],
            ],
        ]);

        $this->addBehavior('Tags.Tag', ['taggedCounter' => false]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de contacto igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('ag_nombre')
            ->minLength('ag_nombre', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_nombre', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_nombre');

        $validator
            ->scalar('ag_apellidos')
            ->minLength('ag_apellidos', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_apellidos', 75, __('No puede contener más de 75 caracteres'))
            ->allowEmpty('ag_apellidos');

        $validator
            ->scalar('ag_contacto')
            ->minLength('ag_contacto', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_contacto', 30, __('No puede contener más de 30 caracteres'))
            ->requirePresence('ag_contacto', 'create')
            ->notEmpty('ag_contacto', __('Tienes que rellenar este campo...'))
            ->add('ag_contacto', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El contacto ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->integer('ag_telefono_princ')
            ->requirePresence('ag_telefono_princ', 'create')
            ->notEmpty('ag_telefono_princ', __('Tienes que rellenar este campo...'))
            ->add('ag_telefono_princ', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El teléfono ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->integer('ag_telefono_secun')
            ->allowEmpty('ag_telefono_secun');

        $validator
            ->scalar('ag_email')
            ->minLength('ag_email', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_email', 70, __('No puede contener más de 70 caracteres'))
            ->allowEmpty('ag_email')
            ->add('ag_email', 'email', ['rule' => 'email', 'message' => __('La dirección de email no es válida')]);

        $validator
            ->scalar('ag_direccion')
            ->minLength('ag_direccion', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_direccion', 70, __('No puede contener más de 70 caracteres'))
            ->allowEmpty('ag_direccion');

        $validator
            ->integer('ag_codigo_postal')
            ->allowEmpty('ag_codigo_postal');

        $validator
            ->scalar('ag_poblacion')
            ->minLength('ag_poblacion', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_poblacion', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_poblacion');

        $validator
            ->scalar('ag_provincia')
            ->minLength('ag_provincia', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_provincia', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_provincia');

        $validator
            ->date('ag_cumpleannos')
            ->allowEmpty('ag_cumpleannos');

        $validator
            ->scalar('ag_twitter')
            ->minLength('ag_twitter', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_twitter', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_twitter');

        $validator
            ->scalar('ag_facebook')
            ->minLength('ag_facebook', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_facebook', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_facebook');

        $validator
            ->scalar('ag_instagram')
            ->minLength('ag_instagram', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_instagram', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('ag_instagram');

        $validator
            ->allowEmpty('ag_foto');

        $validator
            ->allowEmpty('ag_foto_url');

        $validator
            ->scalar('ag_web')
            ->minLength('ag_web', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('ag_web', 100, __('No puede contener más de 70 caracteres'))
            ->url('ag_web', __('La url no es válida, tiene que comenzar por http:// o https://'))
            ->allowEmpty('ag_web');

        $validator
            ->dateTime('ag_creacion')
            ->allowEmpty('ag_creacion');

        $validator
            ->dateTime('ag_modificacion')
            ->allowEmpty('ag_modificacion');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['ag_contacto']));
        $rules->add($rules->isUnique(['ag_telefono_princ']));
        $rules->add($rules->existsIn(['app_usuario_id'], 'AppUsuarios'));

        return $rules;
    }
}

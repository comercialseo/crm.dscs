<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppClientes Model
 *
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 *
 * @method \App\Model\Entity\AppCliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppCliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppCliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppCliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppCliente|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppCliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppCliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppCliente findOrCreate($search, callable $callback = null, $options = [])
 */
class AppClientesTable extends Table
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

        $this->setTable('app_clientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppUsuarios', [
            'foreignKey' => 'cl_app_usuarios_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AppClientesNegocios', [
            'foreignKey' => 'app_clientes_id',
        ]);
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de cliente igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('cl_nombre')
            ->minLength('cl_nombre', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cl_nombre', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('cl_nombre', 'create')
            ->notEmpty('cl_nombre', __('Tienes que rellenar este campo...'));

        $validator
            ->scalar('cl_apellidos')
            ->minLength('cl_apellidos', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cl_apellidos', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('cl_apellidos', 'create')
            ->notEmpty('cl_apellidos', __('Tienes que rellenar este campo...'));

        $validator
            ->scalar('cl_email')
            ->minLength('cl_email', 5, __('Ha de contener más de 5 caracteres'))
            ->maxLength('cl_email', 90, __('No puede contener más de 90 caracteres'))
            ->requirePresence('cl_email', 'create')
            ->notEmpty('cl_email', __('Tienes que rellenar este campo...'))
            ->add('cl_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El email ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->integer('cl_telefono_princ')
            ->minLength('cl_telefono_princ', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('cl_telefono_princ', 10, __('No puede contener más de 10 caracteres'))
            ->requirePresence('cl_telefono_princ', 'create')
            ->notEmpty('cl_telefono_princ', __('Tienes que rellenar este campo...'))
            ->add('cl_telefono_princ', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El teléfono principal ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->integer('cl_telefono_secun')
            ->minLength('cl_telefono_secun', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('cl_telefono_secun', 10, __('No puede contener más de 10 caracteres'))
            ->allowEmpty('cl_telefono_secun');

        $validator
            ->scalar('cl_comentario')
            ->minLength('cl_comentario', 5, __('Ha de contener más de 5 caracteres'))
            ->allowEmpty('cl_comentario');

        $validator
            ->dateTime('cl_creacion')
            ->allowEmpty('cl_creacion');

        $validator
            ->dateTime('cl_modificacion')
            ->allowEmpty('cl_modificacion');

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
        $rules->add($rules->isUnique(['cl_email']));
        $rules->add($rules->isUnique(['cl_telefono_princ']));

        $rules->add($rules->existsIn(['cl_app_usuarios_id'], 'AppUsuarios'));

        return $rules;
    }
}

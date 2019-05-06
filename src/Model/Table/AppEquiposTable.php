<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppEquipos Model
 *
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsTo $AppUsuarios
 * @property \App\Model\Table\AppUsuariosTable|\Cake\ORM\Association\BelongsToMany $AppUsuarios
 *
 * @method \App\Model\Entity\AppEquipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppEquipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppEquipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppEquipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppEquipo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppEquipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppEquipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppEquipo findOrCreate($search, callable $callback = null, $options = [])
 */
class AppEquiposTable extends Table
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

        $this->setTable('app_equipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppDepartamentos', [
            'foreignKey' => 'app_departamentos_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('AppUsuarios', [
            'joinType'   => 'INNER',
            'joinTable'  => 'app_usuarios_app_equipos'
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de equipo igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('eq_nombre')
            ->maxLength('eq_nombre', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('eq_nombre', 'create')
            ->notEmpty('eq_nombre', __('Tienes que rellenar este campo...'))
            ->add('eq_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El equipo ya existe en la base de datos, por favor escoge otro distinto...')]);

        $validator
            ->scalar('eq_descripcion')
            ->allowEmpty('eq_descripcion');

        $validator
            ->dateTime('eq_creacion')
            ->allowEmpty('eq_creacion');

        $validator
            ->dateTime('eq_modificacion')
            ->allowEmpty('eq_modificacion');

        $validator
            ->scalar('eq_leader')
            ->allowEmpty('eq_leader');

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
        $rules->add($rules->isUnique(['eq_nombre']));
        $rules->add($rules->existsIn(['app_departamentos_id'], 'AppDepartamentos'));

        return $rules;
    }
}

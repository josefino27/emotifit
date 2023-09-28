<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emocionxusuario
 *
 * @property $id_emocionxusuario
 * @property $id_emocion
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Emocion $emocion
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Emocionxusuario extends Model
{
    protected $primaryKey = 'id_emocionxusuario';
    protected $table = 'emocionxusuario';
    
    static $rules = [
		'id_emocion' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_emocionxusuario','id_emocion','id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emocion()
    {
        return $this->hasOne('App\Models\EmocionModel', 'id_emocion', 'id_emocion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}

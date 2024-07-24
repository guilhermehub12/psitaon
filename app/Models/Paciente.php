<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Paciente extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pacientes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'data_nascimento',
        'genero',
        'escolaridade',
        'profissao',
        'estado_civil',
        'endereco',
        'telefone',
        'email',
        'nome_pai',
        'nome_mae',
        'ativo',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
    }

    public function fill(array $attributes)
    {
        parent::fill($attributes);
        $this->updated_by = Auth::id();
    }

    public function delete()
    {
        $this->deleted_by = Auth::id();
        $this->save();

        parent::delete();
    }

    // protected function dataNascimento(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value ? Carbon::createFromFormat("Y-m-d H:i:s", $value)->format("d/m/Y") : null,
    //         set: fn ($value) => $value ? Carbon::createFromFormat("d/m/Y", $value)->format("Y-m-d") : null
    //     );
    // }

    protected function telefone(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? preg_replace("/\D/", "", $value) : null
        );
    }

    // protected function celular(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => $value ? preg_replace("/\D/", "", $value) : null
    //     );
    // }

    public function responsaveis(): HasMany
    {
        return $this->hasMany(PacienteResponsavel::class, "paciente_id", "id");
    }

    public function tipos_responsaveis(): BelongsToMany
    {
        return $this->belongsToMany(TipoResponsavel::class, 'usuarios_perfis', 'paciente_id', 'tipo_responsavel_id');
    }

}

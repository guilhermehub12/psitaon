<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'profissao',
        'endereco',
        'telefone',
        'email',
        'nome_pai',
        'nome_mae',

        'genero_id',
        'escolaridade_id',
        'estado_civil_id',

        'ativo',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'agenda',
        'responsavel',
        'tipo_responsavel',
        'financeiro',
        'genero',
        'escolaridade',
        'estado_civil'
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

    public function agenda(): HasMany
    {
        return $this->hasMany(PacienteAgenda::class, "paciente_id", "id");
    }

    public function responsavel(): HasMany
    {
        return $this->hasMany(PacienteResponsavel::class, "paciente_id", "id");
    }

    public function tipo_responsavel(): HasMany
    {
        return $this->hasMany(TipoResponsavel::class, 'paciente_id', 'id');
    }

    public function financeiro(): HasMany
    {
        return $this->hasMany(PacienteFinanceiro::class, 'paciente_id', 'id');
    }

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }

    public function escolaridade(): BelongsTo
    {
        return $this->belongsTo(Escolaridade::class);
    }

    public function estado_civil(): BelongsTo
    {
        return $this->belongsTo(EstadoCivil::class);
    }

}

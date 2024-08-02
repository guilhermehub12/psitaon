<?php

namespace App\Models;

use App\Models\Prontuario\PacienteProntuarioAlimentacao;
use App\Models\Prontuario\PacienteProntuarioAvaliacao;
use App\Models\Prontuario\PacienteProntuarioDoenca;
use App\Models\Prontuario\PacienteProntuarioPlanejamento;
use App\Models\Prontuario\PacienteProntuarioQueixa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PacienteProntuario extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pacientes_prontuarios';

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
        'queixa_inicial',

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

    public function queixas(): HasMany
    {
        return $this->hasMany(PacienteProntuarioQueixa::class, "paciente_prontuario_id", "id");
    }

    public function alimentacoes(): HasMany
    {
        return $this->hasMany(PacienteProntuarioAlimentacao::class, 'paciente_prontuario_id', 'id');
    }

    public function doencas(): HasMany
    {
        return $this->hasMany(PacienteProntuarioDoenca::class, 'paciente_prontuario_id', 'id');
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(PacienteProntuarioAvaliacao::class, 'paciente_prontuario_id', 'id');
    }
    public function planejamentos(): HasMany
    {
        return $this->hasMany(PacienteProntuarioPlanejamento::class, 'paciente_prontuario_id', 'id');
    }

    public function generos(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }

    public function escolaridades(): BelongsTo
    {
        return $this->belongsTo(Escolaridade::class);
    }

    public function estados_civis(): BelongsTo
    {
        return $this->belongsTo(EstadoCivil::class);
    }

}

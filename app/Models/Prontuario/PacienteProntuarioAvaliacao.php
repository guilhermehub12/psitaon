<?php

namespace App\Models\Prontuario;

use App\Models\AreaAfetada;
use App\Models\Risco;
use App\Models\Sentimento;
use App\Models\TipoCrise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class PacienteProntuarioAvaliacao extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pacientes_prontuario_avaliacoes';

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
        'tipo_crise_id',
        'tipo_crise_descricao',

        'sentimento_id',
        'sentimento_descricao',

        'risco_id',
        'risco_descricao',

        'area_afetada_id',
        'area_afetada_descricao',

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

    public function tiposCrises(): BelongsTo
    {
        return $this->belongsTo(TipoCrise::class);
    }

    public function sentimentos(): BelongsTo
    {
        return $this->belongsTo(Sentimento::class);
    }

    public function riscos(): BelongsTo
    {
        return $this->belongsTo(Risco::class);
    }

    public function areasAfetadas(): BelongsTo
    {
        return $this->belongsTo(AreaAfetada::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProdutoAdicional extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "produtos_adicionais";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

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
    protected $keyType = "string";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nome",
        "descricao_resumida",
        "descricao_completa",
        "preco",
        "observacao",
        "ativo",
        "created_by",
        "updated_by",
        "deleted_by"
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

    protected function preco(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? number_format($value, 2, ',', '.') : '',
            set: fn ($value) => $value != null ? str_replace(['R$', '.', ','], ['', '', '.'], $value) : null
        );
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}

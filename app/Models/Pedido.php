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

class Pedido extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "pedidos";

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
        "descricao",
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

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, "produto_id", "id");
    }

    public function tamanhos(): HasMany
    {
        return $this->hasMany(ProdutoTamanho::class, "produto_id", "id");
    }

    public function sabores(): HasMany
    {
        return $this->hasMany(ProdutoSabor::class, "produto_id", "id");
    }

    public function modelos(): HasMany
    {
        return $this->hasMany(ProdutoModelo::class, "produto_id", "id");
    }

    public function adicionais(): HasMany
    {
        return $this->hasMany(ProdutoAdicional::class, "produto_id", "id");
    }
}

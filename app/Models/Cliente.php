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

class Cliente extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "clientes";

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
        "email",
        "data_nascimento",
        "telefone",
        "celular",
        "instagram",
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

    protected function dataNascimento(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat("Y-m-d", $value)->format("d/m/Y"),
            set: fn (string $value) => Carbon::createFromFormat("d/m/Y", $value)->format("Y-m-d")
        );
    }

    protected function telefone(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => preg_replace("/\D/", "", $value)
        );
    }

    protected function celular(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => preg_replace("/\D/", "", $value)
        );
    }

    public function datas(): HasMany
    {
        return $this->hasMany(ClienteData::class, "cliente_id", "id");
    }
}

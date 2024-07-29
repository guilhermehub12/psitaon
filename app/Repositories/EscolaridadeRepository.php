<?php

namespace App\Repositories;

use Exception;

use App\Models\Escolaridade;

class EscolaridadeRepository extends BaseRepository
{
    protected $model = Escolaridade::class;

    public function paginate($paginate = 10, $orderBy = 'created_at', $sort = 'ASC', $filters = [])
    {
        try {
            $query = $this->model->query();

            if (count($filters) > 0) {
            }

            $query->orderBy($orderBy, $sort);

            return $query->paginate($paginate);
        } catch (Exception $e) {
            return [];
        }
    }

    public function selectOption()
    {
        try {
            return $this->model
                ->all()
                ->sortBy('codigo')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            return [
                '' => $e->getMessage()
            ];
        }
    }

}

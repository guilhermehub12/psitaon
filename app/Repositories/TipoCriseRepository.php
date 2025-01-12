<?php

namespace App\Repositories;

use Exception;

use App\Models\TipoCrise;

class TipoCriseRepository extends BaseRepository
{
    protected $model = TipoCrise::class;

    public function paginate($paginate = 10, $orderBy = 'created_at', $sort = 'ASC', $filters = [])
    {
        try {
            // Instantiate the model to call query() method
            $query = (new $this->model)->newQuery();

            if (count($filters) > 0) {
                // Apply filters to the query if any
                foreach ($filters as $key => $value) {
                    $query->where($key, $value);
                }
            }

            $query->orderBy($orderBy, $sort);

            return $query->paginate($paginate);
        } catch (Exception $e) {
            // Return an empty collection or handle the exception as needed
            return [];
        }
    }

    public function selectOption()
    {
        try {
            // Instantiate the model to call all() method
            return (new $this->model)
                ->all()
                ->sortBy('codigo')
                ->pluck('nome', 'id')
                ->prepend('Escolha a opção', '');
        } catch (Exception $e) {
            // Return an array with the error message
            return [
                '' => $e->getMessage()
            ];
        }
    }

}


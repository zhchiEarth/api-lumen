<?php

namespace App\Repositories;

trait BaseRepository
{

    /**
     * Update columns in the record by id.
     *
     * @param $id
     * @param $input
     * @return App\Model|User
     */
    public function updateColumn($id, $input)
    {
        $this->model = $this->getById($id);

        foreach ($input as $key => $value) {
            $this->model->{$key} = $value;
        }

        return $this->model->save();
    }

    /**
     * Destroy a model.
     *
     * @param  $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * Get model by id.
     *
     * @return App\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get all the records
     *
     * @return array User
     */
    public function all()
    {
        return $this->model->get();
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
    public function page($input, $number = 15, $sort = 'desc', $sortColumn = 'created_at')
    {
        $this->model = $this->whereByColumns($input);
        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function whereByColumns($input)
    {

        if (!empty($input)) {
            foreach ($input as $key=>$value) {
                if ($value == null || $value == '') {
                    continue;
                }
                if (array_key_exists($key, $this->columns)) {
                    $this->model = $this->model->where($key, $this->columns[$key]['operator'], str_replace('@', $value, $this->columns[$key]['value']));
                } else {
                    dd($value);
                    $this->model = $this->model->where($key, $value);
                }
            }
        }
        return $this->model;
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return User
     */
    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    /**
     * Update a record by id.
     *
     * @param  $id
     * @param  $input
     * @return User
     */
    public function update($id, $input)
    {
        $this->model = $this->getById($id);

        return $this->save($this->model, $input);
    }

    /**
     * Save the input's data.
     *
     * @param  $model
     * @param  $input
     * @return User
     */
    public function save($model, $input)
    {
        $model->fill($input);

        $model->save();

        return $model;
    }
}
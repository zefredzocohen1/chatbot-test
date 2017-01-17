<?php namespace App\Repositories;

abstract class BaseRepository {

	/**
	 * The Model instance.
	 *
	 * @var Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * Get number of records.
	 *
	 * @return array
	 */
	public function getNumber()
	{
		$total = $this->model->count();
        return $total;
	}

	/**
	 * Destroy a model.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

	/**
	 * Get Model by id.
	 *
	 * @param  int  $id
	 * @return App\Models\Model
	 */
	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return App\Models\Model
     */
    public function getOneByField($field, $value)
    {
        return $this->model->where($field, $value)->first();
    }

	public function getAllByField($field, $value)
	{
		return $this->model->where($field, $value)
                            ->orderBy('id', 'asc')->get();
	}

	public function getFirstOrNew($arr){
		return $this->model->firstOrNew($arr);
	}
    /**
     * Get Model by job id.
     *
     * @param  int  $id
     * @return App\Models\Model
     */
    public function getByKey($key)
    {
        return $this->model->where('key','=',$key)->first();
    }

}

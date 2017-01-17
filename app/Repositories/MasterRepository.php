<?php

namespace App\Repositories;

use App\Master;

class MasterRepository extends BaseRepository
{
	/**
	 * Create a new MasterRepository instance.
	 *
   	 * @param  App\Master $master
	 * @return void
	 */
	public function __construct(Master $master)
	{
		$this->model = $master;
	}

	/**
	 * Save the Master.
	 *
	 * @param  App\Master $master
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($master, $inputs)
	{
        $master->save();
	}

    /**
     * Create a Master.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\Master
     */
    public function store($inputs)
    {
        $master = new $this->model;
        $master->group              = $inputs['group'];
        $master->code               = $inputs['code'];
        $master->name_vn            = $inputs['name_vn'];
        $master->name_en            = $inputs['name_en'];
        $master->name_ja            = $inputs['name_ja'];
        $master->active_flg         = $inputs['active_flg'];
        $master->attr1              = $inputs['attr1'];
//        $master->display_order      = $inputs['display_order'];
        $this->save($master, $inputs);

        return $master;
    }

	/**
	 * Update a Master.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\Master $master
	 * @return void
	 */
	public function update($master, $inputs)
	{
        $master->group              = $inputs['group'];
        $master->code               = $inputs['code'];
        $master->name_vn            = $inputs['name_vn'];
        $master->name_en            = $inputs['name_en'];
        $master->name_ja            = $inputs['name_ja'];
        $master->active_flg         = $inputs['active_flg'];
        $master->attr1              = $inputs['attr1'];
//        $master->display_order      = $inputs['display_order'];
		$this->save($master, $inputs);
	}

    public function getAll($keyword, $perPage)
    {
        $model = new $this->model;
        if(!empty($keyword)){
            $model = $model->where(function($q) use ($keyword) {
                $q->Where('group', 'like', "%{$keyword}%");
            });
        }
        $model = $model->orderBy('created_at', 'DESC');
        $model = $model->orderBy('group', 'ASC');
        $model = $model->select();
        $data  = $model->paginate($perPage);
        return $data;
    }

    public function getService()
    {
        $model = new $this->model();
        $model = $model->where('group', 'services')
                       ->where('attr1', 1);
        return $model->get();
    }
}

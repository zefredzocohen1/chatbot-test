<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
	/**
	 * Create a new UserRepository instance.
	 *
   	 * @param  App\User $user
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->model = $user;
	}

    /**
     * Create a company.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\User
     */
    public function store($inputs)
    {
        $user = new $this->model;
        $user->password        = bcrypt($inputs['password']);
        $user->email           = $inputs['email'];
        $user->authority       = $inputs['authority'];
        $user->contract_status = $inputs['contract_status'];
        $this->save($user, $inputs);

        return $user;
    }

	/**
	 * Save the User.
	 *
	 * @param  App\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($user, $inputs)
	{
        $user->name         = $inputs['name'];
        $user->company_name = $inputs['company_name'];
        $user->comment      = $inputs['comment'];
        $user->url          = $inputs['url'];
        $user->save();
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($user, $inputs)
	{
        if(isset($inputs['password'])){
            $user->password     = bcrypt($inputs['password']);
        }
        $user->email            = $inputs['email'];
        $user->contract_status  = $inputs['contract_status'];
        if (isset($inputs['authority'])) {
            $user->authority  = $inputs['authority'];
        }
		$this->save($user, $inputs);
	}

    public function updateAccount($user, $inputs)
    {
        if(isset($inputs['password'])){
            $user->password = bcrypt($inputs['password']);
        }
        $this->save($user, $inputs);
    }

    public function getAll($keyword, $perPage)
    {
        $model = new $this->model;
        if(!empty($keyword)){
            $model = $model->where(function($q) use ($keyword) {
                $q->Where('email', 'like', "%{$keyword}%");
            });
        }
        $model = $model->orderBy('created_at', 'DESC');
        $model = $model->select('id','name', 'email', 'company_name', 'contract_status', 'url', 'authority');
        $data  = $model->paginate($perPage);
        return $data;
    }
}

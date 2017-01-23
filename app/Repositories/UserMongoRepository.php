<?php
namespace App\Repositories;

  use App\User;
  use Illuminate\Support\Facades\DB;

  class UserMongoRepository extends BaseMongoRepository
{
    /**
     * Create a company.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\User
     */
    protected $collection = "users";
    public function __construct()
    {
        $this->collection = "users";
        $this->connection = DB::connection('mongodb');
    }

    public function store($input){
        $user = [];
        $user['name'] = $input['name'];
        $user['email'] = $input['email'];
        $user['authority'] = $input['authority'];
        $user['_id']        = $input['id'];
        $this->getCollection()->insert($user);
    }

    public function updateMongo($input){
        $user = [];
        $user['name']       = $input['name'];
        $user['email']      = $input['email'];
        $user['authority']  = $input['authority'];
        $this->getCollection()->where('_id', $input['id'])->update($user);
    }
}

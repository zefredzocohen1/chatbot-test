<?php
namespace App\Repositories;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;
class BaseMongoRepository extends Moloquent{
    protected $connection;
    protected $model;

    public function getCollection(){
        return $this->connection->collection($this->collection);
    }

    public function getById($id){
        $_collection = $this->getCollection();
        $row = $_collection->where('_id', $id)->first();
        return $row;
    }

    public function showAll(){
        return $this->getCollection()->get();
    }

    public function destroyMongo($id)
    {
        $_collection = $this->getCollection();
        return $_collection->delete($this->getById($id));
    }

}

<?php namespace App\Repos\Search;

use App\Interfaces\Search\SearchInterface;


/**
 * THE DEFAULT ELOQUENT MODEL REPOSITORY
 * Class SearchRepository
 * @package App\Repos\Search
 */
class SearchRepository implements SearchInterface
{
    /**
     * THIS IS THE ELOQUENT SEARCH REPOSITORY
     * Search a file by its name or its type
     * @param string $key
     * @param string $query
     * @param string $index
     * @param string $type
     * @param string $modelField
     * @param string $key_one
     * @param string $key_two
     * @param string $model
     * @return mixed
     *
     */
    public function search($key = "", $query = "", $index = "", $type ="", $modelField="", $key_one ="", $key_two="", $model="")
    {
        $model = 'App\\'.$model;

        $model = new $model;
        return $model->where($key, 'like', "%{$query}%")
            ->orWhere($key_one, 'like', "%{$query}%")
            ->orWhere($key_two, 'like', "%{$query}%")
            ->get();
    }

    /**
     * @param string $model
     * @param string $query
     * @param string $key
     * @param string $index
     * @param string $type
     * @return mixed|string
     *
     */
    public function all($model="", $query = "", $key="", $index="", $type="")
    {
        $model = 'App\\'.$model;
        $model = new $model;
        return $model::all();
    }

    public function searchFile($query){

    }
}
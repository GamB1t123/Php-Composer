<?php


namespace App\models;


use App\models\Common\Model;
use Lib\DB\Select;

class Post extends Model
{
    public function getPosts(array $filters = []) : array
    {
        $select = $this->select();
        $select->setTableNames('posts');
        if (!empty($filters)) {
            $select->setWhereCondition($filters);
        }

        return $select->execute();
    }

    public function updatePosts(array $filters) : array
    {
        $update = $this->update();
        $update->setTableNames('posts');
        $update->setWhereCondition($filters);
        unset($filters['id']);
        $update->setDataToUpdate($filters);

        return $update->execute();
    }
    public function getPost($id) : array
    {
        $select = $this->select();
        $select->setTableNames('posts');
        $select->setWhereCondition('id = '.$id);
        $executeResult =  $select->execute();
        return $executeResult;
    }

    public function createPosts(array $filters =[]) : array
    {
        $create = $this->insert();
        $create->setTableNames('posts');
        $executeResult =  $create->execute();
        return $executeResult;
    }
    public function deletePosts(array $filters) : array
    {
        $delete = $this->delete();
        $delete->setTableNames('posts');
        if (!empty($filters)) {
            $delete->setWhereCondition($filters);
        }
        return $delete->execute();
    }
}
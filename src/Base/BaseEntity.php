<?php

namespace D3CR33\Panel\Base;

/**
 * Class BaseEntity
 * @package D3CR33\Auth\Base\Controllers
 */
class BaseEntity extends BaseController
{
    /**
     * set model
     * @var
     */
    protected $model;
    protected $request;
    /**
     * find specific id on model
     * @param $param
     *
     * @return mixed
     */
    public function findOne($param)
    {
        return $this->model->find($param);
    }

    /**
     * return all model record
     * @return mixed
     */
    public function findAll()
    {
        return $this->model->all();
    }

    /**
     * create new record for model
     * @param $param
     *
     * @return mixed
     */
    public function create($param)
    {
        return $this->model->create($param);
    }


    /**
     * @param $id
     * @param $param
     *
     * @return mixed
     */
    public function update($id, $param)
    {
        return $this->model->find($id)->update($param);
    }

    /**
     * delete record
     * @param $param
     */
    public function delete($param)
    {
        $this->model->delete($param);
    }
}
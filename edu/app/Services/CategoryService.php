<?php

namespace App\Services;

use App\Models\{
    Category
};

use App\Services\CommunicationService;

class CategoryService
{
    protected $service;
    protected $communicationService;
    public function __construct(Category $service)
    {
        $this->service = $service;
    }
    public function table($type = null)
    {
        return $this->service->select('*');
    }
    public function select()
    {
        return $this->service;
    }
    public function paginate($request)
    {
        return $this->service->paginate(pagination($request->per_page));
    }
    public function requestOnly($request) {
    	return $request->only('name', 'description', 'parent_id');
    }
    public function store($request)
    {
        $service = new Category($this->requestOnly($request));

        $service->created_at = dateTime();
        $service->save();
        return $service;
    }
    public function get($id = null)
    {
        return $this->service->find($id);
    }
    public function update($request, $service)
    {
        if (!is_object($service)) {
            $service = $this->get($service);
        }
        $service->update($this->requestOnly($request));
        $service->updated_at = dateTime();
        $service->save();

        return $service;
    }
    public function delete($service = null)
    {
        if (!is_object($service)) {
            $service = $this->get($service);
        }
        $service->delete();
        return $service;
    }
}

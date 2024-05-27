<?php
namespace App\Repositories;


use App\Models\PartsModel;

class PartRepository{

    private $partsModel;

    public function __construct(){
        $this->partsModel = new PartsModel();

    }
    public function partsAll()
    {
       return $this->partsModel->all();
    }
    public function partById($partId)
    {
       return $this->partsModel->where('id', $partId)->first();
    }

    public function query()
    {
        return $this->partsModel->query();
    }
    public function partId($part)
    {
        return $this->partsModel->where(['id' => $part])->first();
    }
    public function partFind($part)
    {
        return $this->partsModel->findorFail($part);
    }
    public function partHighest()
    {
        return $this->partsModel->orderBy('part_code', 'desc')->first();
    }
    public function partCreate($partData)
    {
        return $this->partsModel->create($partData);
    }

}
?>

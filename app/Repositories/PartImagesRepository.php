<?php

namespace App\Repositories;

use App\Models\ContactUsModel;
use App\Models\PartsImagesModel;

class PartImagesRepository{
    private $partImagesModel;

    public function __construct()
    {
        $this->partImagesModel = new PartsImagesModel();
    }
    public function ImagePart($part)
    {
       return $this->partImagesModel->where('part_id', $part->id)->first();
    }

    public function imagesOfPart($part)
    {
        return $this->partImagesModel->where(['part_id' => $part])->get();
    }

    public function imagesByPartID($partId)
    {
        return $this->partImagesModel->where('part_id', $partId)->first();
    }


}
?>

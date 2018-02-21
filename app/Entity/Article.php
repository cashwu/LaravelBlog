<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    protected $primaryKey = "id";

    public function Category()
    {
        return $this->hasOne("App\Entity\Category", "id", "category_id");
    }
}

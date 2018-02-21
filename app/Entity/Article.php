<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    protected $primaryKey = "id";

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $dates = [
        'created_at',
        'updated_at',
        'publish_date'
    ];

    public function Category()
    {
        return $this->hasOne("App\Entity\Category", "id", "category_id");
    }
}

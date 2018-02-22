<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    protected $primaryKey = "id";

    protected $dates = [
        'created_at',
        'updated_at',
        'publish_date'
    ];

    protected $fillable = [
        "id",
        "category_id",
        "subject",
        "summary",
        "content",
        "publish_date",
        "is_publish",
        "view_count"
    ];

    public function Category()
    {
        return $this->hasOne("App\Entity\Category", "id", "category_id");
    }
}

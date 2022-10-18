<?php

namespace app\modules\api\resources;

use app\models\Blog;

class BlogResource extends Blog 
{
  public function fields()
  {
    return ['id', 'title', 'body', 'created_by', 'created_at', 'updated_at'];
  }
}
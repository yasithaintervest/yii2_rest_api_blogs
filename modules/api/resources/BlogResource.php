<?php

namespace app\modules\api\resources;

use app\models\Blog;

class BlogResource extends Blog 
{
  public function fields()
  {
    
    $fields = parent::fields();

    // remove fields that contain sensitive information
    unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);

    return $fields;
  }
}
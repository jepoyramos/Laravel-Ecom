<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function delete()
    {
        Product::where("category", $this->id)->delete();//search in product table where category is equal to the givern id then delete

        return parent::delete(); //calling delete method
    }

    
}

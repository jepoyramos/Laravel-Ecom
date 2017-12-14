<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	/**
     * Get uploaded image file, save to directory, then create a standard name and return.
     *
     * @return string
     */
	//FILE UPLOADS
    public function thisUpload($uploaded, $name){

        $unique_code = strtotime(date('Ymd His')); //creates a timestamp string 
        $file_name = $name."_".$unique_code.'-img'.".".$uploaded->getClientOriginalExtension(); //creates a file name and insert it to a variable
        $uploaded->move('./uploads/',$file_name); //move the uploaded file to the given directory

        return $file_name;//returns the file name to be uploaded to the table
    }


}

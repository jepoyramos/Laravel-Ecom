<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\categoryValidation;
use Session;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $categories = Category::all();

        /*$arr = array('jep','chris', 'erson');
        $var1 = 'etits';
        $var2 = 'natawa si erson';

    
        $new_array = array('categories' => $arr,
                        'dick'  => $var1);
    

        echo '<pre>';
        print_r($new_array);
        echo '<pre>';

        echo 'blog posts: <br>';
        foreach($new_array['categories'] as $name) {
            echo $name.'<br>';
        }

        echo '<br>';
        echo 'Created By:'.$new_array['dick'];
        exit();
*/

        return view("categories.index",['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("categories.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryValidation $request)
    {
        /*dd($request->all());*/ //displays items inside request
        $categories = new Category; //set var categories as a new Category
        $categories->name = $request->name; //get the request value name insert to name column
        $requested_image = $request->file('image'); //get the request value of image input
        $cat_image = $this->thisUpload($requested_image, $request->name); //run thisUpload method passing the value of $requested_image 
        $categories->image = $cat_image; //get the value of $cat_image amd insert to image column
        $categories->save(); // save table changes
        Session::flash('flash_message', $categories->name.' category has been created');//sends a flash message to the redirected view
        return redirect('/categories'); //return to categories index
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = 0)
    {
        /*dd($id);*/
        if($id){
            $category = Category::findOrFail($id);
            return view("categories.form",['category' => $category]);//assign $category variable value to cat_name
        }else{
            return view("categories.form");
        }
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(categoryValidation $request, $id)
    {
        $category = Category::findOrFail($id); //find $id inside categories table
        $category->name = $request->name; //get the request value name insert to name column
        $requested_image = $request->file('image'); //get the request value of image input
        
        if ($requested_image) {
            $cat_image = $this->thisUpload($requested_image, $request->name); //run thisUpload method passing the value of $requested_image
            $category->image = $cat_image; //get the value of $cat_image amd insert to image column 
        }
        
        $category->save(); //save changes

        Session::flash('flash_message', $category->name.' has been updated');//sends a flash message to the redirected view
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //$category = Category::find($id);
       //$category->delete();
       //Session::flash('flash_message', $category->name.' has been deleted');//sends a flash message to the redirected view
       return redirect('/categories');
    }
}

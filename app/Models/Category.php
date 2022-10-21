<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QRGenerate;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'status'];

    public static function list($request)
    {
        $categories = new Category();
        return $categories;
    }


    public static function store_data($request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        return $category;
    }

    public static function update_data($request, $id)
    {
        $category = Category::find($id);
        $category = $category->update([
            'name' => $request->name
        ]);
    }
}
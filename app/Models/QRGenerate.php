<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class QRGenerate extends Model
{
    use HasFactory;
    protected $table = 'q_r_generates';
    protected $fillable = ['path', 'photo', 'qr_link', 'remark', 'c_by', 'category_id'];
}
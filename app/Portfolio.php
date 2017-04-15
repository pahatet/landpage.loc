<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';

    protected $fillable = ['name', 'text', 'images', 'modal_img', 'project_name', 'intro', 'filter'];
}

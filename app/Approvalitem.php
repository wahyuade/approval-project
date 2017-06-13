<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approvalitem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_approval', 'amount', 'keterangan', 'attachment', 'image', 'col_c', 'col_d', 'note', 'status',
    ];
}

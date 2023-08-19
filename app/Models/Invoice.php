<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['number', 'type'];

    protected $searchableFields = ['*'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}

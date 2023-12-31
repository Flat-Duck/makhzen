<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'code',
        'type',
        'color',
        'quantity',
        'description',
        'ex_date',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'ex_date' => 'date',
    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}

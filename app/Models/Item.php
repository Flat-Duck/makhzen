<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
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
    public static function expiring()
    {
        return Item::whereDate('ex_date', '<=', Carbon::now()->addMonth())->get();
    }
}

<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['number', 'office_id', 'user_id'];

    protected $searchableFields = ['*'];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}

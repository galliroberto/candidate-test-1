<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'cost', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'order_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'orders_tags')->wherePivot('deleted_at', null)->withTimestamps();
        //return $this->belongsToMany(Tag::class, 'orders_tags');
    }

    public function delete()
    {
        //$this->tags()->detach();
        $this->deleteReletedTags();
        $this->contract()->delete();

        return parent::delete();
    }

    private function deleteReletedTags(): void
    {
        $this->tags()->each(function ($tag) {
            $this->tags()->updateExistingPivot($tag->id, ['deleted_at' => Carbon::now()]);
        });
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function getFullNameAttribute(): string
    {
        return sprintf("%s %s",
            ucfirst(strtolower($this->first_name)),
            ucfirst(strtolower($this->last_name))
        );
    }

    public function delete()
    {
        $this->deleteReletadOrder();

        return parent::delete();
    }

    private function deleteReletadOrder(): void {
        $this->orders()->each(function($order) {
            $order->delete();
        });
    }
}

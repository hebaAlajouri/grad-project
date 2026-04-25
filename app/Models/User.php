<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function consultations()
    {
        return $this->hasMany(ConsultationRequest::class);
    }

    public function uploadedImages()
    {
        return $this->hasMany(GalleryImage::class, 'uploaded_by');
    }

    public function createdCoupons()
    {
        return $this->hasMany(Coupon::class, 'created_by');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;

    /**
     * اسم الجدول (اختياري)
     */
    protected $table = 'coupons';

    /**
     * Laravel timestamps disabled
     */
    public $timestamps = false;

    /**
     * الأعمدة القابلة للتعبئة
     */
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'min_order_amt',
        'usage_limit',
        'usage_count',
        'expiry_date',
        'is_active',
        'created_by'
    ];

    /**
     * Casting
     */
    protected $casts = [
        'discount_value' => 'float',
        'min_order_amt' => 'float',
        'is_active' => 'boolean',
        'expiry_date' => 'date',
    ];

    /**
     * العلاقة مع المستخدم (اللي أنشأ الكوبون)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * العلاقة مع الطلبات
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Scope: الكوبونات الفعالة فقط
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: غير منتهية
     */
    public function scopeNotExpired($query)
    {
        return $query->whereDate('expiry_date', '>=', now());
    }

    /**
     * التحقق إذا الكوبون صالح
     */
    public function isValid()
    {
        return $this->is_active
            && (!$this->expiry_date || $this->expiry_date >= now())
            && (!$this->usage_limit || $this->usage_count < $this->usage_limit);
    }

    /**
     * تطبيق الخصم على مبلغ
     */
    public function applyDiscount($amount)
    {
        if (!$this->isValid()) {
            return $amount;
        }

        if ($amount < $this->min_order_amt) {
            return $amount;
        }

        if ($this->discount_type === 'percentage') {
            $discount = ($amount * $this->discount_value) / 100;
        } else {
            $discount = $this->discount_value;
        }

        return max($amount - $discount, 0);
    }

    /**
     * زيادة عدد الاستخدام
     */
    public function incrementUsage()
    {
        $this->increment('usage_count');
    }
}
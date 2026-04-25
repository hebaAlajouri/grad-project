<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ConsultationRequest extends Model
{
    use HasFactory;

    /**
     * اسم الجدول (اختياري)
     */
    protected $table = 'consultation_requests';

    /**
     * الأعمدة القابلة للتعبئة
     */
    protected $fillable = [
        'user_id',
        'name',
        'contact_method',
        'contact_value',
        'request_details',
        'proposed_date',
        'status',
        'admin_notes'
    ];

    /**
     * Casting
     */
    protected $casts = [
        'proposed_date' => 'date',
    ];

    /**
     * القيم الافتراضية
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: الطلبات المعلقة
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope: الطلبات المقبولة
     */
    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    /**
     * Scope: الطلبات المرفوضة
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Scope: الطلبات المكتملة
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * التحقق إذا الموعد قادم
     */
    public function isUpcoming()
    {
        return $this->proposed_date && $this->proposed_date->isFuture();
    }

    /**
     * تغيير الحالة
     */
    public function markAs($status)
    {
        $this->update(['status' => $status]);
    }

    /**
     * Helper: قبول الطلب
     */
    public function accept()
    {
        $this->markAs('accepted');
    }

    /**
     * Helper: رفض الطلب
     */
    public function reject()
    {
        $this->markAs('rejected');
    }

    /**
     * Helper: إنهاء الطلب
     */
    public function complete()
    {
        $this->markAs('completed');
    }
}
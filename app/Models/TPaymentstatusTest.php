<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPaymentstatusTest extends Model
{
    use HasFactory;

    protected $fillable = ['res_result','res_tracking_id'];
}
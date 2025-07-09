<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    
    public function budgetPlans() {
        return $this->hasMany(BudgetPlan::class);
    }
    
    public function trends() {
        return $this->hasMany(Trend::class);
    }
    //
}

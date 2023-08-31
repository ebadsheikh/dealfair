<?php

namespace App\Services;

use App\Models\User;

class CustomerService
{
    public function getDatewiseCustomersCount(): array
    {
        return [
            'todayCount' => User::customer()->filterCustomerCreatedToday()->count(),
            'yesterdayCount' => User::customer()->filterCustomerCreatedYesterday()->count(),
            'thisMonthCount' => User::customer()->filterCustomerCreatedThisMonth()->count(),
            'thisYearCount' => User::customer()->filterCustomerCreatedThisYear()->count(),
        ];
    }
}

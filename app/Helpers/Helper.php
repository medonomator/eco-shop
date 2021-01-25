<?php 

namespace App\Helpers;

class Helper
{
    
    /**
     * Get the status Order
     *
     * @params string
     * @return string
     */
    public static function getStatus(string $status): string
    {
        if($status ===  '0') {
            return __('common.awaiting-payment');
        }
        if($status ===  '1') {
            return __('common.accepted-execution');
        }
        if($status ===  '2') {
            return __('common.sent');
        }
        if($status ===  '3') {
            return __('common.completed');
        }
    }
}
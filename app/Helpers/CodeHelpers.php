<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\Demande;

class CodeHelpers
{
    public static function generateOTP()
    {
        $year = Carbon::now()->format('y');
        $lastOTP = Demande::latest()->first();

        if ($lastOTP) {
            $lastSequence = intval(substr($lastOTP->code, -4));
            $sequence = str_pad($lastSequence + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $sequence = '0001';
        }
        $otp = 'DA' . $year . '-' . $sequence;

        return $otp;
    }
}

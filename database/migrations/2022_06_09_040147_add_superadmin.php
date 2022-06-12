<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $firstUser = User::find(1);
        $firstUser->role = 'superadmin';
        $firstUser->save();
    }
};

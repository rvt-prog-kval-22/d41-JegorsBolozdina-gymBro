<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('categories')->insert(
        array(
            [
                'name' => 'Upper body',
            ],
            [
                'name' => 'Lower body',
            ],
            [
                'name' => 'Other',
            ],
        ));
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubcountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcounties', function (Blueprint $table) {
            $table->id();
            $table->int("county");
            $table->string("name");
            $table->timestamps();
        });

        $sub_counties = [
            [
                'county' => '30',
                "name" => "Baringo central"
            ],
            [
                'county' => '30',
                "name" => "Baringo north"
            ],
            [
                'county' => '30',
                "name" => "Baringo south"
            ],
            [
                'county' => '30',
                "name" => "Eldama ravine"
            ],
            [
                'county' => '30',
                "name" => "Mogotio"
            ],
            [
                'county' => '30',
                "name" => "Tiaty"
            ],
            [
                'county' => '39',
                "name" => "Bumula"
            ],
            [
                'county' => '39',
                "name" =>                "Kabuchai"
            ], [
                'county' => '39', "name" =>
                "Kanduyi"
            ], [
                'county' => '39', "name" =>
                "Kimilil"
            ], [
                'county' => '39', "name" =>
                "Mt Elgon"
            ], [
                'county' => '39', "name" =>
                "Sirisia"
            ], [
                'county' => '39', "name" =>
                "Tongaren"
            ], [
                'county' => '39', "name" =>
                "Webuye east"
            ], [
                'county' => '39', "name" =>
                "Webuye west"
            ]
        ];

        DB::table('subcounties')->insert($sub_counties);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcounties');
    }
}

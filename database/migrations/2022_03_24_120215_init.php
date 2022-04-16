<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->string('color');
            $table->integer('capacity');
            $table->boolean('air_condition');
            $table->foreignId('company_id')->index();
            $table->timestamps();
        });
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->foreignId('user_id')->index();
            $table->timestamps();
        });
        Schema::create('shuttles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->index();
            $table->foreignId('departure_city_id')->index();
            $table->foreignId('arrival_city_id')->index();
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->float('price');
            $table->integer('passenger_count');
            $table->timestamps();
        });
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passenger_id')->index();
            $table->foreignId('shuttle_id')->index();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->after('remember_token')->default('passenger');
        });

        // Create somme data :
        DB::table('companies')->insert([
            ['name' => 'Supratours'],
            ['name' => 'CTM'],
            ['name' => 'Trans Ghazala'],
            ['name' => 'STCR'],
            ['name' => 'Transport Alyamama'],
            ['name' => 'Saad voyage'],
            ['name' => 'Trans OBAL'],
            ['name' => 'IMA SAAD'],
            ['name' => 'Diana Viajes'],
            ['name' => 'Asfar nasser souss'],
            ['name' => 'Trans EVEREST'],
            ['name' => 'SATG'],
            ['name' => 'Asfar Al Maghrib'],
            ['name' => 'Arrissala'],
            ['name' => 'Voyageur'],
            ['name' => 'Jaouharat Rabat'],
            ['name' => 'Sahara voyage'],
            ['name' => 'Bab Salama'],
            ['name' => 'Mega Tours'],
            ['name' => 'Pullman du sud'],
            ['name' => 'SATAS'],
            ['name' => 'STB Tours'],
            ['name' => 'Farah Lnad'],
            ['name' => 'Majorel voyage'],
            ['name' => 'Trans Nadim'],
            ['name' => 'Mega TOURS'],
            ['name' => 'Tarik Essalam'],
        ]);
        DB::table('cities')->insert([
            ['name' => 'Casablanca'],
            ['name' => 'Fès'],
            ['name' => 'Meknès'],
            ['name' => 'Marrakech'],
            ['name' => 'Salé'],
            ['name' => 'Oujda'],
            ['name' => 'Rabat'],
            ['name' => 'Agadir'],
            ['name' => 'Khénifra'],
            ['name' => 'Kénitra'],
            ['name' => 'Tétouan'],
            ['name' => 'Tanger'],
            ['name' => 'Jerada'],
            ['name' => 'Laâyoune'],
            ['name' => 'Nador'],
            ['name' => 'Khouribga'],
            ['name' => 'Beni Mellal'],
            ['name' => 'El Jadida'],
            ['name' => 'Taza'],
            ['name' => 'Mohammédia'],
            ['name' => 'Settat'],
            ['name' => 'Inezgane'],
            ['name' => 'Khémisset'],
            ['name' => 'Ksar el-Kébir'],
            ['name' => 'Larache'],
            ['name' => 'Guelmim'],
            ['name' => 'Berkane'],
            ['name' => 'Fquih Ben Salah'],
            ['name' => 'Sidi Slimane'],
            ['name' => 'Errachidia'],
        ]);
        DB::table('vehicles')->insert([
            ['model_name' => 'MERCEDES Tourismo RHD #1', 'color' => 'Gris', 'capacity' => 51, 'air_condition' => true, 'company_id' => 1],
            ['model_name' => 'MERCEDES Tourismo RHD #2', 'color' => 'Gris', 'capacity' => 51, 'air_condition' => true, 'company_id' => 1],
            ['model_name' => 'VOLVO B12B #1', 'color' => 'Gris', 'capacity' => 50, 'air_condition' => true, 'company_id' => 2],
            ['model_name' => 'VOLVO B12B #2', 'color' => 'Gris', 'capacity' => 50, 'air_condition' => false, 'company_id' => 2]
        ]);
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin'), 'role' => 'admin']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
        Schema::dropIfExists('shuttles');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('passengers');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('companies');
    }
}

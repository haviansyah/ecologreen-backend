<?php

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('cascade');
            $table->enum('gender',['male','female'])->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birthday')->nullable();
            $table->text('address')->nullable();
            $table->foreignIdFor(File::class,'picture_file_id')->nullable()->references('id')->on('files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

<?php

use App\Models\File;
use App\Models\TreeCatalog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeCatalogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_catalog_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TreeCatalog::class)->references('id')->on('tree_catalogs')->onDelete('cascade');
            $table->foreignIdFor(File::class)->references('id')->on('files')->onDelete('cascade');
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
        Schema::dropIfExists('tree_catalog_images');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('image');
            $table->string('date_de_publication');
            $table->string('nombre_de_pages');
            $table->string('auteur');
            $table->string('isbn')->unique();
            $table->string('editeur');
            $table->timestamps();
            //
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            //
            $table->unsignedBigInteger('rayon_id');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la contrainte de clé étrangère 'livres_categorie_id_foreign' avant de supprimer la colonne 'personnel_id'
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign('livres_categorie_id_foreign');
            $table->dropColumn('categorie_id');
        });

        // Supprime la contrainte de clé étrangère 'livres_rayon_id_foreign' avant de supprimer la colonne 'personnel_id'
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign('livres_rayon_id_foreign');
            $table->dropColumn('rayon_id');
        }); 

        Schema::dropIfExists('livres');
    }
};

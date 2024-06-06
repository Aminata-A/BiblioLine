<?php

// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Rayon;
use App\Models\Livre;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer quelques catégories
        $categorie1 = Categorie::create(['libelle' => 'Catégorie 1', 'description' => 'Description 1']);
        $categorie2 = Categorie::create(['libelle' => 'Catégorie 2', 'description' => 'Description 2']);
        
        // Créer quelques rayons
        $rayon1 = Rayon::create(['libelle' => 'Rayon 1', 'partie' => 'Partie 1']);
        $rayon2 = Rayon::create(['libelle' => 'Rayon 2', 'partie' => 'Partie 2']);
        
        // Créer quelques livres
        Livre::create([
            'titre' => 'Livre 1',
            'image' => 'image1.jpg',
            'date_de_publication' => '2023-01-01',
            'nombre_de_pages' => '100',
            'auteur' => 'Auteur 1',
            'isbn' => '1234567890',
            'editeur' => 'Editeur 1',
            'categorie_id' => $categorie1->id,
            'rayon_id' => $rayon1->id,
        ]);

        Livre::create([
            'titre' => 'Livre 2',
            'image' => 'image2.jpg',
            'date_de_publication' => '2023-02-01',
            'nombre_de_pages' => '200',
            'auteur' => 'Auteur 2',
            'isbn' => '0987654321',
            'editeur' => 'Editeur 2',
            'categorie_id' => $categorie2->id,
            'rayon_id' => $rayon2->id,
        ]);
    }
}

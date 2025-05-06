<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'abbigliamento',
        'motori',
        'sport',
        'informatica e gaming',
        'animali domestici',
        'libri e riviste',
        'accessori',
        'salute e bellezza',
        'casa e giardinaggio'
    ];

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'is_revisor' => true,
            'is_translator' => true,
        ]);

        User::factory()->create([
            'name' => 'Revisor',
            'email' => 'revisor@email.com',
            'password' => Hash::make('password'),
            'is_revisor' => true,
        ]);

        User::factory()->create([
            'name' => 'Translator',
            'email' => 'translator@email.com',
            'password' => Hash::make('password'),
            'is_translator' => true,
        ]);
        
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        $langaues = [
            ['name' => 'Italiano', 'code' => 'it'],
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'Français', 'code' => 'fr'],
        ];

        foreach($langaues as $langaue) {
            Language::create([
                'name' => $langaue['name'],
                'code' => $langaue['code']
            ]);
        }

        $values = [
            'is_accepted' => true,
            'is_pending' => NULL,
        ];

        $articles = [
            ['title' => 'Divano in tessuto grigio 3 posti - Ottime condizioni', 'description' => 'Comodo divano in tessuto grigio chiaro, 3 posti, acquistato nel 2021. Nessuna macchia o segno di usura. Vendo per cambio arredamento. Misure: 220x95 cm. Ritiro a carico dell\'acquirente.'],
            ['title' => 'iPhone 13 128GB Midnight - Perfettamente funzionante', 'description' => 'iPhone 13 colore Midnight, memoria da 128GB, sempre usato con cover e vetro temperato. Batteria al 92%. Incluso cavo originale e scatola. Vendo per passaggio a modello successivo.'],
            ['title' => 'Scrivania da studio IKEA bianca - come nuova', 'description' => 'Scrivania modello LINNMON/ADILS, colore bianco, 120x60 cm. Usata pochissimo, nessun graffio. Ideale per smart working o camera studenti. Ritiro a mano zona centro.'],
            ['title' => 'Bici da città uomo - 28", cambio Shimano 6 velocità', 'description' => 'Vendesi bici da passeggio in buono stato, gomme nuove, freni regolati, sella comoda. Cambio Shimano 6 velocità, telaio leggero. Ideale per uso quotidiano.'],
            ['title' => 'Giacca in pelle nera uomo - taglia L', 'description' => 'Giacca vera pelle, marca Zara Man, taglia L. Stile biker, chiusura zip, fodera interna. Ottimo stato, indossata poche volte. Prezzo trattabile.'],
            ['title' => 'Seggiolone pappa Chicco Polly - reclinabile e regolabile', 'description' => 'Seggiolone Chicco Polly 2 in 1, colore grigio e arancio. Reclinabile, altezza regolabile, facilmente richiudibile. Usato ma in ottime condizioni. Facile da pulire.'],
            ['title' => 'Set LEGO Star Wars - X-Wing Fighter completo', 'description' => 'Set LEGO originale X-Wing Fighter (codice 75218), completo di tutti i pezzi e istruzioni. Senza scatola. Ideale per collezionisti o appassionati.'],
            ['title' => 'Macchina del caffè De\'Longhi Nespresso - funzionante', 'description' => 'Macchina a capsule Nespresso De’Longhi, compatta e veloce. Colore nero, funzionamento perfetto. Inclusi 10 capsule miste in omaggio.'],
            ['title' => 'Tavolino da salotto in vetro e metallo', 'description' => 'Tavolino con piano in vetro temperato e struttura in metallo nero. Design moderno, stabile e facile da pulire. Misure: 90x50 cm, altezza 40 cm.'],
            ['title' => 'Monitor PC Samsung 24" Full HD - perfetto per studio o gaming', 'description' => 'Monitor Samsung da 24", risoluzione Full HD, ingresso HDMI e VGA. Usato solo per lavoro da casa. Colori brillanti e nessun pixel bruciato.']
        ];

        foreach($articles as $article) {
            $createdArticle = Article::create([
                'title' => $article['title'],
                'description' => $article['description'],
                'price' => rand(10, 1000),
                'category_id' => rand(1, 10),
                'user_id' => 1,
                'is_accepted' => $values[array_rand($values)],
            ]);
        }

        $articles = [
            ['title' => '3-Seater Grey Fabric Sofa - Great Condition', 'description' => 'Comfortable grey fabric sofa, 3 seats, purchased in 2021. No stains or signs of wear. Selling due to home redecorating. Dimensions: 220x95 cm. Pickup required.'],
            ['title' => 'iPhone 13 128GB Midnight - Fully Functional', 'description' => 'Midnight iPhone 13 with 128GB storage, always used with cover and screen protector. Battery health at 92%. Includes original cable and box. Selling to upgrade.'],
            ['title' => 'IKEA White Study Desk - Like New', 'description' => 'LINNMON/ADILS model white desk from IKEA, 120x60 cm. Barely used, no scratches. Ideal for remote work or student room. Local pickup in city center.'],
            ['title' => 'Men’s City Bike - 28", Shimano 6-Speed', 'description' => 'City bicycle in good condition, new tires, tuned brakes, comfortable saddle. Shimano 6-speed gear system, lightweight frame. Perfect for everyday use.'],
            ['title' => 'Men’s Black Leather Jacket - Size L', 'description' => 'Genuine leather jacket by Zara Man, size L. Biker style with zip closure and lined interior. Excellent condition, worn only a few times. Price negotiable.']
        ];

        foreach($articles as $article) {
            Article::create([
                'title' => $article['title'],
                'description' => $article['description'],
                'price' => rand(10, 1000),
                'language_code' => 'en',
                'category_id' => rand(1, 10),
                'user_id' => 1,
                'is_accepted' => $values[array_rand($values)],
            ]);
        }

        $articles = [
            ['title' => 'Chaise haute Chicco Polly - inclinable et réglable', 'description' => 'Chaise haute Chicco Polly 2 en 1, couleur gris et orange. Inclinable, réglable en hauteur, pliable facilement. En très bon état. Facile à nettoyer.'],
            ['title' => 'Set LEGO Star Wars - X-Wing Fighter complet', 'description' => 'Set LEGO original X-Wing Fighter (référence 75218), avec toutes les pièces et le livret d’instructions. Sans boîte. Idéal pour collectionneurs ou passionnés.'],
            ['title' => 'Machine à café Nespresso De’Longhi - en parfait état', 'description' => 'Machine à capsules Nespresso De’Longhi, compacte et rapide. Couleur noire, fonctionne parfaitement. Offert avec 10 capsules variées.'],
            ['title' => 'Table basse en verre et métal', 'description' => 'Table basse avec plateau en verre trempé et structure en métal noir. Design moderne, stable et facile à nettoyer. Dimensions : 90x50 cm, hauteur 40 cm.'],
            ['title' => 'Écran PC Samsung 24" Full HD - idéal pour bureau ou jeux', 'description' => 'Écran Samsung 24", résolution Full HD, entrées HDMI et VGA. Utilisé uniquement pour le télétravail. Couleurs vives, aucun pixel mort.']
        ];

        foreach($articles as $article) {
            Article::create([
                'title' => $article['title'],
                'description' => $article['description'],
                'price' => rand(10, 1000),
                'language_code' => 'fr',
                'category_id' => rand(1, 10),
                'user_id' => 1,
                'is_accepted' => $values[array_rand($values)],
            ]);
        }
    }
}

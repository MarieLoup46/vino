<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use App\Models\Cellier;
use App\Models\CellierBouteille;
use App\Models\DetailsBouteille;
use App\Models\Type;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Auth;


class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Fonction qui permet de afficher les bouteilles a partir de la base de donnes
    public function index(Request $request)
    {
        $recherche_text = $request->input("recherche");
        //Si l'utilisateur clic sur le boutton du recherche
        $bouteilles = (empty($recherche_text)) ? Bouteille::orderBy('id','asc')->paginate(24) :
        /* Si l'utilisateur faire le recherche */
        Bouteille::where('nom', 'like', '%' . $recherche_text . '%')->orderBy('id','asc')->paginate(24);

        $types = Type::all();
        foreach($bouteilles as $bouteille){
            $type_id = $bouteille->type_id;
            $bouteille->type_id = $types->find($type_id)->type;
        }
        return view('bouteille.index',[
            'bouteilles' => $bouteilles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function show(Bouteille $bouteille)
    {
        $infoBouteille = DetailsBouteille::where("code_saq", $bouteille->code_saq)->first();
        return view('bouteille.show', ['bouteille' => $bouteille, 'infoBouteille' => $infoBouteille]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function edit(Bouteille $bouteille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bouteille $bouteille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bouteille  $bouteille
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bouteille $bouteille)
    {
        //
    }

    //affichier la page d'admin d'ajout des bouteilles
    public function AdminAjoutBouteilles(){
        return view('bouteille.formAjoutBouteilles');
    }


    //importer les input du formulaire pour l'ajouter comme des paramétres dans getBouteilles
    public function AjoutBouteilles(Request $request){
        self::getBouteilles($request->input("page"),$request->input("nombre"));
        return redirect(route('FormAjoutBouteilles'))->withSuccess("nouveaux bouteilles sont ajoutées");
    }

    //importer les bouteilles à partir de l'api du SAQ
    public function getBouteilles($nbePages, $bouteilleParPage){
        //une classe prédéfinie dans la librerie GuzzleHttp
        //verify: pour la vérification de la certificat SSL du serveur qui a déja connecté
        //lien de la certificat: https://curl.se/docs/caextract.html
        $client = new Client([
            'verify' => storage_path('cacert-2023-08-22.pem'),
        ]);
        $nombre_bouteilles = Bouteille::count();
        $nombre_pages = intval($nombre_bouteilles / $bouteilleParPage);
        for($page = $nombre_pages + 1; $page <= $nombre_pages + $nbePages; $page++){
            //web scraping: recevoir les données de l'api saq
            $request = $client->get("https://www.saq.com/fr/produits/vin?p=".$page."&product_list_limit=". $bouteilleParPage ."&product_list_order=name_asc");
            //body de la réponse
            $response = $request->getBody();
            //Crawler est une bibliothèque qui facilite l'analyse et la manipulation de documents HTML.
            $crawler = new Crawler($response);
            $produits = $crawler->filter('li.product-item');
            $produits->each(function(Crawler $produit) {
                //code
                $code = $produit->filter('.saq-code span:last-child')->text();
                $produit_existe = Bouteille::where("code_saq",$code)->exists();
                if($produit_existe) return;
                //nom
                $nom = $produit->filter('.product.name.product-item-name')->text();
                //code
                $code = $produit->filter('.saq-code span:last-child')->text();
                //lien du saq
                $lienProduit = $produit->filter('a.product.photo.product-item-photo')->attr("href");
                //image
                $srcImage = $produit->filter('img.product-image-photo')->attr("src");
                //type, format, pays
                $identite = $produit->filter(".product.product-item-identity-format span")->text();
                $type = explode("|", $identite)[0];
                $type = trim($type);
                if($type == "Vin blanc")
                    $type = 1;
                elseif ($type == "Vin rouge")
                    $type = 2;
                else $type = 3;


                $format = explode("|", $identite)[1];
                $pays = explode("|", $identite)[2];
                //millisme
                $millisime = $produit->filter('.product-item-link')->text();
                $millisime = substr($millisime, strrpos($millisime," ") + 1);
                //prix
                $prix = $produit->filter('.price')->text();
                //ajouter des nouveaux boutteilles a la base de données
                $bouteille = new Bouteille;
                $bouteille->nom = $nom;
                $bouteille->code_saq = $code;
                $bouteille->description = " ";
                $bouteille->pays = $pays;
                $bouteille->millesime = (int) $millisime;
                $bouteille->prix_saq =(int) $prix;
                $bouteille->url_saq = $lienProduit;
                $bouteille->url_img = $srcImage;
                $bouteille->format = $format;
                $bouteille->type_id = $type;
                $bouteille->save();
            });
        }
    }


    //affichage du formulaire d'ajout du bouteille dans un cellier
    public function formBouteillesAuCeiller(Request $request){
        $bouteille_id = $request->input('bouteille_id');
        $cellier_id = $request->input('cellier_id');
        $celliers = Cellier::where('user_id',Auth::user()->id)->get();
        $bouteille = Bouteille::find($bouteille_id);

        return view('bouteille.ajouterBouteilleAuCellier',[
            'bouteille' => $bouteille,
            'celliers' => $celliers,
            'cellierId' => $cellier_id
        ]);
    }

    //Ajouter bouteilles dans un cellier
    public function ajouterBouteillesAuxCeiller(Request $request){
        $cellierBouteille = new CellierBouteille;
        $cellierBouteille->cellier_id = $request->input('cellier');
        $cellierBouteille->bouteille_id = $request->input('bouteille');
        $cellierBouteille->quantite = $request->input('quantite');
        $cellierBouteille->save();
        if($request->input('from_recherche'))
            return redirect(route('bouteille.recherche'))->withSuccess("Bouteilles sont ajoutées au cellier");
        else 
            return redirect(route('cellier.index'));

    }

    public function addInfoBouteilles()
    {
        set_time_limit(300);
        $bouteilles = Bouteille::orderBy('id', 'asc')->get();

        $client = new Client([
            'verify' => storage_path('cacert-2023-08-22.pem'),
        ]);

        foreach($bouteilles as $bouteille) {
            $code_saq = $bouteille->code_saq;
            $bouteilleId = $bouteille->id;
            $infoBouteilles = $client->get("https://www.saq.com/fr/" . $code_saq);
            $response = $infoBouteilles->getBody();
            $crawler = new Crawler($response);

            // Recuperer info boutelles
            if($crawler->filter('.wrapper-content-info p')->count() > 0) {
                $infosDetaillees = $crawler->filter('.wrapper-content-info p')->first()->text();
            } else {
                $infosDetaillees = 'n/a';
            }

            if($crawler->filter('strong[data-th="Pays"]')->count() > 0) {
                $pays = $crawler->filter('strong[data-th="Pays"]')->first()->text();
            } else {
                $pays = 'n/a';
            }

            if($crawler->filter('strong[data-th="Région"]')->count() > 0) {
                $region = $crawler->filter('strong[data-th="Région"]')->first()->text();
            } else {
                $region = 'n/a';
            }

            if($crawler->filter('strong[data-th="Désignation réglementée"]')->count() > 0) {
                $designationReglementee = $crawler->filter('strong[data-th="Désignation réglementée"]')->first()->text();
            } else {
                $designationReglementee = 'n/a';
            }

            if($crawler->filter('strong[data-th="Cépage"]')->count() > 0) {
                $cepages = $crawler->filter('strong[data-th="Cépage"]')->first()->text();
            } else {
                $cepages = 'n/a';
            }

            if($crawler->filter('strong[data-th="Degré d\'alcool"]')->count() > 0) {
                $degreAlcool = $crawler->filter('strong[data-th="Degré d\'alcool"]')->first()->text();
            } else {
                $degreAlcool = 'n/a';
            }

            if($crawler->filter('strong[data-th="Taux de sucre"]')->count() > 0) {
                $tauxSucre = $crawler->filter('strong[data-th="Taux de sucre"]')->first()->text();
            } else {
                $tauxSucre = 'n/a';
            }

            if($crawler->filter('strong[data-th="Couleur"]')->count() > 0) {
                $couleur = $crawler->filter('strong[data-th="Couleur"]')->first()->text();
            } else {
                $couleur = 'n/a';
            }

            if($crawler->filter('strong[data-th="Particularité"]')->count() > 0) {
                $particularite = $crawler->filter('strong[data-th="Particularité"]')->first()->text();
            } else {
                $particularite = 'n/a';
            }

            if($crawler->filter('strong[data-th="Format"]')->count() > 0) {
                $format = $crawler->filter('strong[data-th="Format"]')->first()->text();
            } else {
                $format = 'n/a';
            }

            if($crawler->filter('strong[data-th="Producteur"]')->count() > 0) {
                $producteur = $crawler->filter('strong[data-th="Producteur"]')->first()->text();
            } else {
                $producteur = 'n/a';
            }

            if($crawler->filter('strong[data-th="Agent promotionnel"]')->count() > 0) {
                $agentPromotionnel = $crawler->filter('strong[data-th="Agent promotionnel"]')->first()->text();
            } else {
                $agentPromotionnel = 'n/a';
            }

            $existingRecord = DetailsBouteille::where('code_saq', $code_saq)->first();

            if (!$existingRecord) {
                $infoBouteille = new DetailsBouteille();
                $infoBouteille->infos_detaillees = $infosDetaillees;
                $infoBouteille->pays = $pays;
                $infoBouteille->region = $region;
                $infoBouteille->designation_reglementee = $designationReglementee;
                $infoBouteille->cepages = $cepages;
                $infoBouteille->degre_alcool = $degreAlcool;
                $infoBouteille->taux_sucre = $tauxSucre;
                $infoBouteille->couleur = $couleur;
                $infoBouteille->particularite = $particularite;
                $infoBouteille->format = $format;
                $infoBouteille->producteur = $producteur;
                $infoBouteille->agent_promotionnel = $agentPromotionnel;
                $infoBouteille->code_saq = $code_saq;
                $infoBouteille->bouteille_id = $bouteilleId;
                $infoBouteille->save();
            }
            return redirect(route('accueil'))->withSuccess("Details des bouteilles ajoutées avec succes");
        }
    }
}

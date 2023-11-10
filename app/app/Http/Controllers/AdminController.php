<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Bouteille;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    //ajouter la view
    public function FormAjoutBouteilles(){
        return view('admin.formAjoutBouteilles');
    }
    //importer les input du formulaire pour l'ajouter comme des paramétres dans getBouteilles
    public function AjoutBouteilles(Request $request){
        self::getBouteilles($request->input("page"),$request->input("nombre"));
        return redirect(route('FormAjoutBouteilles'))->withSuccess("nouveaux bouteilles sont ajoutées");
    }

    //importer les bouteilles à partir de l'api du SAQ
    public function getBouteilles($nbePages = 10, $bouteilleParPage = 24){
        //une classe prédéfinie dans la librerie GuzzleHttp
        //verify: pour la vérification de la certificat SSL du serveur qui a déja connecté
        //lien de la certificat: https://curl.se/docs/caextract.html
        $client = new Client([
            'verify' => storage_path('cacert-2023-08-22.pem'),
        ]);
        for($page = 1; $page <= $nbePages; $page++){
            //web scraping: recevoir les données de l'api saq
            $request = $client->get("https://www.saq.com/fr/produits/vin/vin-rouge?p=".$page."&product_list_limit=". $bouteilleParPage ."&product_list_order=name_asc");
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    

    public function getProduits($page){
        //une classe prédéfinie dans la librerie GuzzleHttp
        //verify: pour la vérification de la certificat SSL du serveur qui a déja connecté
        //lien de la certificat: https://curl.se/docs/caextract.html
        $client = new Client([
            'verify' => storage_path('cacert-2023-08-22.pem'),
        ]);
        //web scraping: recevoir les données de l'api saq
        $request = $client->get("https://www.saq.com/fr/produits/vin/vin-rouge?p=".$page."&product_list_limit=24&product_list_order=name_asc");
        //body de la réponse
        $response = $request->getBody();
        //Crawler est une bibliothèque qui facilite l'analyse et la manipulation de documents HTML.
        $crawler = new Crawler($response);
        $produits = $crawler->filter('li.product-item');
        $produits->each(function(Crawler $produit) {
            echo $produit->html();
        });
        echo "<ul>";
        echo "<li><a href='". route("listeProduits", 1) . "'>1</a></li>";
        echo "<li><a href='". route("listeProduits", 2) . "'>2</a></li>";
        echo "<li><a href='". route("listeProduits", 3) . "'>3</a></li>";
        echo "<li><a href='". route("listeProduits", 4) . "'>4</a></li>";
        echo "<li><a href='". route("listeProduits", 5) . "'>5</a></li>";
        echo "</ul>";
    }
    
}

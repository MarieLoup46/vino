<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{
    public static function randomIcon()
    {
        $list = [
            'cellierbrun.png',
            'cellierjaune.png',
            'cellierjaunefonce.png',
            'cellierrose.png',
            'cellierrouge.png',
        ];

        return $list[rand(0, count($list) - 1)];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listBouteilles($cellierId)
    {
        $cellier = Cellier::find($cellierId);

        if (!$cellier) {
            // Si Cellier n'est pas trouvé, redirigez avec un message d'erreur
            return back()->with('error', 'Cellier non trouvé');
        }

        // Charger les bouteilles liées au cellier incluant la quantité du tableau croisé dynamique
        $bouteilles = $cellier->bouteilles()->withPivot('quantite')->get();

        $bouteilles = $cellier->bouteilles()->orderBy('id', 'desc')->paginate(10);

        return view('cellier.select', ['cellier' => $cellier, 'bouteilles' => $bouteilles]);
    }


    public function ajouterBouteilles(Request $request, $cellierId)
    {
        $recherche_text = $request->input("recherche");
        //Si l'utilisateur clic sur le boutton du recherche
        $bouteilles = (empty($recherche_text)) ? Bouteille::orderBy('id', 'asc')->paginate(24) :
            /* Si l'utilisateur faire le recherche */
            Bouteille::where('nom', 'like', '%' . $recherche_text . '%')->orderBy('id', 'asc')->paginate(24);

        $types = Type::all();
        foreach ($bouteilles as $bouteille) {
            $type_id = $bouteille->type_id;
            $bouteille->type_id = $types->find($type_id)->type;
        }
        return view('bouteille.index', [
            'bouteilles' => $bouteilles,
            'cellierId' => $cellierId
        ]);
    }


    /*public function listBouteilles($cellierId)
    {
        $cellier = Cellier::find($cellierId);

        if (!$cellier) {
            // Se o Cellier não for encontrado, redirecionar com uma mensagem de erro
            return back()->with('error', 'Cellier non trouvé');
        }

        // Modifique esta linha para usar uma query em vez de uma coleção
        $bouteilles = $cellier->bouteilles()->orderBy('id', 'desc')->paginate(10);

        return view('cellier.select', ['cellier' => $cellier, 'bouteilles' => $bouteilles]);
    }*/


    public function index()
    {
        // Récupérer des éléments avec la logique existante
        $items = Cellier::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);

        // Ajoute une icône aléatoire à chaque élément
        foreach ($items as $item) {
            $item->random_icon = self::randomIcon();
        }

        // Renvoie la vue avec les données nécessaires (en conservant la logique précédente)
        return view('cellier.index', compact('items'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cellier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['icon'] = self::randomIcon();
        //print_r($validatedData);die();
        Cellier::create($validatedData);
        return redirect()->route('cellier.index')->with('success', 'Cellier créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function show(Cellier $cellier)
    {
        return view('cellier.show', compact('cellier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellier $cellier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellier $cellier)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $cellier->update($validatedData);
        return redirect()->route('cellier.bouteilles.list', ['cellierId' => $cellier->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellier $cellier)
{
    // Delete the Cellier, and related `bouteille_cellier` records will be cascaded deleted
    $cellier->delete();

    return redirect()->route('cellier.index')->with('success', 'Cellier supprimé avec succès!');
}
    public function actualiserQuantite(Request $request)
    {
        $cellierId = $request->cellier_id; // ID du Cellier
        $bouteilleId = $request->bouteille_id; // ID de la Bouteille
        $nouvelleQuantite = $request->quantite; // Nouvelle quantité

        // Vérifier si Cellier et Bouteille existent
        $cellier = Cellier::find($cellierId);
        $bouteille = Bouteille::find($bouteilleId);

        if (!$cellier || !$bouteille) {
            return response()->json(['message' => 'Cellier ou Bouteille non trouvé'], 404);
        }

        // Mettre à jour la quantité dans le tableau intermédiaire
        $cellier->bouteilles()->updateExistingPivot($bouteilleId, ['quantite' => $nouvelleQuantite]);

        return response()->json(['message' => 'Quantité mise à jour avec succès !']);
    }

}

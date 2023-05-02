<?php
namespace App\Http\Controllers;
use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function SearchArticle(Request $request)
    {
        $abarticles = new AbArticle();
        if ($request->search) {
            $abarticle = $abarticles->searchByName($request->search);
            //$abarticle = DB::table('ab_article')->select('*')->where('ab_name', 'ILIKE', '%' . $request->search . '%')->get();
        } else {
            $abarticle = $abarticles->get();
            // $abarticle =  DB::table('ab_article')->get();
        }
        return view('view', ['abarticle' => $abarticle]);
    }
    public function store(Request $request): string
    {
        $request->validate([
            'ab_name' => 'required|max:80',
            'ab_description' => 'required|max:1000',
            'ab_price' => 'required|integer|min:1',
        ]);

        $article = new AbArticle($request->all());
        $article->ab_creator_id = 1;

        $idmax = DB::table('ab_article')->max('id');
        $article->id = $idmax + 1;
        $article->save();

        return 'Der Artikel wurde erfolgreich gespeichert';
    }
}

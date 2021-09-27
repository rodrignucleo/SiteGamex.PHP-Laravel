<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\Plataforma;
use App\Models\User;


class GameController extends Controller
{
    public function index(){
        $games = Game::all();
        
        return view('layouts.welcome', ['games' => $games]);
    }

    //PLATAFORMAS

    public function createPlat(){
        return view('games.createPlataforma');
    }
    public function storePlat(Request $request){
        $plataformas = new Plataforma;
        
        $plataformas->nomePlat = $request->nomePlat;

        $plataformas->save();

        return view('games.createPlataforma');
    }

    public function destroyPlat($id){
        $plataformas = Plataforma::findOrFail($id)->delete();
        return redirect('/dashboardPlataforma');
    }

    public function editPlat($id){
        $plataformas = Plataforma::findOrfail($id);
        return view('games.editPlataforma', ['plataformas' => $plataformas]);
    }

    public function updatePlat(Request $request){
        $data = $request->all();
        Plataforma::findOrFail($request->id)->update($data);
        return redirect('/dashboardPlataforma');
    }

    //GAMES

    public function createGame(){
        $plataformas = Plataforma::all();
        return view('games.createGame', ['plataformas' => $plataformas]);
    }
    public function storeGame(Request $request){
        $search = request('search');
        $games = new Game;

        $games->nome = $request->nome;
        $games->classificacaoInd = $request->classificacaoInd;
        $games->descricao = $request->descricao;
        $games->plataforma = $request->plataforma;
        $games->especificacaoMinimo = $request->especificacaoMinimo;
        $games->especificacaoRecomen = $request->especificacaoRecomen;

        //upload de imagem

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")). "." . $extension;

            $request->image->move(public_path('img/games'), $imageName);
            $games->image = $imageName;
        }

        $user = auth()->user();
        $games->user_id = $user->id;

        $games->save();

        $games = Game::all();
        return view('games.listagames', ['games' => $games, 'search' => $search]);
    }

    public function show($id){
        $games = Game::findOrfail($id);

        $gameOwner = User::where('id', $games->user_id)->first()->toArray();

        return view('games.show', ['games' => $games, 'gameOwner' => $gameOwner]);
    }

    public function destroyGame($id){
        $games = Game::findOrFail($id)->delete();
        return redirect('/dashboard');
    }

    public function editGame($id){
        $games = Game::findOrfail($id);
        $plataformas = Plataforma::all();
        return view('games.editGame', ['games' => $games, 'plataformas' => $plataformas]);
    }

    public function updateGame(Request $request){
        $data = $request->all();

        //upload de imagem

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")). "." . $extension;

            $request->image->move(public_path('img/games'), $imageName);
            $data['image'] = $imageName;
        }


        Game::findOrFail($request->id)->update($data);
        return redirect('/dashboard');
    }

    public function games(){
        $search = request('search');
        if($search){
            $games = Game::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }
        else{
            $games = Game::all();
        }
        return view('games.listagames', ['games' => $games, 'search' => $search]);
    }
    
    public function dashboard(){
        $user = auth()->user();
        $games = $user -> games;

        return view('games.dashboard', ['games' => $games, 'user' => $user]);
    }

    public function dashboardPlataforma(){
        $user = auth()->user();
        $plataformas = Plataforma::all();
        return view('games.dashboardPlataforma', ['plataformas' => $plataformas, 'user' => $user]);
    }
}

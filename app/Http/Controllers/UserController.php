<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    protected $userRepository;

    protected $nbrPerPage = 5;

    public function __construct(UserRepository $userRepository)
    {
       // $this->middleware(['auth']);
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();

        return view('index', compact('users', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $position = strpos($request->email, '.');
        $rest = substr($request->email, $position+1);
        //$user->admin = isset($inputs['admin']);
        $long = strlen($rest);
        if ($long >= 2){
            $user = $this->userRepository->store($request->all());
            return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
        }
        else{
            return redirect('user')->withOk("Echec d'enregistrement.");

        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return view('show',  compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id);

        return view('edit',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   protected $table = "users";
    public function update(UserUpdateRequest $request, $id)
    {
       // $position = strpos($request->email, '.');
        $valide_email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
       // $rest = substr($request->email, $position+1);
        //$user->admin = isset($inputs['admin']);
      //  $long = strlen($rest);
       // if ($long >= 2){
     /*   $this->validate($request->all(),[
            'name' => 'required|max:255|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id
        ]);*/

        if ($valide_email){
         $this->userRepository->update($id, $request->all());
        return redirect('user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
        }
        else{
            return redirect('user')->withOk("Echec de modification.");

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);

        return back();
    }
}

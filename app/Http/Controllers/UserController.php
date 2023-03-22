<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\Alert_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' =>'required',
        ]);


        if($validate->fails()):
            
            Alert_message::isError();
            return back();
        endif;

        
        $credentials = $request->only('email', 'password');
        $userIsFound = Auth::attempt($credentials);

        
        if($userIsFound == false):
            toast('Le compte n\'existe pas!','warning');
            return back();

        else:
            $get_user_role = DB::table('users')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('roles.name','users.password')
                ->where('users.email',$request->email)
                ->first();
            
            //dd($get_user_role); die();
            $checkedUserPassword = password_verify($request->password, $get_user_role->password);

            if($checkedUserPassword):
                
                Session::put('role', $get_user_role->name);
                toast('Connexion établie !','success');
                return redirect()->route('admin_front');
            else:
                toast('Le mot de passe est incorrecte','warning');
                return back();
            endif;
        

        endif;

    }

    public function users_list()
    {
        
        $list_user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('roles.name','users.full_name','users.email', 'users.id')
                
            ->paginate(15);

        $all_role =  Role::all();

        return view('pages.admin.user', compact('list_user', 'all_role'));
    }

    public function add_user(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            
        ]);

        if($validate->fails()):
            $this->toast_error();
            return back();
        endif;

        $email = DB::table('users')
        ->where('email',$request->email)
        ->first();

        if($email == true):
            toast('email existe déja!', 'success');
            return back();
        endif;


        $save_user = new User();
        if($request->hasFile('photo')):
            $file = $request->file('photo');
            $extension =  $file->getClientOriginalExtension();

            $filename ="photo".time() .'.'.$extension;

            if($filename):

                $file->move('media/images', $filename);
            else:
                toast('Image non enregistrée !','warning');
                return back();
            endif;

            $path = "media/images/";

            $add_action = new User();
            $add_action->photo = URL::to('').'/'.$path.$filename;
            $save_user->full_name = $request->full_name;
            $save_user->email = $request->email;
            $save_user->password = password_hash($request->password, PASSWORD_DEFAULT) ;
            $save_user->role_id = $request->role_id;

            if($add_action->save()):
                $this->toast_success();
                return back();
            endif;
        else:
            $save_user->full_name = $request->full_name;
            $save_user->email = $request->email;
            $save_user->password = password_hash($request->password, PASSWORD_DEFAULT) ;
            $save_user->role_id = $request->role_id;
            
            if($save_user->save()):
                $this->toast_success();
                return back();
            endif;
        endif;
    }

    public function show_user($id)
    {

        $show_user = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.*', 'users.*')
        ->where('users.id',$id)
        ->first();

        return view('pages.admin.user', compact('show_user'));

        //dd($single_category); die();
    }


    public function edit_user($id)
    {
        $single_user = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.*', 'users.*')
        ->where('users.id',$id)
        ->first();

        $all_role = Role::all();

        return view('pages.admin.user', compact('single_user', 'all_role'));
        
        //dd($single_faute); die();
    }

    
    public function update_user(Request $request, $id)
    {
        $update_user = User::findOrFail($id);
        $update_user->full_name = $request->full_name;
        $update_user->email = $request->email;
        $update_user->role_id = $request->role_id;


        if($update_user->save()):
            $this->toast_success();
            return redirect()->to('users_list');
        endif;
    }

    public function delete_user($id)
    {
        if(User::destroy($id)):
            $this->toast_success();
            return back();
        endif;
    }

    public function update_password(Request $request)
    {
        $all_user = User::all();
        return view('pages.admin.update_password', compact('all_user'));
    }

    public function init_password(Request $request)
    {
        //dd($request->all()); die();
        if(empty($request->id) && empty($request->password)):
            $this->toast_error();
            return back();
        endif;

        if(!empty($request->id) && !empty($request->password)):
            $id = $request->id;
            $password = password_hash($request->password, PASSWORD_DEFAULT);

            $get_user_id = User::where('id',$id)->value('id');
            //dd($get_user_id); die();
            $update_password = DB::table('users')->where('id',$get_user_id)->update(['password' => $password ]);

            if($update_password):
                $this->toast_success();
                return redirect()->route('users_list');
            else: 
                $this->toast_error();
                return back();
            endif;
        endif;

        

    }
    


    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        toast('Vous Vous êtes déconnecté !','info');
        return redirect()->route('front');
    }



    protected function toast_success(){
        return toast('Opération effectuée', 'success','bottom-right');
    }

    protected function toast_warning(){
        return toast('Opération échouée', 'warning','bottom-right');
    }    
}

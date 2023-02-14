<?php

namespace App\Http\Controllers;

use http\Url;
use Illuminate\Http\Request;
use App\District;
use App\Town;
use App\Http\Controllers\Controller;
use App\Province;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

// use TaylorNetwork\UsernameGenerator\Generator;
use App\UserDistricts;
use App\UserShelterHomes;
use App\ShelterHome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isSuperAdminRole = Auth::user()->isSuperAdmin();

        $query = User::select('*');
        if(Auth::user()->isAdmin())
        {
            //3 super-admin, 4 admin
            $query = $query->whereRaw('user_id not in
                                    (
                                        select model_id
                                        from model_has_roles
                                        where role_id in (1)
                                    )');
        }
        $query = $query->whereRaw('user_id not in
                                    (
                                        select model_id
                                        from model_has_roles
                                        where role_id in (1)
                                    )');
        $query = $query->orderBy('user_id', 'DESC');
        
        $total_count = $query->count();  
        
        //dd($data);
        $data = $query->paginate(20);

        //$shelterHomes = ShelterHome::orderBy('name', 'DESC')->get();
        $provinces = Province::select('province_id', 'province_name')->get();
        $objController = $this;

        return view('users.index', compact('data', 'provinces', 'isSuperAdminRole', 'objController'));
    }

    public function checkUserRole($userid)
    {
        $sql = "select role_id from model_has_roles where model_id = $userid";
        $roleCheck = DB::select($sql);
        if( count($roleCheck)>0 )
            return $roleCheck[0]->role_id;
        else
            return '';
    }

    public function getAssignPanahga(Request $request)
    {
        $qData = UserShelterHomes::where('user_id', $request->user_id)->get();

        if($qData->count()>0)
            echo $qData[0]->panagah_id;
        else
            echo '0';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::select('province_id', 'province_name')->get();
        $isAdminRole = Auth::user()->hasRole('super-admin');
        $roles = Role::select('id', 'name');
        if($isAdminRole)
        {
            //1 super-admin, 1 admin
            //$roles = $roles->where('id', '!=', '1');
            //$roles = $roles->where('id', '!=', '4');
        }else{
            $roles = $roles->where('id', '!=', '1');
        }
        $roles = $roles->get();

        return view('users.create', compact('roles', 'provinces', 'isAdminRole'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'username' => 'required|string|unique:users,username',
            'district' => 'required',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role_idFk' => $request->roles,
            'password' => Hash::make($request->password),
            'pass_hint' => $request->password,
            'district_id' => $request->district,

        ]);
        
        //if($request->roles){
          //      $user->roles()->attach($request->roles);
        //}
        
        $user->assignRole($request->input('roles'));
        //dd($user);
        //dd($user->roles->first()->id);
        
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allowRoleChange = false;
        $user = User::with('district')->find($id);


        $isAdminRole = Auth::user()->hasRole('admin');
        $roles = Role::select('id', 'name');
        if($isAdminRole)
        {
            //3 dom, 4 company
            //$roles = $roles->where('id', '!=', '3');
            
        }else{
            $roles = $roles->where('id', '!=', '1');
        }
        $roles = $roles->get();


        $userRole = $user->roles->pluck('id', 'id')->all();
        
        //dd($userRole);
        
        $provinces = Province::select('province_id', 'province_name')->get();

        return view('users.edit', compact('user', 'roles', 'userRole', 'provinces', 'allowRoleChange'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $this->validate($request, [
            'name' => 'required',
            //'email' => 'required|email|unique:users,email,user_id,' . $id,
//            'email' => [
//                'required',
//                'email',
//                Rule::unique('users','email')->ignore($id, 'user_id')
//                ],         
            'username' => [
                'required',
                'string',
                Rule::unique('users','username')->ignore($id, 'user_id')
                ], 
            //'username' => 'required|string|unique:users,username,user_id,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        
        $input['role_idFk'] = $input['roles'];
        
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);            
            $input['pass_hint'] = $input['password'];
            $input = Arr::except($input, ['confirm-password', 'roles']);
        } else {
            $input = Arr::except($input, ['password', 'confirm-password', 'roles']);
            // $input = array_except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::find($id)->delete();
        User::where('user_id', '=', $id)->update(['is_deleted' => 1]);

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }


    public function district(Request $request)
    {
        $province_id = $request->province_id;
        $districts = District::where('province_id', $province_id)->orderBy('district_name')->get();
        return response()->json([
            'districts' => $districts
        ]);
    }
    
    public function town(Request $request)
    {
        $district_id = $request->district_id;
        $towns = Town::where('district_idFk', $district_id)->orderBy('town_name')->get();
        return response()->json([
            'towns' => $towns
        ]);
    }

    public function districtMulti(Request $request)
    {
        $province_id = $request->province_id;
        $user_id = $request->user_id;

        $sql = "
            select id, name,
            (select COUNT(*) from user_districts ud where ud.user_id=$user_id AND ud.district_id = d.id) districtCount
            from districts d
            where d.province_id = $province_id
            order by districtCount desc, name
        ";
        $districts = DB::select($sql);

        echo '
            <li class="list-item">
                <input name="districtMulti[]" onClick="selectAllDistrict(this)" value="0" type="checkbox"> &nbsp; Select All
            </li>
        ';
        foreach ($districts as $disRow)
        {
            $selected='';
            if($disRow->districtCount>0){$selected="checked";}
            echo '
            <li class="list-item">
                <input name="districtMulti[]" class="classAllDistrict" value="'.$disRow->id.'" type="checkbox" '.$selected.'> &nbsp; '.$disRow->name.'
            </li>
            ';
        }
    }

    public function panahgahMulti(Request $request)
    {
        $province_id = $request->province_id;
        $user_id = $request->user_id;

        $sql = "
            select id, name,
            (select COUNT(*) from user_shelter_homes ushl where ushl.user_id=$user_id AND ushl.panagah_id = sh.id) as panahgahCount
            from shelter_homes sh
            where sh.district_id in
            (
                select id
                from districts d
                where d.province_id = $province_id
            )
            order by panahgahCount desc, name
        ";
        $data = DB::select($sql);

        if(count($data)==0)
        {
            echo '<div style="color: lightgray">No records found</div>';
            exit();
        }

        echo '
            <li class="list-item">
                <input name="panahgahMulti[]" onClick="selectAllPanahgah(this)" value="0" type="checkbox"> &nbsp; Select All
            </li>
        ';
        foreach ($data as $disRow)
        {
            $selected='';
            if($disRow->panahgahCount>0){$selected="checked";}
            echo '
            <li class="list-item">
                <input name="panahgahMulti[]" class="classAllPanahgah" value="'.$disRow->id.'" type="checkbox" '.$selected.'> &nbsp; '.$disRow->name.'
            </li>
            ';
        }
    }

    public function assigndistrict($userid)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $sql = "
            select id, name,
            (
                select province_id
                from districts
                where id =
                (
                    select ud.district_id
                    from user_districts ud
                    where ud.user_id = u.id
                    limit 1
                )
            ) province_id
            from users u
            where u.id = $userid
        ";
        $user = DB::select($sql);
        $u_name = $user[0]->name;
        $u_province_id = $user[0]->province_id;

        //Save request
        if( isset($_POST['btn_save']) )
        {
            $provinceID = $_POST['province_id'];

            UserDistricts::where('user_id',$userid)->delete();

            if(isset($_POST['districtMulti'])):
                $districtMulti = $_POST['districtMulti'];
                UserDistricts::saveAssigneDistrict($userid, $provinceID, $districtMulti);
            endif;

            if(isset($_POST['panahgahMulti'])):
                $panahgahMulti = $_POST['panahgahMulti'];
                UserShelterHomes::saveAssignePanahgah($userid, $panahgahMulti);
            endif;

            return redirect()->route('users.index')
            ->with('success', 'District successfully assigned.');
        }

        $provinces = Province::select('id', 'province_name')->get();
        $roles = Role::select('id', 'name')->get();
        return view('users.assigndistrict', compact('roles', 'provinces', 'userid', 'u_name', 'u_province_id'));
    }

    public function savePanahgah(Request $request)
    {
        UserShelterHomes::where('user_id',$request->user_id)->delete();

        $userSH = new UserShelterHomes;
        $userSH->panagah_id = $request->panahgah_id;
        $userSH->user_id = $request->user_id;
        $userSH->save();
    }

}

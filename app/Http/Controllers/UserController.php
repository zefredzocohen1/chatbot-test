<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    protected $repUser;

    public function __construct(UserRepository $user){
        $this->repUser = $user;
        $this->middleware('auth');
        $this->middleware('authority', ['except' => ['accountEdit', 'accountUpdate']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id        = Auth::user()->id;
        $keyword        = $request->get('keyword','');
        $perPage        = config('constants.per_page');
        $users          = $this->repUser->getAll($keyword, $perPage[3]);
        return view('user.index')->with([
            'users'             => $users,
            'user_id'           => $user_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = $this->defineUserGroup();
        return view('user.create')->with([
            'users'             => null,
            'group'             => $group
        ]);
    }

    private function defineUserGroup(){
        $group = config('constants.authority');
        foreach($group as $key => $value){
            if(Lang::has('select.'.$key)){
                $group[trans('select.'.$key)] = $value;
                unset($group[$key]);
            }
        }
        $group = array_flip($group);
        return $group;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $inputs = $request->all();
        DB::beginTransaction();
        try{
            $this->repUser->store($inputs);
            DB::commit();
            return redirect('user')->with('alert-success', trans('message.save_success', ['name' => trans('default.user')]));
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('alert-danger', trans('message.save_error', ['name' => trans('default.user')]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user               = $this->repUser->getById($id);
        $group              = $this->defineUserGroup();
        if($user){
            return view('user.create')->with([
                'user'              => $user,
                'group'             => $group
            ]);
        }
        return redirect('user')->with('alert-danger', trans('message.exiting_error', ['name' => trans('default.user')]));
    }

    public function accountEdit()
    {
        $user = Auth::user();
        return view('user.my_edit')->with([
            'user'              => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $inputs = $request->all();
        if(empty($inputs['password'])){
            unset($inputs['password']);
        }
        DB::beginTransaction();
        try{
            $user = $this->repUser->getById($id);
            if($user){
                $this->repUser->update($user, $inputs);
                DB::commit();
                return redirect('user')->with('alert-success', trans('message.update_success', ['name' => trans('default.user')]));
            }
            return redirect()->back()->with('alert-danger', trans('message.update_error', ['name' => trans('default.user')]));
        } catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('alert-danger', trans('message.update_error', ['name' => trans('default.user')]));
        }
    }

    public function accountUpdate(UserRequest $request)
    {
        $user = Auth::user();
        $inputs = $request->all();
        if(!isset($inputs['password'])){
            unset($inputs['password']);
        }
        DB::beginTransaction();
        try{
            $this->repUser->updateAccount($user, $inputs);
            DB::commit();
            return redirect()->back()->with('alert-success', trans('message.update_success', ['name' => trans('default.profile')]));
        } catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->with('alert-danger', trans('message.update_error', ['name' => trans('default.profile')]));
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
        $user_id = Auth::user()->id;
        $user = $this->repUser->getById($id);
        if($user && $user_id != $id){
            $this->repUser->destroy($id);
            return Response::json(array('success' => true), 200);
        }
        $errors['msg'] = trans("message.common_error");
        return Response::json(array(
            'success' => false,
            'errors' => $errors
        ), 400);
    }

}

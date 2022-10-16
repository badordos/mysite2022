<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use App\Repositories\UsersRepo;
use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Spatie\QueryBuilder\QueryBuilder;

class UsersController extends Controller
{
    public function __construct(private UsersRepo $usersRepo){}

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class, $request)
            ->allowedFilters(['id','name','email','is_admin','active'])
            ->allowedSorts(['id','name','email','is_admin','active'])
            ->paginate(10)
            ->appends($request->query());

        return Jetstream::inertia()->render($request, 'Admin/Users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Admin/Users/Form', []);
    }

    /**
     * @param \App\Http\Requests\Admin\AdminUserStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminUserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = $request->is_admin ? true : false;
        $user->email_verified_at = $request->email_verified_at ? Carbon::parse($request->email_verified_at) : null;
        if($request->profile_photo_url){
            $user->updateProfilePhoto($request->profile_photo_url);
        }
        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function show($id)
    {
        $user = $this->usersRepo->getById($id);
        return new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function edit($id)
    {
        $user = $this->usersRepo->getById($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $user = $this->usersRepo->getById($id);
        $delete = $user->delete();
        return [
            'flash' => [
                'message' => $delete ? 'User delete' : 'Something went wrong'
            ],
            'status' => $delete
        ];
    }
}

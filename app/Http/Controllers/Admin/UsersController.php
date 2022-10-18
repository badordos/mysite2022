<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;
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
    public function __construct(private UsersRepo $usersRepo)
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $users = QueryBuilder::for(User::class, $request)->allowedFilters([
                'id',
                'name',
                'email',
                'is_admin',
                'active',
            ])->allowedSorts(['id', 'name', 'email', 'is_admin', 'active'])->paginate(10)->appends($request->query());

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
        return Jetstream::inertia()->render($request, 'Admin/Users/Form', [
            'userData' => false,
        ]);
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
        $user->is_admin = $request->is_admin;
        $user->email_verified_at = $request->email_verified_at ? Carbon::parse($request->email_verified_at) : null;
        if ($request->profile_photo_url) {
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
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit(int $id)
    {
        return Jetstream::inertia()->render(request(), 'Admin/Users/Form', [
            'userData' => User::findOrFail($id),
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\AdminUserUpdateRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AdminUserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->is_admin = $request->is_admin;
        $user->email_verified_at = $request->email_verified_at ? Carbon::parse($request->email_verified_at) : null;
        if ($request->profile_photo_url) {
            $user->updateProfilePhoto($request->profile_photo_url);
        }
        $user->update();

        return redirect(route('users.index'));
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
                'message' => $delete ? 'User delete' : 'Something went wrong',
            ],
            'status' => $delete,
        ];
    }
}

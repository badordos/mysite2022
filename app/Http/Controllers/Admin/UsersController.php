<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use App\Repositories\UsersRepo;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

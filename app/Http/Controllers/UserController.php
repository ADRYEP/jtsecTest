<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(UserService $user){
        $this->service = $user;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $users = $this->service->getAll();
        return response()->json($users, 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $new_user = $this->service->create($request->all());
        return response()->json($new_user, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Add user to project
     * 
     */
    public function addUserToProject(Request $request): JsonResponse
    {
        $user_project = $this->service->addUserToProject($request->all());
        return response()->json($user_project, 200);
    }

    /**
     * Add user to activity
     * 
     */
    public function addUserToActivity(Request $request): JsonResponse
    {
        $user_activity = $this->service->addUserToActivity($request->all());
        return response()->json($user_activity, 200);
    }

    /**
     * Get activities from User
     * 
     */
    public function getActivitiesFromUserAsParticipant(Request $request): JsonResponse
    {
        $user_activities = $this->service->getActivitiesFromUserAsParticipant($request->user);
        return response()->json($user_activities, 200);
    }

    /**
     * Get Incidents from User
     * 
     */
    public function getIncidentFromUser(Request $request)
    {
        $user_incidents = $this->service->getIncidentFromUser($request->user);
        return response()->json($user_incidents, 200);
    }
}

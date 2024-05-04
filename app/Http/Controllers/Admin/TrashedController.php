<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Forums;
use App\Models\User;
use App\Models\userRoles;
use App\Notifications\BuildingRestoredNotification;
use App\Notifications\UserRecoveredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class TrashedController extends Controller
{
    public function buildingIndex()
    {
        $data = [ 'buildings' => Building::onlyTrashed()->latest()->get(),];
        return view('Admin.Trashed.building', $data);
    }
    public function buildingRestore(string $buildingId)
    {
        $building = Building::withTrashed()->find($buildingId);
        $building->restore();
        $landlord = $building->landlords;
        $landlord->notify(new BuildingRestoredNotification($building, $landlord));
        Alert::success('Building Restored Successfully');
        return redirect()->route('admin.trash.building');
    }
    public function buildingDelete(string $buildingId)
    {
        $building = Building::withTrashed()->find($buildingId);
        if(isset($building->image_1)){
            File::delete($building->image_1);
        } 
        if(isset($building->image_2)){
            File::delete($building->image_2);
        }
        if(isset($building->image_3)){
            File::delete($building->image_3);
        }
        if(isset($building->image_4)){
            File::delete($building->image_4);
        }
        $building->forceDelete(); 
        Alert::success('Building is permanently Deleted Successfully');
        return redirect()->route('admin.trash.building');
    }
    public function forumIndex()
    {
        $data = [ 'forums' => Forums::onlyTrashed()->latest()->get(),];
        return view('Admin.Trashed.forum', $data);
    }
    public function forumRestore(string $forumId)
    {
        $forum = Forums::withTrashed()->find($forumId);
        $forum->restore();
        Alert::success('Forum Restored Successfully');
        return redirect()->route('admin.trash.forum');
    }
    public function forumDelete(string $forumId)
    {
        $forum = Forums::withTrashed()->find($forumId);
        $forum->forceDelete(); 
        Alert::success('Forum is permanently Deleted Successfully');
        return redirect()->route('admin.trash.forum');
    }
    public function rolesIndex()
    {
        $data = [ 'roles' => userRoles::onlyTrashed()->latest()->get(),];
        return view('Admin.Trashed.roles', $data);
    }
    public function rolesRestore(string $rolesId)
    {
        $roles = userRoles::withTrashed()->find($rolesId);
        $roles->restore();
        Alert::success('User Roles Restored Successfully');
        return redirect()->route('admin.trash.roles');
    }
    public function rolesDelete(string $rolesId)
    {
        $roles = userRoles::withTrashed()->find($rolesId);
        if(isset($roles->image)){
            File::delete($roles->image);
        } 
        if(isset($roles->sub_image)){
            File::delete($roles->sub_image);
        } 
        $roles->forceDelete(); 
        Alert::success('User Roles is permanently Deleted Successfully');
        return redirect()->route('admin.trash.roles');
    }
    public function usersIndex()
    {
        $data = [ 'users' => User::onlyTrashed()->latest()->get(),];
        return view('Admin.Trashed.users', $data);
    }
    public function usersRestore(string $usersId)
    {
        $users = User::withTrashed()->find($usersId);
        $users->restore();
        $users->notify(new UserRecoveredNotification($users));
        Alert::success('User deactivation Cancelled');
        return redirect()->route('admin.trash.users');
    }
    public function usersDelete(string $usersId)
    {
        $users = User::withTrashed()->find($usersId);
        if(isset($users->image)){
            File::delete($users->image);
        }
        $users->forceDelete(); 
        Alert::success('User is permanently Deleted Successfully');
        return redirect()->route('admin.trash.users');
    }
}

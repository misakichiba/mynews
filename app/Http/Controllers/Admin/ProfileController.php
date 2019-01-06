<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use Carbon\Carbon;
use App\ProfileHistory;

class ProfileController extends Controller
{
  public function edit()
  {
        return view('admin.profile.edit');
  }

  public function update(Request $request)
  {

    $this->validate($request, Profile::$rules);

    $profiles = new Profile;
    $form = $request->all();

    unset($form['_token']);

    $profiles->fill($form);
    $profiles->save();

    return redirect('admin/profile/edit');
  }

    public function revision(Request $request)
    {
        $profiles = Profile::find($request->id ="1");
    
        return view('admin.profile.revision', ['profile_form' => $profiles]);
    }

    public function renewal(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profiles = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        $profiles->fill($profile_form)->save();

        $profilehistory = new ProfileHistory;
        $profilehistory->profile_id = $profiles->id;
        $profilehistory->edited_at = Carbon::now();
        $profilehistory->save();    

        return redirect('admin/profile/revision');
    }
}
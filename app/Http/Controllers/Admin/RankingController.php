<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Efriandika\LaravelSettings\Facades\Settings;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function getSettings()
    {
        pagetitle([trans('main.settings'), trans('main.apps.ranking'), settings('server_name')]);
        return view('admin.ranking.settings');
    }

    public function postSettings(Request $request)
    {
        Settings::set('ranking_ignore_roles', $request->ranking_ignore_roles);

        Settings::set('ranking_ignore_factions', $request->ranking_ignore_factions);

        flash()->success(trans('main.settings_saved'));

        return redirect('admin/ranking/settings');
    }
}

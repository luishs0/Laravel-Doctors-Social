<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\Sponsor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $specialization = Specialization::all();
        $specSlug = $request->specialization_slug;
        $vote = $request->vote;

        $sponsoredUser = User::leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
            ->whereDate('expiration_date', '>=', Carbon::now())
            ->with('user_detail', 'specializations', 'feedback')
            ->withCount('feedback')
            ->withAvg('feedback', 'vote')
            ->orderBy('expiration_date', 'desc')
            ->get();

        $sponsoredUserIds = $sponsoredUser->pluck('id')->toArray();

        $notSponsoredUser = User::leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
            ->whereNotIn('users.id', $sponsoredUserIds)
            ->with('user_detail', 'specializations', 'feedback')
            ->withCount('feedback')
            ->withAvg('feedback', 'vote')
            ->orderBy(DB::raw('RAND()'))
            ->get();

        if ($request->specialization_slug) {

            $sponsoredUser = User::leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
                ->whereDate('expiration_date', '>=', Carbon::now())
                ->with('user_detail', 'specializations', 'feedback')
                ->withCount('feedback')
                ->withAvg('feedback', 'vote')
                ->orderBy('expiration_date', 'desc')
                ->whereHas('specializations', function ($q) use ($specSlug) {
                    $q->where('slug', $specSlug);
                })
                ->get();

            $sponsoredUserIds = $sponsoredUser->pluck('id')->toArray();

            $notSponsoredUser = User::leftJoin('sponsor_user', 'users.id', '=', 'sponsor_user.user_id')
                ->whereNotIn('users.id', $sponsoredUserIds)
                ->whereHas('specializations', function ($q) use ($specSlug) {
                    $q->where('slug', $specSlug);
                })
                ->orderBy(DB::raw('RAND()'))
                ->with('user_detail', 'specializations', 'feedback')
                ->withCount('feedback')
                ->withAvg('feedback', 'vote')
                ->get();
        }

        if ($request->vote) {

            $sponsoredUser = $sponsoredUser->where('feedback_avg_vote', '>=', $vote);
            $notSponsoredUser = $notSponsoredUser->where('feedback_avg_vote', '>=', $vote);
        }

        if ($request->feedback_num) {

            $sponsoredUser = $sponsoredUser->where('feedback_count', '>', $request->feedback_num);
            $notSponsoredUser = $notSponsoredUser->where('feedback_count', '>', $request->feedback_num);
        }

        $users = $sponsoredUser->merge($notSponsoredUser);

        return response()->json([
            'success' => true,
            'results' => ['user' => $users, 'specializations' => $specialization , 'sponsoredUsers' => $sponsoredUser]
        ]);
    }

    public function show($slug)
    {
        $user = User::with('user_detail', 'specializations', 'feedback')->where('slug', $slug)->withAvg('feedback', 'vote')->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'No user'
            ]);
        }
    }
}

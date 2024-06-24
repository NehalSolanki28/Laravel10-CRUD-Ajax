<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Discount;
use App\Models\Product;
// use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables as DataTables;

// use Symfony\Component\HttpKernel\Exception\HttpException;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dump($request->all());
        if ($request->ajax()) {
            $club = Club::orderBy('created_at', 'desc')->get();
            return DataTables::of($club)
                ->addIndexColumn()
                ->addColumn('action', function ($ele) {
                    $btn = '<div class="row">
                    <div class="col-lg-6">
                        <i class="edit-btn bi bi-pencil-square" data-id="'.$ele->id.'"></i>
                    </div>
                    <div class="col-lg-6">
                        <i class="delete-btn bi bi-x-circle" data-id="'.$ele->id.'"></i>
                    </div>
                </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

            // $tableView = View::make('layouts.table', compact('club'))->render();
            // return response()->json($tableView);
        }

        return view('Club.clubIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Club Logo
        $clubLogo = $request->file('club_logo');
        $logoName = time().''.$clubLogo->getClientOriginalName();
        $destinationPath = public_path('images/club_logo');
        $clubLogo->move($destinationPath, $logoName);

        // Club Banner
        $clubBanner = $request->file('club_banner');
        $bannerName =time().''.$clubBanner->getClientOriginalName();
        $destinationPath = public_path('images/club_banner');
        $clubBanner->move($destinationPath, $bannerName);

        try {
            $club = Club::create([
                'group_id' => $request->group_id,
                'business_name' => $request->business_name,
                'club_number' => $request->club_number,
                'club_name' => $request->club_name,
                'club_state' => $request->club_state,
                'club_description' => $request->club_description,
                'club_slug' => $request->club_slug,
                'website_title' => $request->website_title,
                'website_link' => $request->website_link,
                'club_logo' => $logoName,
                'club_banner' => $bannerName,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Data Upload SuccessFully',
            ]);
        } catch (HttpResponseException $e) {
            return $e->getResponse();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $club = Club::find($id);
        if ($club) {
            return response()->json([
                'status' => 200,
                'club' => $club,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Club Found.',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $club = Club::find($id);

        if($request->hasFile('club_logo')){
            // Club Logo
            $clubLogo = $request->file('club_logo');
            $logoName = time().''.$clubLogo->getClientOriginalName();
            $destinationPath = public_path('images/club_logo');
            $clubLogo->move($destinationPath, $logoName);
            $club->update([
                'club_logo' => $logoName,
            ]);
        }

        if($request->hasFile('club_banner')){
             // Club Banner
            $clubBanner = $request->file('club_banner');
            $bannerName = time().''.$clubBanner->getClientOriginalName();
            $destinationPath = public_path('images/club_banner');
            $clubBanner->move($destinationPath, $bannerName);
            $club->update([
                'club_banner' => $bannerName,
            ]);
        }
        $club->update($request->input());

        return response()->json([
            'success' => true,
            'message' => 'Data Updated SuccessFully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $club = Club::find($id);
        $logoImg = public_path('images/club_logo/' . $club->club_logo);
        if (file_exists($logoImg)) {
            unlink($logoImg);
        }

        $bannerImg = public_path('images/club_banner/' . $club->club_banner);
        if (file_exists($bannerImg)) {
            unlink($bannerImg);
        }

        $club->delete();
        $product = Product::where('club_id', $id)->delete();
        return response(true);
    }
}

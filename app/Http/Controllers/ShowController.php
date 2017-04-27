<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function index ()
  {
    //GET /shows
    // lists out all  of the shows
    $shows = Show::all();
    return Response::json($shows);
  }

  public function show ($id)
  {
    //GET /shows/id
    //lists a single show
    $show = Show::find($id);
    return Response::json($show);
  }

  public function create (Request $request)
  {
    //POST /shows
    //create new show
    $show = Show::create($request->all());
    return Response::json(['created' => true]);
  }


  public function update (Request $request, $id)
  {
    //PUT /shows/id
    // update a single show
    $show = Show::find($id);
    $show->update($request->all());
    return Response::json(['updated' => true]);
  }

  public function destroy ($id)
  {
    //DELETE /shows/id
    //remove a single show
    $show = Show::find($id);
    $show->delete();
    return Response::json(['deleted' => true]);
  }
}

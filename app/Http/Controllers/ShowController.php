<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function index ()
  {
    $shows = Show::all();
    return Response::json($shows);
  }

  public function show ($id)
  {
    $show = Show::find($id);
    return Response::json($show);
  }

  public function create (Request $request)
  {
    $show = Show::create($request->all());
    return Response::json(['created' => true]);
  }


  public function update (Request $request, $id)
  {
    $show = Show::find($id);
    $show->update($request->all());
    return Response::json(['updated' => true]);
  }

  public function destroy ($id)
  {
    $show = Show::find($id);
    $show->delete();
    return Response::json(['deleted' => true]);
  }
}

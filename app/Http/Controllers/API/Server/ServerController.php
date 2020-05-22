<?php

namespace App\Http\Controllers\API\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Server\Server;
use Validator;

class ServerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::query()->paginate(10);
        return $this->sendResponse($servers->toArray(), 'Servers retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $servers = \DB::table('servers')->where('name', 'like', '%' .$search. '%')->orWhere('name', 'John')->paginate(2);
        return $this->sendResponse($servers->toArray(), 'Servers retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|min:3|max:100',
            'url' => 'required|min:3|max:100'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $server = Server::create($input);
        return $this->sendResponse($server->toArray(), 'Server created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//        $server = Server::find($id);

        $server = Server::where('slug', $slug)->first();

        if (is_null($server)) {
            return $this->sendError('Server not found.');
        }

        return $this->sendResponse($server->toArray(), 'Server retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'url' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $server->name = $input['name'];
        $server->url = $input['url'];
        $server->save();

        return $this->sendResponse($server->toArray(), 'Server updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();

        return $this->sendResponse($server->toArray(), 'Server deleted successfully.');
    }
}

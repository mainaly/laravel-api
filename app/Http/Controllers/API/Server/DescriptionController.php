<?php

namespace App\Http\Controllers\API\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Description;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class DescriptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Description::query()->paginate(10);
        return $this->sendResponse($descriptions->toArray(), 'Description retrieved successfully.');
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
            'rates' => 'required|min:3|max:10',
            'card_desc' => 'required|min:10|max:200',
            'server_desc' => 'required|min:10|max:1000',
            'server_rules' => 'required|min:10|max:1000',
            'server_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $description = Description::create($input);
        return $this->sendResponse($description->toArray(), 'Description created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $description = Description::find($id);

        if (is_null($description)) {
            return $this->sendError('Description not found.');
        }

        return $this->sendResponse($description->toArray(), 'Description retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Description $description)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'rates' => 'required|min:3|max:10',
            'card_desc' => 'required|min:10|max:200',
            'server_desc' => 'required|min:10|max:1000',
            'server_rules' => 'required|min:10|max:1000',
            'server_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $description->rates = $input['rates'];
        $description->card_desc = $input['card_desc'];
        $description->server_desc = $input['server_desc'];
        $description->server_rules = $input['server_rules'];
        $description->server_id = $input['server_id'];
        $description->save();

        return $this->sendResponse($description->toArray(), 'Description updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description)
    {
        $description->delete();

        return $this->sendResponse($description->toArray(), 'Description deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Event[]|Collection
     */
    public function getAll()
    {
        return Event::all();
    }

    public function get($id)
    {
        $event = Event::find($id);
        if ($event) {
            return $event;
        }
        return 'There is no data with the requested id';
    }

    public function store(Request $request)
    {
        $validation = Validator::make(request()->all(), [
            'title' => 'required',
            'time_from' => 'required|date',
            'time_to' => 'required|date'
        ]);
        if ($validation->fails()) {
            return 'Please provide correct data';
        }

        return Event::create(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return Response
     */
    public function update($id)
    {
        $validation = Validator::make(request()->all(), [
            'title' => 'string|min:1',
            'time_from' => 'date',
            'time_to' => 'date'
        ]);

        $event = Event::find($id);
        if ($event && $validation->fails() === false) {
            $event->update(request()->all());
            return $event;
        }
        return 'Something is wrong with the data being passed';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return $event;
        }
        return 'There is no data with the requested id';
    }
}

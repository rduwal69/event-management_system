<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;



class EventController extends Controller
{
    public function dashboard()
    {
        return view('event/dashboard');
    }

    public function create()
    {
        return view('event/create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'event_title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'venue' => 'required|max:255',
            'no_of_participants' => 'required|integer',
            'description' => 'required',
        ]);

        Events::create([
            'event_title' => $request->event_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'venue' => $request->venue,
            'no_of_participants' => $request->no_of_participants,
            'description' => $request->description,

        ]);

        return redirect('create')->with('success', 'Event Created');
    }

    public function show(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $item = Events::where('event_title', 'LIKE', '%' . $search . '%')->paginate(10)->appends(['search' => $search]);
        } else {
            $item = DB::table('events')->paginate(10); //get data from event table and store into item variable
            // $item = Events::all();

        }

        return view('event/show',compact('item','search')); // Passes the retrieved data ($item) to the Blade template under the variable name item. This data will be accessible in the Blade template to display events.
    }

    public function edit(int $id)
    {
        $data = Events::findOrFail($id);

        return view('event/edit', compact('data'));

    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'event_title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'venue' => 'required|max:255',
            'no_of_participants' => 'required|integer',
            'description' => 'required',
        ]);


        Events::findOrFail($id)->update([
            'event_title' => $request->event_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'venue' => $request->venue,
            'no_of_participants' => $request->no_of_participants,
            'description' => $request->description,

        ]);

        return redirect('/show')->with('editsuccess', 'Event Updated Successfully');
    }

    public function delete(int $id)
    {
        $data = Events::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('delete', 'Successfully Deleted');
    }
}

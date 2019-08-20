<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{
    protected $modelname = 'participants';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = 'participants';
        return view('index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Participant;
        $models = $this->modelname;
        $action = self::STORE;
        session()->flash('page_task', 'New Participant');
        return view('participant.partial', compact('model', 'models', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'mobile' => 'required',
            'sex' => Rule::in(['M', 'F'])
        ]);

        Participant::firstOrCreate($request->only([
            'lastname',
            'firstname',
            'mi',
            'sex',
            'mobile',
            'email'
        ]));

        session()->flash('message', __('messages.success'));

        return redirect()->route('participants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Participant::find($id);
        $models = $this->modelname;
        $action = self::EDIT;
        session()->flash('page_task', 'View Participant Details');
        session()->flash('page_title', $model->fullname);
        return view('participant.partial', compact('model', 'models', 'action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Participant::find($id);
        $models = $this->modelname;
        $action = self::UPDATE;
        session()->flash('page_task', 'Edit Participant Details');
        session()->flash('page_title', $model->fullname);
        return view('participant.partial', compact('model', 'models', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'mobile' => 'required'
        ]);

        $participant = Participant::find($id);

        $participant->update($request->only([
            'lastname',
            'firstname',
            'mi',
            'sex',
            'mobile',
            'email'
        ]));

        session()->flash('message', __('messages.success'));

        return redirect()->route('participants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}

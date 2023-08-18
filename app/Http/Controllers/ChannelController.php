<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::paginate(10);
        return view('channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'channelName' => 'required|string',
            'description' => 'nullable|string',
            'subscribersCount' => 'nullable|integer',
            'URL' => 'required|string',
        ]);

        Channel::create($validatedData);

        return redirect()->route('channels.index')
            ->with('success', 'Channel created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Channel  $channel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Channel  $channel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Channel  $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $channel)
    {
        $validatedData = $request->validate([
            'channelName' => 'required|string',
            'description' => 'nullable|string',
            'subscribersCount' => 'nullable|integer',
            'URL' => 'required|string',
        ]);

        $model = Channel::find($channel);
        $model->update($validatedData);

        return redirect()->route('channels.index')
            ->with('success', 'Channel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Channel  $channel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($channel)
    {
        $model = Channel::find($channel);
        $model->delete();

        return redirect()->route('channels.index')
            ->with('success', 'Channel deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use App\Models\Paybill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ChannelsController extends Controller
{
    function index()
    {
        $channels = Channels::all();
        return view('channels.index', ['channels' => $channels]);
    }
    function create()
    {
        $shortcodes = Paybill::all();
        return view('channels.add', ['shortcodes' => $shortcodes]);
    }
    function store(Request $request)
    {

        $input = $request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', Rule::unique(Channels::class),],
            'shortcode' => ['required', Rule::unique(Channels::class)],

        ])->validate();
        Channels::create([
            'name' => $input['name'],
            'shortcode' => $input['shortcode'],
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('channels.index')->with('success', 'Channel created successfully.');
    }
    function edit(Channels $channel)
    {
        $shortcodes = Paybill::all();
        return view('channels.update', ['shortcodes' => $shortcodes, 'channel' => $channel]);
    }
    function update(Request $request, Channels $channel)
    {
        $channel->update($request->all());
        return redirect()->route('channels.index')->with('success', 'Channel updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineCategory;
use App\Models\Line;
use App\Helpers\ResponseHelper;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lines = Line::with('lineCategory')->get();
        return ResponseHelper::sendSuccess($lines, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineCategories = LineCategory::all();
        $response = ['lineCategories' => $lineCategories ];
        return ResponseHelper::sendSuccess($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'number' => 'required|string',
            'order' => 'required|integer',
            'description' => 'required|string',
            'unit' => 'required|string',
            'unitPrice' => 'required|numeric',
            'calculateFunction' => 'required|string',
            'constans' => 'required|json',
            'identifier' => 'required|string'
        ]);
        $line = Line::create([
            'number' => $fields['number'],
            'order' => $fields['order'],
            'description' => $fields['description'],
            'unit' => $fields['unit'],
            'unitPrice' => $fields['unitPrice'],
            'calculateFunction' => $fields['calculateFunction'],
            'constans' => $fields['constans'],
            'identifier' => $fields['identifier']
        ]);

        return ResponseHelper::sendSuccess($line, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $line = Line::find($id);
        if ($line == null) {
            ResponseHelper::sendError('Line not found.', 404);
        }
        return ResponseHelper::sendSuccess($line, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $line = Line::find($id);
        if ($line == null) {
            ResponseHelper::sendError('Line not found.', 404);
        }
        $line->lineCategories = LineCategory::all();
        return ResponseHelper::sendSuccess($line, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $line = Line::find($id);
        if ($line == null) {
            return ResponseHelper::sendError('Line not found.', 404);
        }
        $fields = $request->validate([
            'number' => 'required|string',
            'order' => 'required|integer',
            'description' => 'required|string',
            'unit' => 'required|string',
            'unitPrice' => 'required|numeric',
            'calculateFunction' => 'required|string',
            'constans' => 'required|json',
            'identifier' => 'required|string'
        ]);
        $line->update([
            'number' => $fields['number'],
            'order' => $fields['order'],
            'description' => $fields['description'],
            'unit' => $fields['unit'],
            'unitPrice' => $fields['unitPrice'],
            'calculateFunction' => $fields['calculateFunction'],
            'constans' => $fields['constans'],
            'identifier' => $fields['identifier']
        ]);
        $line = Line::where('id', $id)->with('lineCategory')->get();
        return ResponseHelper::sendSuccess($line, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $line = Line::find($id);
        if ($line == null) {
            ResponseHelper::sendError('Line not found.', 404);
        }
        $line->delete();
        return ResponseHelper::sendSuccess($line, 200);
    }
}

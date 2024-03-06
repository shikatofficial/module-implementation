<?php

namespace Modules\WhatsappNumCheck\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\WhatsappNumCheck\App\Models\Csv;
use Modules\WhatsappNumCheck\App\Http\Controllers\Validator;

class CsvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Csv::all();
        return view('whatsappnumcheck::csv.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view('whatsappnumcheck::csv.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);
    
        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file));
    
        foreach ($csvData as $row) {
            Csv::create([
                'name' => $row[0], 
                'phone' => $row[1], 
            ]);
        }
    
        return redirect()->route('csv.index')->with('success', 'CSV file uploaded and processed successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        //return view('whatsappnumcheck::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('whatsappnumcheck::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Csv::find($id);

        if (!$data) {
            return redirect()->route('csv.index')->with('error', 'Data not found!');
        }

        $data->delete();

        return redirect()->route('csv.index')->with('success', 'Data deleted successfully!');
    }

}

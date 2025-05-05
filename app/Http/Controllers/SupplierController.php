<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SupplierController extends Controller
{
    public function index(): View
    {
        // Fetch all suppliers from the database
        $supplier = Supplier::orderBy('id', 'asc')->paginate(10);
        return view('supplier.index', ['suppliers' => $supplier]);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier created successfully.');
    }

    public function edit($id)
    {
        $data_supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('data_supplier'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the supplier data
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        // Redirect or return a response
        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the supplier
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        // Redirect or return a response
        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}

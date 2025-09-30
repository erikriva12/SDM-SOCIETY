<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Tampilkan daftar customer.
     */
    public function index()
    {
        return view('admin.customer.index');
    }

    public function getData()
    {
        $data = Customer::select(['id', 'name', 'email', 'phone', 'created_at']);
        return DataTables::of($data)->make(true);
    }

    // /**
    //  * Tampilkan form create customer.
    //  */
    // public function create()
    // {
    //     return view('customers.create');
    // }

    // /**
    //  * Simpan data customer baru.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'  => 'required|string|max:255',
    //         'email' => 'nullable|email|unique:ticketing.customer,email',
    //         'phone' => 'nullable|string|max:20',
    //     ]);

    //     Customer::create($request->all());

    //     return redirect()->route('customers.index')
    //         ->with('success', 'Customer berhasil ditambahkan.');
    // }

    // /**
    //  * Tampilkan detail customer.
    //  */
    // public function show(Customer $customer)
    // {
    //     return view('customers.show', compact('customer'));
    // }

    // /**
    //  * Tampilkan form edit customer.
    //  */
    // public function edit(Customer $customer)
    // {
    //     return view('customers.edit', compact('customer'));
    // }

    // /**
    //  * Update data customer.
    //  */
    // public function update(Request $request, Customer $customer)
    // {
    //     $request->validate([
    //         'name'  => 'required|string|max:255',
    //         'email' => 'nullable|email|unique:ticketing.customer,email,' . $customer->id,
    //         'phone' => 'nullable|string|max:20',
    //     ]);

    //     $customer->update($request->all());

    //     return redirect()->route('customers.index')
    //         ->with('success', 'Customer berhasil diperbarui.');
    // }

    // /**
    //  * Hapus customer.
    //  */
    // public function destroy(Customer $customer)
    // {
    //     $customer->delete();

    //     return redirect()->route('customers.index')
    //         ->with('success', 'Customer berhasil dihapus.');
    // }
}

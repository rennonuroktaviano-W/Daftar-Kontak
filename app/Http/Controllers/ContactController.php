<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   // Tampilkan daftar kontak + form tambah
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    // Simpan kontak baru
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:contacts,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
    ]);

    // Baris ini yang bertugas memasukkan data ke DB
    Contact::create($validated);

    return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan!');
}

    // Tampilkan form edit kontak
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Update data kontak
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    // Hapus kontak
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus!');
    }
}
@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Form Tambah Kontak -->
    <div class="lg:col-span-1">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <h2 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b">Tambah Kontak Baru</h2>

            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('phone') border-red-500 @enderror">
                    @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="address" rows="3"
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">{{ old('address') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-200">
                    + Simpan Kontak
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Kontak -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Daftar Kontak</h2>
                <span class="bg-indigo-50 text-indigo-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                    Total: {{ $contacts->count() }}
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b">
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Kontak</th>
                            <th class="px-6 py-3">Alamat</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($contacts as $contact)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $contact->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-gray-800">{{ $contact->email }}</div>
                                <div class="text-gray-500 text-xs">{{ $contact->phone }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $contact->address ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="text-amber-600 hover:text-amber-800 font-medium text-xs bg-amber-50 px-2.5 py-1.5 rounded border border-amber-200">
                                        Edit
                                    </a>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-rose-600 hover:text-rose-800 font-medium text-xs bg-rose-50 px-2.5 py-1.5 rounded border border-rose-200">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                                Belum ada data kontak. Silakan tambah data baru.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Daftar Kontak</h1>
        <p class="mt-1 text-sm text-slate-500">Kelola seluruh data kontak Anda di satu tempat, rapi dan terorganisir.
        </p>
    </div>

    <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 shadow-card">
        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
        </span>
        <div class="leading-tight">
            <div class="text-xs text-slate-400">Total Kontak</div>
            <div class="text-lg font-bold text-slate-900">{{ $contacts->count() }}</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">

    <!-- Form Tambah Kontak -->
    <div class="lg:col-span-1">
        <div class="sticky top-24 rounded-2xl border border-slate-200 bg-white p-6 shadow-card">
            <div class="mb-5 flex items-center gap-2.5 border-b border-slate-100 pb-4">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-600 text-white shadow-soft">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M19 8v6M22 11h-6" />
                    </svg>
                </span>
                <div>
                    <h2 class="text-base font-bold text-slate-900">Tambah Kontak Baru</h2>
                    <p class="text-xs text-slate-400">Lengkapi data di bawah ini</p>
                </div>
            </div>

            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-slate-600">Nama Lengkap</label>
                    <div class="relative">
                        <span
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </span>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            placeholder="Contoh: Budi Santoso"
                            class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50 @error('name') border-rose-400 @enderror">
                    </div>
                    @error('name')
                    <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-slate-600">Email</label>
                    <div class="relative">
                        <span
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="nama@email.com"
                            class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50 @error('email') border-rose-400 @enderror">
                    </div>
                    @error('email')
                    <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-slate-600">Nomor Telepon</label>
                    <div class="relative">
                        <span
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </span>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="08xx-xxxx-xxxx"
                            class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50 @error('phone') border-rose-400 @enderror">
                    </div>
                    @error('phone')
                    <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-semibold text-slate-600">Alamat</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute left-0 top-3 flex items-center pl-3 text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </span>
                        <textarea name="address" rows="3" placeholder="Alamat lengkap (opsional)"
                            class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50">{{ old('address') }}</textarea>
                    </div>
                </div>

                <button type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-600 py-2.5 text-sm font-semibold text-white shadow-soft transition duration-200 hover:bg-brand-700 hover:shadow-md active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Simpan Kontak
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Kontak -->
    <div class="lg:col-span-2">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-card overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 p-6">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Semua Kontak</h2>
                    <p class="text-xs text-slate-400">Data kontak yang tersimpan pada sistem</p>
                </div>
                <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">
                    {{ $contacts->count() }} kontak
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] text-left border-collapse">
                    <thead>
                        <tr
                            class="border-b border-slate-100 bg-slate-50/70 text-[11px] uppercase tracking-wider text-slate-400">
                            <th class="px-6 py-3 font-semibold">Nama</th>
                            <th class="px-6 py-3 font-semibold">Kontak</th>
                            <th class="px-6 py-3 font-semibold">Alamat</th>
                            <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($contacts as $contact)
                        @php
                        $palettes = [
                        ['bg' => 'bg-brand-50', 'text' => 'text-brand-600'],
                        ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                        ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
                        ['bg' => 'bg-violet-50', 'text' => 'text-violet-600'],
                        ['bg' => 'bg-rose-50', 'text' => 'text-rose-600'],
                        ['bg' => 'bg-cyan-50', 'text' => 'text-cyan-600'],
                        ];
                        $palette = $palettes[$loop->index % count($palettes)];
                        $initials = collect(explode(' ', trim($contact->name)))
                        ->map(fn($w) => mb_substr($w, 0, 1))
                        ->take(2)
                        ->implode('');
                        @endphp
                        <tr class="transition even:bg-slate-50/40 hover:bg-brand-50/40">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} text-xs font-bold">
                                        {{ strtoupper($initials) }}
                                    </span>
                                    <span class="font-semibold text-slate-800">{{ $contact->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700">{{ $contact->email }}</div>
                                <div class="text-xs text-slate-400">{{ $contact->phone }}</div>
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                @if($contact->address)
                                <span class="line-clamp-2 max-w-[180px]">{{ $contact->address }}</span>
                                @else
                                <span class="text-slate-300">&mdash;</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-brand-200 bg-brand-50 px-3 py-1.5 text-xs font-semibold text-brand-700 transition hover:bg-brand-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-600 transition hover:bg-rose-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0-1 14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 6h16Z" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <span
                                        class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-50 text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M22 8h-6M19 5v6" />
                                        </svg>
                                    </span>
                                    <p class="text-sm font-semibold text-slate-600">Belum ada data kontak</p>
                                    <p class="mt-1 text-xs text-slate-400">Tambahkan kontak pertama Anda melalui form di
                                        sebelah kiri.</p>
                                </div>
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
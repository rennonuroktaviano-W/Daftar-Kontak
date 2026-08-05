@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-6 flex items-center gap-1.5 text-xs font-medium text-slate-400">
        <a href="{{ route('contacts.index') }}" class="transition hover:text-brand-600">Daftar Kontak</a>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
        </svg>
        <span class="text-slate-600">Edit Kontak</span>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-7 shadow-card">
        <div class="mb-6 flex items-center gap-3 border-b border-slate-100 pb-5">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white shadow-soft">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                </svg>
            </span>
            <div>
                <h2 class="text-lg font-bold text-slate-900">Edit Kontak</h2>
                <p class="text-xs text-slate-400">Perbarui informasi kontak di bawah ini</p>
            </div>
        </div>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1.5 block text-xs font-semibold text-slate-600">Nama Lengkap</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </span>
                    <input type="text" name="name" value="{{ old('name', $contact->name) }}" required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50 @error('name') border-rose-400 @enderror">
                </div>
                @error('name')
                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1.5 block text-xs font-semibold text-slate-600">Email</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                    </span>
                    <input type="email" name="email" value="{{ old('email', $contact->email) }}" required
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50 @error('email') border-rose-400 @enderror">
                </div>
                @error('email')
                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1.5 block text-xs font-semibold text-slate-600">Nomor Telepon</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </span>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" required
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
                    <textarea name="address" rows="3"
                        class="w-full rounded-lg border border-slate-200 bg-slate-50/60 py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-50">{{ old('address', $contact->address) }}</textarea>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="flex flex-1 items-center justify-center gap-2 rounded-lg bg-brand-600 py-2.5 text-sm font-semibold text-white shadow-soft transition duration-200 hover:bg-brand-700 hover:shadow-md active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5" />
                    </svg>
                    Update Kontak
                </button>
                <a href="{{ route('contacts.index') }}"
                    class="flex items-center justify-center rounded-lg border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
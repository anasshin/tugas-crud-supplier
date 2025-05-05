<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="">
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-100 border-b">
                <h2 class="text-lg font-bold text-gray-800">Tambah Supplier Baru</h2>
            </div>

            <form action="{{ route('supplier.store') }}" method="POST" class="px-6 py-4">
                @csrf

                <div class="mb-4">
                    <label for="nama_supplier" class="block text-gray-700 font-medium mb-2">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                    @error('nama_supplier')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="telepon" class="block text-gray-700 font-medium mb-2">Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                    @error('telepon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600  px-4 py-2 rounded hover:bg-blue-800 focus:outline-none text-white focus:ring focus:ring-blue-200">
                        Simpan
                    </button>
                    <a href="{{ route('supplier.index') }}" class="text-gray-600 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
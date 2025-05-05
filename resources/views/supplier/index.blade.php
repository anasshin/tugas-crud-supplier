<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Supplier</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="font-medium my-3">Daftar Supplier</h3>
                            <a href="{{ route('supplier.create') }}" class="bg-blue-900 text-white p-2 rounded hover:bg-blue-700 inline-block ">Tambah Supplier</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="absolute top-0 right-0 mt-3 mr-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="relative overflow-x-auto mt-3">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-600  bg-gray-300">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">ID</th>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Alamat</th>
                                        <th scope="col" class="px-6 py-3">Telepon</th>
                                        <th scope="col" class="px-6 py-3">Email</th>
                                        <th scope="col" class="px-6 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($suppliers as $supplier)
                                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td scope='row' class="px-6 py-4 font-medium">{{ $supplier->nama_supplier }}</td>
                                        <td class="px-6 py-4">{{ $supplier->alamat }}</td>
                                        <td class="px-6 py-4">{{ $supplier->telepon }}</td>
                                        <td class="px-6 py-4">{{ $supplier->email }}</td>
                                        <td class="px-4 py-2">
                                            <div class="flex gap-2 justify-center items-center">
                                                <a href="{{ route('supplier.edit', $supplier->id) }}" class="font-medium text-blue-600  hover:underline">Edit</a>
                                                <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 text-white p-2 rounded">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data supplier</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
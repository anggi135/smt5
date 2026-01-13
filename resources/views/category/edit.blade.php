@extends('layouts.sneat')

@section('title', 'Edit Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Breadcrumb dinamis --}}
    <x-breadcrumb :items="[
        'Kategori' => route('category.index'),
        'Edit Kategori' => ''
    ]" />

    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back"></i> Kembali
        </a>
    </div>

    <!-- Form Edit Kategori -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama-kategori">
                                Nama Kategori
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="icon-nama">
                                        <i class="bx bx-package"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="nama"
                                        id="nama-kategori"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Silahkan isi nama kategori"
                                        aria-label="Silahkan isi nama kategori"
                                        aria-describedby="icon-nama"
                                        value="{{ old('nama', $category->nama) }}"
                                    />
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

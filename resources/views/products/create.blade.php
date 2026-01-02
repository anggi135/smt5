@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Breadcrumb --}}
    <x-breadcrumb
        :items="[
            'Produk' => route('products.index'),
            'Tambah Produk' => ''
        ]"
    />

    <div class="row">

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
            </a>
        </div>

        <!-- Form -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form>

                        <!-- Foto -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                                Foto
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="file"
                                    name="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                />
                            </div>
                        </div>

                        <!-- Nama Produk -->
                        <div class="row mb-3">
                            <label
                                class="col-sm-2 col-form-label"
                                for="nama"
                            >
                                Nama
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i class="bx bx-package"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="nama"
                                        id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Silahkan isi nama produk"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <label
                                class="col-sm-2 col-form-label"
                                for="deskripsi"
                            >
                                Deskripsi
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i class="bx bx-comment-detail"></i>
                                    </span>
                                    <textarea
                                        name="deskripsi"
                                        id="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Silahkan isi deskripsi produk"
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="row mb-3">
                            <label
                                class="col-sm-2 col-form-label"
                                for="harga"
                            >
                                Harga
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i class="bx bx-dollar-circle"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="harga"
                                        id="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="1.000.000"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="row mb-3">
                            <label
                                class="col-sm-2 col-form-label"
                                for="stok"
                            >
                                Stok
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i class="bx bx-box"></i>
                                    </span>
                                    <input
                                        type="number"
                                        name="stok"
                                        id="stok"
                                        class="form-control @error('stok') is-invalid @enderror"
                                        placeholder="10"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

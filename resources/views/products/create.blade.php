@extends('layouts.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">

                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-header py-3 px-4">
                        <div style="font-size:1.1rem; font-weight:700;">Tambah Produk Baru</div>
                        <div class="text-muted" style="font-size:0.8rem; font-weight:400; margin-top:2px;">Isi detail produk yang ingin ditambahkan</div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="form-create-product">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="product_name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('product_name') is-invalid @enderror"
                                           id="product_name" name="product_name"
                                           value="{{ old('product_name') }}"
                                           placeholder="Contoh: Gold Standard Whey Protein"
                                           required>
                                    @error('product_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->category_id }}" {{ old('category_id') == $cat->category_id ? 'selected' : '' }}>
                                                {{ $cat->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="brand_id" class="form-label">Brand <span class="text-danger">*</span></label>
                                    <select class="form-select @error('brand_id') is-invalid @enderror"
                                            id="brand_id" name="brand_id" required>
                                        <option value="">Pilih Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->brand_id }}" {{ old('brand_id') == $brand->brand_id ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="product_price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background:#f9fafb; border-color:#d1d5db; font-size:0.875rem;">Rp</span>
                                        <input type="number"
                                               class="form-control @error('product_price') is-invalid @enderror"
                                               id="product_price" name="product_price"
                                               value="{{ old('product_price') }}"
                                               placeholder="0" min="0" required>
                                        @error('product_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="product_stock" class="form-label">Stok <span class="text-danger">*</span></label>
                                    <input type="number"
                                           class="form-control @error('product_stock') is-invalid @enderror"
                                           id="product_stock" name="product_stock"
                                           value="{{ old('product_stock') }}"
                                           placeholder="0" min="0" required>
                                    @error('product_stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="product_image" class="form-label">
                                        Foto Produk
                                        <span class="text-muted" style="font-weight:400; font-size:0.8rem;">(Opsional, max 2MB)</span>
                                    </label>
                                    <input type="file"
                                           class="form-control @error('product_image') is-invalid @enderror"
                                           id="product_image" name="product_image"
                                           accept="image/jpg,image/jpeg,image/png,image/webp"
                                           onchange="previewImage(this)">
                                    <div class="form-text" style="font-size:0.775rem;">Format: JPG, JPEG, PNG, WEBP</div>
                                    @error('product_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="image-preview" class="mt-3 d-none">
                                        <img id="preview-img" src="" alt="Preview"
                                             style="max-height:160px; max-width:100%; border-radius:6px; border:1px solid #e5e7eb; object-fit:contain;">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-4 pt-2 border-top">
                                <button type="submit" class="btn-primary-custom" id="btn-submit-product">
                                    Simpan Produk
                                </button>
                                <a href="{{ route('products.index') }}"
                                   class="btn-secondary-custom"
                                   style="display:inline-block; text-decoration:none;"
                                   id="btn-cancel-product">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const img = document.getElementById('preview-img');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; preview.classList.remove('d-none'); };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('d-none');
    }
}
</script>
@endpush

@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
       {{ trans('global.edit') }}
    </div>

    <form method="POST" action="{{ route("admin.product.update", [$product->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.product.fields.name') }}</label>

                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $product->name) }}">
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="price" class="text-xs required">{{ trans('cruds.product.fields.price') }}</label>

                <div class="form-group">
                    <input type="text" id="price" name="price" class="{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price', $product->price) }}">
                </div>
                @if($errors->has('price'))
                    <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                @endif
                <span class="block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="quantity" class="text-xs required">{{ trans('cruds.product.fields.quantity') }}</label>

                <div class="form-group">
                    <input type="text" id="quantity" name="quantity" class="{{ $errors->has('quantity') ? ' is-invalid' : '' }}" value="{{ old('quantity', $product->quantity) }}">
                </div>
                @if($errors->has('quantity'))
                    <p class="invalid-feedback">{{ $errors->first('quantity') }}</p>
                @endif
                <span class="block">{{ trans('cruds.product.fields.quantity_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="text-xs "
                       for="categories">{{ trans('cruds.product.fields.categories') }}</label>
                <div style="padding-bottom: 4px">
                        <span class="btn-sm btn-indigo select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn-sm btn-indigo deselect-all"
                          style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="select2{{ $errors->has('categories') ? ' is-invalid' : '' }}" name="categories[]"
                        id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option
                            value="{{ $id }}" {{ in_array($id, old('categories', [])) || $product->categories->contains($id) ? 'selected' : '' }}>{{ $category}}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <p class="invalid-feedback">{{ $errors->first('categories') }}</p>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.categories_helper') }}</span>
            </div>
        </div>
        <input type="hidden" value="{{$product->id}}" name="id" />
        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection

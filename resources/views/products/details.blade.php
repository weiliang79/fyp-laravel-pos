@extends('layouts.admin')

@section('title', 'Product Details')
@section('content-header', 'Product Details')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="card">
      <div class="card-body">
            <div class="row mb-4">
                  <div class="col-2">
                        <img src="{{ $product->media_path ? config('app.main_system_url') . '/' . $product->media_path : config('app.main_system_url') . '/storage/defaults/product.png' }}" alt="" style="width: 100%;" onerror="">
                  </div>
                  <div class="col-5">
                        <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Product Name') }}</p>
                                    <p class="mb-0">{{ $product->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Category') }}</p>
                                    <p class="mb-0">{{ $product->productCategory->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Description') }}</p>
                                    <p class="mb-0">{{ $product->description ?: 'None' }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Price') }}</p>
                                    <p class="mb-0">{{ config('settings.currency_symbol') . $product->price }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Barcode') }}</p>
                                    <p class="mb-0">{{ $product->barcode ?: 'None' }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Status') }}</p>
                                    <div class="badge {{ $product->status ? 'badge-success' : 'badge-danger' }}">{{ $product->status ? 'Available' : 'Unavailable' }}</div>
                              </li>
                        </ul>
                  </div>

                  <div class="col-5">
                        <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Store Name') }}</p>
                                    <p class="mb-0">{{ $product->store->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">{{ __('Description') }}</p>
                                    <p class="mb-0">{{ $product->store->description }}</p>
                              </li>
                        </ul>
                  </div>
            </div>

            <div class="row mb-4">
                  <div class="col">

                        <div class="card">
                              <div class="card-header">
                                    {{ __('Product Options') }}
                              </div>

                              <div class="card-body">

                                    <div class="row row-cols-4">
                                          @foreach($product->productOptions as $option)
                                          <div class="col">
                                                <div class="card">
                                                      <div class="card-header">
                                                            {{ $option->name }}
                                                      </div>

                                                      <div class="card-body">
                                                            <ul class="list-group">
                                                                  @foreach($option->optionDetails as $detail)
                                                                  <li class="list-group-item d-flex justify-content-between">
                                                                        <p class="mb-0">{{ $detail->name }}</p>
                                                                        <p class="mb-0">{{ $detail->extra_price }}</p>
                                                                  </li>
                                                                  @endforeach
                                                            </ul>
                                                      </div>
                                                </div>
                                          </div>
                                          @endforeach
                                    </div>

                              </div>
                        </div>

                  </div>
            </div>

            <div class="row mb-0">
                  <div class="col-md-8 offset-md-3">
                        <a class="btn btn-primary" href="{{ route('products') }}">{{ __('Back to Product list') }}</a>
                  </div>
            </div>
      </div>
</div>
@endsection
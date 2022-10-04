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
                                    <p class="mb-0">Product Name</p>
                                    <p class="mb-0">{{ $product->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Category</p>
                                    <p class="mb-0">{{ $product->productCategory->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Description</p>
                                    <p class="mb-0">{{ $product->description }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Price</p>
                                    <p class="mb-0">{{ $product->price }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Barcode</p>
                                    <p class="mb-0">{{ $product->barcode }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Status</p>
                                    <p class="mb-0">{{ $product->status ? 'Available' : 'Unavailable' }}</p>
                              </li>
                        </ul>
                  </div>

                  <div class="col-5">
                        <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Store Name</p>
                                    <p class="mb-0">{{ $product->store->name }}</p>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <p class="mb-0">Description</p>
                                    <p class="mb-0">{{ $product->store->description }}</p>
                              </li>
                        </ul>
                  </div>
            </div>

            <div class="row mb-4">
                  <div class="col">

                        <div class="card">
                              <div class="card-header">
                                    Product Options
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
                        <a class="btn btn-primary" href="{{ route('products') }}">Back to Product list</a>
                  </div>
            </div>
      </div>
</div>
@endsection
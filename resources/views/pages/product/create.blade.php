@extends('layouts.master')
@section('content')
<h4 class="text-center">Product</h4><br>
<h5># Add Product</h5>
<div class="card card-default">
    <div class="card-body">
        <form id="addProduct" class="form-inline" method="POST" action="">
            <div class="form-group mb-2">
                <label for="name" class="sr-only">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="Name"
                    required autofocus>
            </div>
            <div class="invalid-feedback" id="nameError"></div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="description" class="sr-only">Email</label>
                <input id="description" type="description" class="form-control" name="description"
                    placeholder="Email" required autofocus>
            </div>
            <div class="invalid-feedback" id="descriptionError"></div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="qyt" class="sr-only">Quantity</label>
                <input id="qyt" type="number" class="form-control" name="qyt" placeholder="Quantity"
                    required autofocus>
            </div>
            <div class="invalid-feedback" id="qytError"></div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="image" class="sr-only">Image</label>
                <input id="image" type="file" class="form-control" name="image" placeholder="Image"
                    required autofocus>
            </div>
            <div class="invalid-feedback" id="qytError"></div>
            <button id="submitUser" type="button" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>
<br>
@endsection

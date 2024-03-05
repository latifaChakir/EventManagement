@extends('layouts.layout')
@section('content')

<div class="card my-4 mt-5">

    <div class="card-body px-0 pb-2">
        <form method="post" id="forms" action="{{route('categories.update',$category->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3 mx-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control task-desc" name="name" value="{{ $category->name }}">

            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success  mb-4 me-4 save ">Save Edit</button>
                <a href="/categories">
                    <div class="btn btn-danger  mb-4 mx-3 annuler">Annuler</div>
                </a>
            </div>
        </form>
</div>
@endsection

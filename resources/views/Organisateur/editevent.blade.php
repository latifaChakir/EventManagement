@extends('layouts.layout')
@section('content')

<div class="card my-4 mt-5">

    <div class="card-body px-0 pb-2">
        <form id="employeeForm" method="post" action="{{route('events.update',$event->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $event->title }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $event->description }}">
                </div>
                <div class="form-group">
                    <label>Adress</label>
                    <input type="text" class="form-control" name="place"value="{{ $event->place }}" >
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ $event->date }}">
                </div>
                <div class="form-group">
                    <label>number of seats</label>
                    <input type="number" class="form-control" name="number_places" value="{{ $event->number_places }}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id" data-placeholder="choose a category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $event->id_categorie) selected @endif>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Reservation type</label>
                    <select class="form-control" name="type_reserved" data-placeholder="choose a type">
                        <option value="manuel" @if($event->type_reserved == "nanuel") selected @endif>manuel</option>
                        <option value="automatic" @if($event->type_reserved == "automatic") selected @endif>automatic</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="/images/{{ $event->image_path }}" width="300px">
                    <input type="file" class="form-control" name="image_path" accept="image/*">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success  mb-4 me-4 save ">Save Edit</button>
                    <a href="/events">
                        <div class="btn btn-danger  mb-4 mx-3 annuler">Annuler</div>
                    </a>
                </div>
        </form>
</div>
@endsection

@extends('layouts.layout')
@section('content')

               <div class="midde_cont">

                  <div class="container-fluid">

                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Events</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">

                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Events Tables</h2>
                                 </div>
                                 <div class="d-flex justify-content-end mb-3">
                                    <a href="#addModal" class="btn btn-secondary" data-toggle="modal"><i class="fa fa-plus"></i><span>Add event</span></a>
                                </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table" id="myTable">
                                       <thead>
                                          <tr>
                                             <th>Image</th>
                                             <th>Title</th>
                                             <th>Description</th>
                                             <th>Adress</th>
                                             <th>Date</th>
                                             <th>number of seats</th>
                                             <th>Category Name</th>
                                             <th>Type of reservation</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        @foreach ($events as $event)
                                          <tr>
                                             <td><img src="/images/{{ $event->image_path }}" width="50px" alt=""></td>
                                             <td>{{ $event->title }}</td>
                                             <td>{{ $event->description }}</td>
                                             <td>{{ $event->place }}</td>
                                             <td>{{ $event->date }}</td>
                                             <td>{{ $event->number_places }}</td>
                                             <td>{{ $event->category_name }}</td>
                                             <td>{{ $event->type_reserved }}</td>
                                             <td class="align-middle">
                                                <div class="buttons">
                                                <a class="btn btn-success" href="{{route('events.edit',$event->id)}}">Edit</a>
                                                <form action="{{route('events.destroy',$event->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                              </td>

                                          </tr>
                                       </tbody>
                                       @endforeach
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                     </div>
                  </div>
               </div>

               <div id="addModal" class="modal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form id="employeeForm" method="post" action="{{route('events.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                <div class="form-group">
                                    <label>Adress</label>
                                    <input type="text" class="form-control" name="place">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="form-group">
                                    <label>number of seats</label>
                                    <input type="number" class="form-control" name="number_places">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" data-placeholder="choose a category">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Reservation type</label>
                                    <select class="form-control" name="type_reserved" data-placeholder="choose a type">
                                        <option value="manuel">manuel</option>
                                        <option value="automatic">automatic</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Event Image </label>
                                    <input type="file" class="form-control" name="image_path" accept="image/*">
                                </div>

                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-success" value="Add">
                                </div>
                        </form>
                    </div>
                </div>
            </div>


@endsection





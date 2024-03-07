@extends('layouts.layout')
@section('content')

               <div class="midde_cont">

                  <div class="container-fluid">

                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Administration</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">

                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Events</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table" id="myTable">
                                       <thead>
                                          <tr>
                                             <th>Event Image</th>
                                             <th>Event Name</th>
                                             <th>Description</th>
                                             <th>Date</th>
                                             <th>Organisateur Name</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>

                                        @foreach ($events as $event)
                                          <tr>
                                             <td><img src="/images/{{ $event->image_path }}" width="50px" alt=""></td>
                                             <td>{{ $event->title }}</td>
                                             <td> {!! Str::limit($event->description, 30, '...') !!}</td>
                                             <td>{{ $event->date }}</td>
                                             <td>{{ $event->user_name }}</td>
                                             <td class="align-middle">
                                                <div class="buttons">
                                                  <a class="btn btn-success" href="/Accepted/{{$event->id}}">Accepted</a>
                                                  <a class="btn btn-danger" href="/Refused/{{$event->id}}">Rejected</a>

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


@endsection





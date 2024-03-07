@extends('layouts.layout')
@section('content')

               <div class="midde_cont">

                  <div class="container-fluid">

                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Reservation</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">

                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Reservation Tables</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table" id="myTable">
                                       <thead>
                                          <tr>
                                             <th>Event Image</th>
                                             <th>Event Name</th>
                                             <th>User Name</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>

                                        @foreach ($reservations as $event)
                                          <tr>
                                             <td><img src="/images/{{ $event->image }}" width="50px" alt=""></td>
                                             <td>{{ $event->event_title }}</td>
                                             <td>{{ $event->user_name }}</td>
                                             <td>{{ $event->date }}</td>
                                             <td class="align-middle">
                                                <div class="buttons">
                                                    <a class="btn btn-success" href="/approved/{{ $event->id }}">Approved</a>
                                                    <a class="btn btn-danger" href="/rejected/{{$event->id}}">Rejected</a>

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





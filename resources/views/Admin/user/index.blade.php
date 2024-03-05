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
                     @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                        @endif
                     <!-- row -->
                     <div class="row">

                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Users Tables</h2>
                                 </div>
                                 <div class="d-flex justify-content-end mb-3">
                                    <a href="#addModal" class="btn btn-secondary" data-toggle="modal"><i class="fa fa-plus"></i>
                                        <span>Add user</span></a>
                                </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table" id="myTable">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Role</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        @foreach ($users as $user)
                                          <tr>
                                             <td>{{$user->name}}</td>
                                             <td>{{$user->email}}</td>
                                             <td>{{$user->role_name}}</td>
                                             <td class="align-middle">
                                                <div class="buttons">
                                                <a class="btn btn-success" href="{{route('users.edit',$user->id)}}">Edit</a>
                                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <ul class="pagination">
                                            {!! $users->links() !!}
                                        </ul>
                                    </div>
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
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <form id="employeeForm" method="post" action="{{route('users.store')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id" data-placeholder="choose a role">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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





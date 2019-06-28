@extends('Backend.master')

@section('content')


  <div class="app-heading app-heading-bordered app-heading-page">
    <div class="row">
      <div class="col-md-4">
        <div class="title">
            <h1>Users</h1>
        </div>
      </div>
      <div class="col-md-8 text-right">
        <a href="{!! route('Add new user') !!}" type="button" class="btn btn-default"><span class="icon-plus-circle"></span> Add User</a>
        <a href="{!! route('Pending users') !!}" type="button" class="btn btn-info"><span class="icon-mustache"></span> Pending users</a>
        <a href="{!! route('Deactive users') !!}" type="button" class="btn btn-warning"><span class="icon-neutral"></span> Deactive users</a>
        <a href="{!! route('Banned users') !!}" type="button" class="btn btn-danger"><span class="icon-sad"></span>Banned users</a>
      </div>
    </div>

  </div>
      <div class="block-content">
          @include('Backend.partials.error')

          <div class="info" id="usererror"></div>
          <table class="table table-striped table-bordered datatable-extended user-table">
              <thead>
                  <tr>

                      <th>User ID</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @php
                    $i = 0;
                  @endphp
                  @foreach ($users as $user)
                  @php
                    $i++
                  @endphp

                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td><img src="{!! asset('Backend/img/uploads/'.$user->photo) !!}" alt="" style="border-radius: 50px;margin-right:5px;"width="30px" height="30px">  {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td style="text-align: center;">
                          @if ($user->account_status == 1)
                            {{ 'Active' }}
                          @elseif ($user->account_status == 2)
                           {{ 'Deactive' }}
                          @elseif ($user->account_status == 3)
                            {{ 'Pending' }}
                          @elseif ($user->account_status == 4)
                            {{ 'Rejected' }}
                          @elseif ($user->account_status == 0)
                            {{ 'Banned' }}
                          @endif




                          </td>


                        <td>
                          <a href="{{Route('Edit User', $user->id)}}" class="btn btn-info btn-clean"><span class="icon-pencil"></span> Edit</a>
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-userinfo{{ $user->id }}" class="btn btn-success btn-clean"><span class="icon-eye"> </span> View </a>
                          <a href="javascript:void(0)"  data-toggle="modal" data-target="#modal-delete{{ $user->id }}"  class="btn btn-warning btn-clean"><span class="icon-cross"></span> Delete</a>
                          <a href="javascript:void(0)"  data-toggle="modal" data-target="#modal-sms{{ $user->id }}"  class="btn btn-primary btn-clean"><span class="icon-envelope"></span> Send SMS</a>
                          <div class="col-md-4">
                            <select id="userstat{{ $user->id }}" class="bs-select" data-id="{{ $user->id }}"  name="userstat">
                                <option selected value="">Change Status</option>
                                <option value="2">Deactive</option>
                                <option value="3">Pending</option>
                                <option value="0">Ban</option>
                            </select>
                          </div>
                          <!-- MODAL DEFAULT -->
                          <div class="modal fade" id="modal-delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-header">
                              <div class="modal-dialog" role="document">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                                  <div class="modal-content" id="deletemodel">

                                      <div class="modal-body">
                                        <h4 class="text-center">Are You Sure? </h4>
                                          <p class="text-center">Once deleted, you will not be able to recover this imaginary file!</p>
                                      </div>
                                      <div class="modal-footer" class="text-center">
                                        <form class="" action="{!! route('delete.user', $user->id) !!}" method="post">
                                          {{csrf_field()}}
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-info">Yes, Delete it! </button>
                                        </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- END MODAL DEFAULT -->
                          <!-- MODAL SMS -->
                          <div class="modal fade" id="modal-sms{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-header">
                              <div class="modal-dialog" role="document">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                                  <div class="modal-content" id="smsmodel">

                                      <div class="modal-body">
                                        <form class="" action="{!! route('user.sms') !!}" method="post">
                                          {{csrf_field()}}
                                            <div class="form-group">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <label>Your Message</label>
                                                      <textarea name="message" rows="8" cols="60"></textarea>
                                                  </div>
                                              </div>
                                            </div>
                                            <input type="text" hidden name="phone" value="{{ $user->phone }}">
                                            <input type="text" hidden name="id" value="{{ $user->id }}">

                                          <button type="submit" class="btn btn-info">Send! </button>
                                        </form>
                                      </div>
                                      <div class="modal-footer" class="text-center">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- END MODAL SMS -->
                          <!-- MODAL USER INFO -->
                          <div class="modal fade modal-userinfo" id="modal-userinfo{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-large-header">
                              <div class="modal-dialog modal-lg" role="document">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                                  <div class="modal-content">
                                      <div class="modal-header text-center">
                                          <h4 class="modal-title" id="modal-large-header">User Info</h4>
                                      </div>


                                          <!-- RECENT ACTIVITY -->
                                          <div class="block block-condensed">

                                              <div class="block-content">

                                                <div class="row text-center">
                                                    <img src="{!! asset('Backend/img/uploads/'.$user->photo) !!}" alt="" style="border-radius: 50px;margin-bottom:20px;margin-top:50px;"width="100px" height="100px">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <table class="table table-striped">
                                                          <tbody>
                                                              <tr>
                                                                  <td>Title</td>
                                                                  <td>{{$user->title}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Name</td>
                                                                  <td>{{$user->name}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Address</td>
                                                                  <td>{{$user->address}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Postcode</td>
                                                                  <td>{{$user->postcode}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Phone</td>
                                                                  <td>{{$user->phone}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Country</td>
                                                                  <td>{{$user->country}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Date of birth</td>
                                                                  <td>{{$user->dob}}</td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <table class="table table-striped">
                                                          <tbody>
                                                              <tr>
                                                                  <td>E-mail</td>
                                                                  <td>{{$user->email}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Account number</td>
                                                                  <td>{{$user->account_number}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>User ID</td>
                                                                  <td>{{$user->user_id}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Customer ID</td>
                                                                  <td>{{$user->customer_id}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>IPIN</td>
                                                                  <td>{{$user->pin}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Question 1</td>
                                                                  <td>{{$user->question1}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Answer 1</td>
                                                                  <td>{{$user->answer1}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Question 2</td>
                                                                  <td>{{$user->question2}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Answer 2</td>
                                                                  <td>{{$user->answer2}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Question 3</td>
                                                                  <td>{{$user->question3}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>Answer 3</td>
                                                                  <td>{{$user->answer3}}</td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                    </div>
                                                </div>

                                              </div>
                                          </div>
                                          <!-- END RECENT -->


                                      <div class="modal-footer text-center">
                                          <button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><span class="icon-cross-circle"></span></button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- END MODAL USER INFO -->
                      </td>

                    </tr>
                  @endforeach

              </tbody>
          </table>

      </div>



@endsection

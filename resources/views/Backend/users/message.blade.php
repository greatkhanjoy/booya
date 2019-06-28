@extends('Backend.master')

@section('content')


  <div class="app-heading app-heading-bordered app-heading-page">
    <div class="row">
      <div class="col-md-4">
        <div class="title">
            <h1>Send Message to user account</h1>
        </div>
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
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($users as $user)


                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td><img src="{!! asset('Backend/img/uploads/'.$user->photo) !!}" alt="" style="border-radius: 50px;margin-right:5px;"width="30px" height="30px">  {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>



                        <td>

                          <a href="javascript:void(0)"  data-toggle="modal" data-target="#modal-sms{{ $user->id }}"  class="btn btn-primary btn-clean"><span class="icon-envelope"></span> Send Message</a>

                          <!-- MODAL SMS -->
                          <div class="modal fade" id="modal-sms{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default-header">
                              <div class="modal-dialog" role="document">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                                  <div class="modal-content" id="smsmodel">

                                      <div class="modal-body">
                                        <form class="" action="{!! route('user.message') !!}" method="post">
                                          {{csrf_field()}}
                                            <div class="form-group">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <label>Message Type</label>
                                                      <select id="usermessage{{ $user->id }}" class="bs-select" data-id="{{ $user->id }}"  name="type" required>
                                                          <option selected disabled>Select Type</option>
                                                          <option value="1">Normal</option>
                                                          <option value="2">Warning</option>
                                                      </select>
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <label>Your Message</label>
                                                      <textarea name="message" rows="8" cols="60" required></textarea>
                                                  </div>
                                              </div>
                                            </div>
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
                      </td>

                    </tr>
                  @endforeach

              </tbody>
          </table>

      </div>



@endsection

@extends('Backend.users.partials.masterprofile')

@section('content')


    <form class="form-horizontal">
        <div class="block block-condensed">

          <div class="row profile-head">
            <div class="col-md-4">
              <div class="title">
                  <h1>Users</h1>
              </div>
            </div>
            <div class="col-md-8 text-right">
              <a href="javascript:void(0)" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-updateuser"><span class="icon-pencil"></span> Update profile</a>
              <a href="javascript:void(0)" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-change-pin"><span class="icon-pencil"></span> Change IPIN</a>
              <a href="javascript:void(0)" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-change-photo"><span class="icon-picture"></span> Change Photo</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 usermessage">
              @include('Backend.partials.error')
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 usermessage">
              @foreach ($userMessages as $userMessage)
                @if ($userMessage->type == 1)
                  <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">
                      <div class="alert-icon">
                          <span class="icon-envelope"></span>
                      </div>
                      {{ $userMessage->message }}
                      <button type="button" class="close" date-userid="{{ $userMessage->user_id }}" date-id="{{ $userMessage->id }}" id="usermessagedismiss{{ $userMessage->id }}" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                  </div>
                @elseif ($userMessage->type == 2)
                  <div class="alert alert-warning alert-icon-block alert-dismissible" role="alert">
                      <div class="alert-icon">
                          <span class="icon-neutral"></span>
                      </div>
                      {{ $userMessage->message }}
                      <button type="button" class="close" date-userid="{{ $userMessage->user_id }}" date-id="{{ $userMessage->id }}" id="usermessagedismiss{{ $userMessage->id }}" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                  </div>
                @endif

              @endforeach

            </div>
          </div>

            <div class="block-content">

              <div class="row text-center" >
                  <img id="usrrphoto" src="{!! asset('Backend/img/uploads/'.$user->photo) !!}" alt="" style="border-radius: 50px;margin-bottom:20px;margin-top:50px;"width="100px" height="100px">
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
    </form>



                  <!-- MODAL CHANGE PIN -->
                  <div class="modal fade" id="modal-change-pin" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                          <div class="modal-content">
                              <div class="modal-body">

                                  <div class="app-heading app-heading-small app-heading-condensed margin-bottom-30">
                                      <div class="title">
                                          <h5>Change Pin</h5>
                                          <p>Modify your pin code</p>
                                      </div>
                                  </div>

                                  <form action="{!! route('update.userpin', $user->id) !!}" method="post">
                                    {{ csrf_field() }}
                                      <div class="form-group">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <label>Your new pin</label>

                                                  <input data-validation="number" type="number" name="pin" min="5" class="form-control" data-validation="length" data-validation-length="5-5">
                                                  <span class="help-block">Please use numeric unique 5 digits pin code</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-default pull-right">Submit</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>

                              </div>
                          </div>
                      </div>
                  </div>


                  <!-- MODAL Photo -->
                  <div class="modal fade" id="modal-change-photo" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                          <div class="modal-content">
                              <div class="modal-body">

                                  <div class="app-heading app-heading-small app-heading-condensed margin-bottom-30">
                                      <div class="title">
                                          <h5>Update Your Photo</h5>
                                          <p>Please Select A Photo & close it when you see "OK" Mark</p>
                                      </div>
                                  </div>

                                  <form class="dropzone" action="{!! route('update.userphoto', $user->id) !!}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                  </form>

                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- END MODAL CHANGE Photo -->
                  <!-- MODAL User Update -->
                  <div class="modal fade" id="modal-updateuser" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>

                          <div class="modal-content">
                              <div class="modal-body">

                                  <div class="app-heading app-heading-small app-heading-condensed margin-bottom-30">
                                      <div class="title">
                                          <h5>Update Account information</h5>
                                      </div>
                                  </div>

                                  <form id="updateuser" class="form-horizontal" method="POST" action="{{ route('update.user.profile', $user->id) }}" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <div class="row">
                                          <div class="col-md-6">

                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                              <label for="title" class="col-md-3">Title</label>
                                                <div class="col-md-3">
                                                    <select id="title" class="bs-select"  name="title"  required autofocus>

                                                        <option disabled selected>Select</option>

                                                        <option value="Mr" @if ($user->title == "Mr") {{ 'selected' }} @endif >Mr</option>
                                                        <option value="Mrs" @if ($user->title == "Mrs") {{ 'selected' }} @endif >Mrs</option>
                                                        <option value="Miss" @if ($user->title == "Miss") {{ 'selected' }} @endif >Miss</option>
                                                        <option value="Ms" @if ($user->title == "Ms") {{ 'selected' }} @endif >Ms</option>
                                                        <option value="Doctor" @if ($user->title == "Doctor") {{ 'selected' }} @endif >Doctor</option>
                                                        <option value="Father" @if ($user->title == "Father") {{ 'selected' }} @endif >Father</option>
                                                        <option value="Sir" @if ($user->title == "Sir") {{ 'selected' }} @endif >Sir</option>
                                                        <option value="Proffesor" @if (old('Proffesor') == "Mrs") {{ 'selected' }} @endif >Proffesor</option>
                                                        <option value="Lady" @if ($user->title == "Lady") {{ 'selected' }} @endif >Lady</option>
                                                        <option value="Reverend" @if ($user->title == "Reverend") {{ 'selected' }} @endif >Reverend</option>
                                                        <option value="Captain" @if ($user->title == "Captain") {{ 'selected' }} @endif >Captain</option>
                                                        <option value="Sergent" @if ($user->title == "Sergent") {{ 'selected' }} @endif >Sergent</option>
                                                    </select>
                                                    @if ($errors->has('title'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>
                                            </div>

                                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                  <label for="name" class="col-md-3 control-label">Name</label>
                                                  <div class="col-md-9">
                                                      <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                                      @if ($errors->has('name'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('name') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>

                                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                  <label for="email" class="col-md-3 control-label">E-mail</label>
                                                  <div class="col-md-9">
                                                      <input id="email"  class="form-control" name="email" data-validation="email" value="{{ $user->email }}" required autofocus>
                                                      @if ($errors->has('email'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('email') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>

                                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                  <label for="phone" class="col-md-3 control-label">Phone</label>
                                                  <div class="col-md-9">
                                                      <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required autofocus>
                                                      @if ($errors->has('phone'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('phone') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>


                                              <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label for="country" class="col-md-3">Country</label>
                                                  <div class="col-md-9">
                                                      <select id="country" class="bs-select" data-live-search="true" name="country"  required autofocus>
                                                        <option disabled >Select Country</option>
                                                          <option selected value="{{ $user->country }}">{{ $user->country }}</option>
                                                        @foreach ($countries as $country)
                                                          <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                                        @endforeach

                                                      </select>
                                                      @if ($errors->has('country'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('country') }}</strong>
                                                          </span>
                                                      @endif

                                                  </div>

                                              </div>
                                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                  <label for="address" class="col-md-3 control-label">Address</label>
                                                  <div class="col-md-9">
                                                      <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required autofocus>
                                                      @if ($errors->has('address'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('address') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                                                  <label for="postcode" class="col-md-3 control-label">Postcode</label>
                                                  <div class="col-md-9">
                                                      <input id="postcode" type="text" class="form-control" name="postcode" value="{{ $user->postcode }}" required autofocus>
                                                      @if ($errors->has('postcode'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('postcode') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                                  <label for="dob" class="col-md-3 control-label">Date of birth</label>
                                                  <div class="col-md-9">
                                                      <input id="dob" type="text" class="form-control bs-datepicker" name="dob" value="{{ $user->dob }}" required autofocus>
                                                      @if ($errors->has('dob'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('dob') }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>


                                          </div>
                                          <div class="col-md-6">

                                            <div class="form-group{{ $errors->has('question1') ? ' has-error' : '' }}">
                                                <label for="question1" class="col-md-3 control-label">Question 1</label>
                                                <div class="col-md-9">

                                                  <select id="question1" class="bs-select"  name="question1" value="{{ old('question1') }}" required autofocus>
                                                      <option disabled selected>Select</option>
                                                      <option value="{{ $user->question1 }}" selected>{{ $user->question1 }}</option>
                                                      <option value="What town was your mother born?" @if (old('question1') == "What town was your mother born?") {{ 'selected' }} @endif >What town was your mother born?</option>
                                                      <option value="What is your favorite book?" @if (old('question1') == "What is your favorite book?") {{ 'selected' }} @endif >What is your favorite book?</option>
                                                      <option value="What is the name of your best actor ?" @if (old('question1') == "What is the name of your best actor ?") {{ 'selected' }} @endif >What is the name of your best actor ?</option>

                                                  </select>

                                                    @if ($errors->has('question1'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('question1') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('answer1') ? ' has-error' : '' }}">
                                                <label for="answer1" class="col-md-3 control-label">Answer 1</label>
                                                <div class="col-md-9">
                                                    <input id="answer1" type="text" class="form-control" name="answer1" value="{{ $user->answer1 }}" required autofocus>
                                                    @if ($errors->has('answer1'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('answer1') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('question2') ? ' has-error' : '' }}">
                                                <label for="question2" class="col-md-3 control-label">Question 2</label>
                                                <div class="col-md-9">

                                                  <select id="question2" class="bs-select"  name="question2" value="{{ old('question2') }}" required autofocus>
                                                      <option disabled>Select</option>
                                                      <option value="{{ $user->question2 }}" selected>{{ $user->question2 }}</option>
                                                      <option value="What town was your mother born?"  @if (old('question2') == "What town was your mother born?") {{ 'selected' }} @endif >What town was your mother born?</option>
                                                      <option value="What is your favorite book?"  @if (old('question2') == "What is your favorite book?") {{ 'selected' }} @endif >What is your favorite book?</option>
                                                      <option value="What is the name of your best actor ?"  @if (old('question2') == "What is the name of your best actor ?") {{ 'selected' }} @endif >What is the name of your best actor ?</option>

                                                  </select>

                                                    @if ($errors->has('question2'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('question2') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('answer2') ? ' has-error' : '' }}">
                                                <label for="answer2" class="col-md-3 control-label">Answer 2</label>
                                                <div class="col-md-9">
                                                    <input id="answer2" type="text" class="form-control" name="answer2" value="{{ $user->answer2 }}" required autofocus>
                                                    @if ($errors->has('answer2'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('answer2') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('question3') ? ' has-error' : '' }}">
                                                <label for="question3" class="col-md-3 control-label">Question 3</label>
                                                <div class="col-md-9">

                                                  <select id="question3" class="bs-select"  name="question3" value="{{ old('question3') }}" required autofocus>
                                                      <option disabled>Select</option>
                                                      <option value="{{ $user->question3 }}" selected>{{ $user->question3 }}</option>
                                                      <option value="What town was your mother born?"  @if (old('question3') == "What town was your mother born?") {{ 'selected' }} @endif >What town was your mother born?</option>
                                                      <option value="What is your favorite book?"  @if (old('question3') == "What is your favorite book?") {{ 'selected' }} @endif >What is your favorite book?</option>
                                                      <option value="What is the name of your best actor ?"  @if (old('question3') == "What is the name of your best actor ?") {{ 'selected' }} @endif >What is the name of your best actor ?</option>

                                                  </select>

                                                    @if ($errors->has('question3'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('question3') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('answer3') ? ' has-error' : '' }}">
                                                <label for="answer3" class="col-md-3 control-label">Answer 3</label>
                                                <div class="col-md-9">
                                                    <input id="answer3" type="text" class="form-control" name="answer3" value="{{ $user->answer3 }}" required autofocus>
                                                    @if ($errors->has('answer3'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('answer3') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-12 text-right">
                                              <button class="btn btn-primary btn-clean" type="submit" name="submit" >Submit</button>
                                          </div>
                                      </div>

                                  </form>

                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- END MODAL CHANGE Photo -->

@endsection

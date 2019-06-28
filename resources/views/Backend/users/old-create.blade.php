@extends('Backend.master')

@section('content')


  <!-- START PAGE CONTAINER -->
  <div class="container container-boxed">

      <!-- RECENT ACTIVITY -->
      <div class="block block-condensed">
          <div class="app-heading app-heading-small">
              <div class="title">
                  <h2>Add New User</h2>
              </div>
          </div>
          <div class="block-content">

              <form class="form-horizontal" method="POST" action="{{ route('store.user') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-6">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label for="title" class="col-md-3">Title</label>
                            <div class="col-md-3">
                                <select id="title" class="bs-select"  name="title" value="{{ old('title') }}" required autofocus>
                                    <option disabled selected>Select</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Father">Father</option>
                                    <option value="Sir">Sir</option>
                                    <option value="Proffesor">Proffesor</option>
                                    <option value="Lady">Lady</option>
                                    <option value="Reverend">Reverend</option>
                                    <option value="Captain">Captain</option>
                                    <option value="Sergent">Sergent</option>
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
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                              <label for="username" class="col-md-3 control-label">Username</label>
                              <div class="col-md-9">
                                  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                  @if ($errors->has('username'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('username') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-3 control-label">E-mail</label>
                              <div class="col-md-9">
                                  <input id="email"  class="form-control" name="email" data-validation="email" value="{{ old('email') }}" required autofocus>
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
                                  <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
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
                                  <select id="country" class="bs-select" data-live-search="true" name="country" value="{{ old('country') }}" required autofocus>
                                    <option disabled selected>Select Country</option>
                                    @foreach ($countries as $country)
                                      <option value="{{ $country->country_code }}">{{ $country->country_name }}</option>
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
                                  <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
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
                                  <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}" required autofocus>
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
                                  <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>
                                  @if ($errors->has('dob'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('dob') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                      </div>
                      <div class="col-md-6">

                        <div class="form-group{{ $errors->has('question1') ? ' has-error' : '' }}">
                            <label for="question1" class="col-md-3 control-label">Question 1</label>
                            <div class="col-md-9">
                                <input id="question1" type="text" class="form-control" placeholder="What town was your mother born?" name="question1" value="{{ old('question1') }}" required autofocus>
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
                                <input id="answer1" type="text" class="form-control" name="answer1" value="{{ old('answer1') }}" required autofocus>
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
                                <input id="question2" type="text" class="form-control" placeholder="What is your favorite book?" name="question2" value="{{ old('question2') }}" required autofocus>
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
                                <input id="answer2" type="text" class="form-control" name="answer2" value="{{ old('answer2') }}" required autofocus>
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
                                <input id="question3" type="text" class="form-control" name="question3" placeholder="What is the name of your best actor ?" value="{{ old('question3') }}" required autofocus>
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
                                <input id="answer3" type="text" class="form-control" name="answer3" value="{{ old('answer3') }}" required autofocus>
                                @if ($errors->has('answer3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-3 control-label">Photo</label>
                            <div class="col-md-9">
                                <input id="photo" type="file" class="custom-file-input" name="photo"  required autofocus>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="block">

                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h2>Dropzone</h2>
                                    <p>Dropzone.js is a light weight JavaScript library that turns an HTML element into a dropzone.</p>
                                </div>
                            </div>

                            <form action="assets/php/dropzone.php"  method="post" enctype="multipart/form-data" class="dropzone"></form>

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
      <!-- END RECENT -->

  </div>
  <!-- END PAGE CONTAINER -->


@endsection

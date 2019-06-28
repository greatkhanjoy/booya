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
              @include('Backend.partials.error')

              <form id="adduser" class="form-horizontal" method="POST" action="{{ route('store.user') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-6">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label for="title" class="col-md-3">Title</label>
                            <div class="col-md-3">
                                <select id="title" class="bs-select"  name="title"  required autofocus>

                                    <option disabled selected>Select</option>
                                    <option value="Mr" @if (old('title') == "Mr") {{ 'selected' }} @endif >Mr</option>
                                    <option value="Mrs" @if (old('title') == "Mrs") {{ 'selected' }} @endif >Mrs</option>
                                    <option value="Miss" @if (old('title') == "Miss") {{ 'selected' }} @endif >Miss</option>
                                    <option value="Ms" @if (old('title') == "Ms") {{ 'selected' }} @endif >Ms</option>
                                    <option value="Doctor" @if (old('title') == "Doctor") {{ 'selected' }} @endif >Doctor</option>
                                    <option value="Father" @if (old('title') == "Father") {{ 'selected' }} @endif >Father</option>
                                    <option value="Sir" @if (old('title') == "Sir") {{ 'selected' }} @endif >Sir</option>
                                    <option value="Proffesor" @if (old('Proffesor') == "Mrs") {{ 'selected' }} @endif >Proffesor</option>
                                    <option value="Lady" @if (old('title') == "Lady") {{ 'selected' }} @endif >Lady</option>
                                    <option value="Reverend" @if (old('title') == "Reverend") {{ 'selected' }} @endif >Reverend</option>
                                    <option value="Captain" @if (old('title') == "Captain") {{ 'selected' }} @endif >Captain</option>
                                    <option value="Sergent" @if (old('title') == "Sergent") {{ 'selected' }} @endif >Sergent</option>
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
                                  <input id="dob" type="text" class="form-control bs-datepicker" name="dob" value="{{ old('dob') }}" required autofocus>
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

                              <select id="question2" class="bs-select"  name="question2" value="{{ old('question2') }}" required autofocus>
                                  <option disabled selected>Select</option>
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

                              <select id="question3" class="bs-select"  name="question3" value="{{ old('question3') }}" required autofocus>
                                  <option disabled selected>Select</option>
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
                                <input id="answer3" type="text" class="form-control" name="answer3" value="{{ old('answer3') }}" required autofocus>
                                @if ($errors->has('answer3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="photo" class="col-md-3 control-label">Photo</label>
                            <div class="col-md-9">
                                <input id="photo" type="file"  name="photo"  required autofocus>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}




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

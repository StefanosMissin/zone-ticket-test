@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2 mr-auto ml-auto">
            <div class="panel panel-default">
                <div class="panel-heading mb-5">
                    <h2>Δημιουργία Νέου Αιτήματος</h2>
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/new_ticket') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-12 control-label">Θέμα</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Κατηγορία</label>

                            <div class="col-md-12">
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Επιλογή Κατηγορίας</option>
                                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="col-md-4 control-label">Προτεραιότητα</label>

                            <div class="col-md-12">
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Επιλογή Προτεραιότητας</option>
                                    <option value="low">Χαμηλή</option>
                                    <option value="medium">Μέση</option>
                                    <option value="high">Υψηλή</option>
                                </select>

                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Μήνυμα</label>

                            <div class="col-md-12">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Αποστολή
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                   <h2 class="mb-5">Τα αιτήματα μου</h2>
                </div>

                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Δεν έχετε ανοικτά αιτήματα αυτή τη στιγμή.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Κατηγορία</th>
                                    <th>Τίτλος</th>
                                    <th>Κατάσταση</th>
                                    <th>Τελευταία Ενημέρωση</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $ticket->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($ticket->status === 'Open')
                                        <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
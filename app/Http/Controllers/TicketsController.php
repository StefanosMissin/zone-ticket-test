<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class TicketsController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'title'     => 'required',
                'category'  => 'required',
                'priority'  => 'required',
                'message'   => 'required'
            ]);

            $ticket = new Ticket([
                'title'     => $request->input('title'),
                'user_id'   => Auth::user()->id,
                'ticket_id' => Str::random(10),
                'category_id'  => $request->input('category'),
                'priority'  => $request->input('priority'),
                'message'   => $request->input('message'),
                'status'    => "Ανοικτό",
            ]);

            $ticket->save();

            

            return redirect()->back()->with("status", "Ένα νέο αίτημα με ID: #$ticket->ticket_id έχει δημιουργηθεί.");
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();

        return view('tickets.user_tickets', compact('tickets', 'categories'));
    }
}

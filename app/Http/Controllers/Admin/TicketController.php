<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ticket = Ticket::where('ticket_id', 'LIKE', "%$keyword%")
                ->orWhere('issued_date', 'LIKE', "%$keyword%")
                ->orWhere('schedule_id', 'LIKE', "%$keyword%")
                ->orWhere('bus_seat_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('payment_id', 'LIKE', "%$keyword%")
                ->orWhere('storage_id', 'LIKE', "%$keyword%")
                ->orWhere('price_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ticket = Ticket::latest()->paginate($perPage);
        }

        return view('admin.ticket.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Ticket::create($requestData);

        return redirect('admin/ticket')->with('flash_message', 'Ticket added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $ticket = Ticket::findOrFail($id);
        $ticket->update($requestData);

        return redirect('admin/ticket')->with('flash_message', 'Ticket updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Ticket::destroy($id);

        return redirect('admin/ticket')->with('flash_message', 'Ticket deleted!');
    }
}

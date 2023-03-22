<?php

namespace App\Http\Controllers;

use App\Services\Alert_message;
use App\Models\Contacts;
use App\Models\Documents;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contacts_front()
    {
        $liste_documents = Documents::all();
        return view('pages.frontend.frontend', compact('liste_documents'));
    }

    public function add_contact(Request $request)
    {
        if (empty($request->full_name)):
            toast('Le champ nom complet est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->email)):
            toast('Le champ email est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->message)):
            toast('Le champ message est obligatoire', 'error');
            return back();
        endif;

        $add_contact = new Contacts();
            $add_contact->full_name = $request->full_name;
            $add_contact->email = $request->email;
            $add_contact->message = $request->message;

            if($add_contact->save()):
                Alert_message::success();
                return back();
            endif;
    }
}

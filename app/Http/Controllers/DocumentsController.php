<?php

namespace App\Http\Controllers;

use App\Models\cgus;
use App\Models\faqs;
use App\Models\Agenda;
use App\Models\Maires;
use App\Models\Presse;
use App\Models\Timbre;
use App\Models\actions;
use App\Models\Contacts;
use App\Models\Demandes;
use App\Models\mentions;
use App\Models\Documents;
use App\Models\Financier;
use App\Models\Technique;
use App\Models\Actualites;
use App\Models\Arrah_bref;
use App\Models\Decouverte;
use App\Models\Socio_cult;
use App\Models\Techniques;
use App\Models\Conseillers;
use App\Models\Secretariat;
use App\Models\Municipalite;
use Illuminate\Http\Request;
use App\Models\Bibiographies;
use App\Models\Lieu_livraison;
use App\Services\Alert_message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Administratif_financiers;

class DocumentsController extends Controller
{
    public function pay($doc, $m1, $m2) {
        $document = $doc;
        $montant_timbre = $m1;
        $montant_livraison = $m2;
        return view('pages.frontend.pay',compact(
            'document',
            'montant_timbre',
            'montant_livraison',
        ));
    }


    ////////// DOCUMENTS ///////////
    public function add_document(Request $request)
    {
        if (empty($request->name)):
            toast('Le champ est obligatoires', 'error');
            return back();
        else:

            $lenght= 50;
            $code_access = substr(str_shuffle(
                str_repeat($x = 'abcdefghqoujpzy123', ceil($lenght / strlen($x)))
            ), 3, $lenght);

            $add_document = new Documents;
            $add_document->name = $request->name;
            $add_document->rfk = $code_access;

            if ($add_document->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;

    }

    public function edit_document($id)
    {


        $get_document = Documents::findOrFail($id);

        
        if (isset($get_document)):
            return view('pages.admin.document_admin', compact(
                'get_document',
                
            ));
        else:
            toast('Document introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_document(Request $request , $id)
    {

        if (empty($request->name)):
            toast('Le champ est obligatoires', 'error');
            return back();
        else:

            $lenght= 50;
            $code_access = substr(str_shuffle(
                str_repeat($x = 'abcdefghqoujpzy123', ceil($lenght / strlen($x)))
            ), 3, $lenght);

            $update_document = Documents::findOrfail($id);
            $update_document->name = $request->name;
            $update_document->rfk = $code_access;

            if ($update_document->save()):
                Alert_message::success();
                return redirect()->route('document_admin');
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;
        
    }

    public function destroy_document($id)
    {
        if(Documents::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////// LIEUX LIVRAISONS ///////////
    public function add_lieu_livraison(Request $request)
    {
        if (empty($request->lieu) || empty($request->montant)):
            toast('Le champ lieu de livraison ou le montant est obligatoires', 'error');
            return back();
        else:

            

            $add_lieu_livraison = new Lieu_livraison;
            $add_lieu_livraison->lieu = $request->lieu;
            $add_lieu_livraison->montant = $request->montant;

            if ($add_lieu_livraison->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;

    }

    public function edit_lieu_livraison($id)
    {
        $get_lieu_livraison = Lieu_livraison::findOrFail($id);

        
        if (isset($get_lieu_livraison)):
            return view('pages.admin.lieu_livraison', compact(
                'get_lieu_livraison',
                
            ));
        else:
            toast('Lieu de livraison introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_lieu_livraison(Request $request , $id)
    {

        if (empty($request->lieu) || empty($request->montant)):
            toast('Le champ lieu de livraison ou le montant est obligatoires', 'error');
            return back();
        else:

            

            $update_lieu_livraison = Lieu_livraison::findOrfail($id);
            $update_lieu_livraison->lieu = $request->lieu;
            $update_lieu_livraison->montant = $request->montant;

            if ($update_lieu_livraison->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;
        
    }

    public function destroy_lieu_livraison($id)
    {
        if(Lieu_livraison::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    ////////// TIMBRES ///////////
    public function add_timbres(Request $request)
    {
        if (empty($request->montant)):
            toast('Le champ  montant est obligatoire', 'error');
            return back();
        else:

            $add_timbre = new Timbre;
            $add_timbre->montant = $request->montant;

            if ($add_timbre->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;

    }

    public function edit_timbres($id)
    {

        $get_timbre = Timbre::findOrFail($id);

        
        if (isset($get_timbre)):
            return view('pages.admin.timbre', compact(
                'get_timbre',
                
            ));
        else:
            toast('Timbre introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_timbres(Request $request , $id)
    {

        if (empty($request->montant)):
            toast('Le champ  montant est obligatoire', 'error');
            return back();
        else:

            $update_timbre = Timbre::findOrfail($id);
            $update_timbre->montant = $request->montant;

            if ($update_timbre->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;        
    }

    public function destroy_timbres($id)
    {
        if(Timbre::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////// ACTUALITES ///////////
    public function add_actualite(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="actualite".time() .'.'.$extension;

            if($filename):

                $file->move('media/actualite', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/actualite/";

            $add_actualite = new Actualites();
            $add_actualite->image = URL::to('').'/'.$path.$filename;
            $add_actualite->titre = $request->titre;
            $add_actualite->description = $request->description;

            if($add_actualite->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_actualite($id)
    {

        $get_actualite = Actualites::findOrFail($id);
        
        if (isset($get_actualite)):
            return view('pages.admin.actualite', compact(
            'get_actualite',
                
            ));
        else:
            toast('Actualité introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_actualite($id)
    {
        $show_actualite = Actualites::findOrFail($id);

        if(isset($show_actualite)):
            return view('pages.admin.actualite', compact('show_actualite' ));
        endif;

    }

    public function update_actualite(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="actualite".time() .'.'.$extension;

            if($filename):

                $file->move('media/actualite', $filename);
            else:
                toast('actualite non enregistré','error');
                return back();
            endif;

            $path = "media/actualite/";

            $update_actualite =  Actualites::findOrFail($id);

            $update_actualite->titre = $request->titre;
            $update_actualite->image = URL::to('').'/'.$path.$filename;
            $update_actualite->description = $request->description;

            if($update_actualite->save()):
                Alert_message::success();
                return redirect()->route('actualite');
            endif;
        else:
            $update_actualite = Actualites::findOrFail($id);

            $update_actualite->titre = $request->titre;
            $update_actualite->description = $request->description;

            if($update_actualite->save()):
                Alert_message::success();
                return redirect()->route('actualite');
            endif;
        endif;        
    }

    public function destroy_actualite($id)
    {
        if(Actualites::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }



    ////////////////////// LE MAIRE ///////////////////////////


    public function add_maire(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="maire".time() .'.'.$extension;

            if($filename):

                $file->move('media/maire', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/maire/";

            $add_maire = new Maires();
            $add_maire->image = URL::to('').'/'.$path.$filename;
            $add_maire->description = $request->description;

            if($add_maire->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_maire($id)
    {

        $get_maire = Maires::findOrFail($id);
        
        if (isset($get_maire)):
            return view('pages.admin.maire', compact(
            'get_maire',
                
            ));
        else:
            toast('Maire introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_maire($id)
    {
        $show_maire = Maires::findOrFail($id);

        if(isset($show_maire)):
            return view('pages.admin.maire', compact('show_maire' ));
        endif;

    }

    public function update_maire(Request $request , $id)
    {
        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="maire".time() .'.'.$extension;

            if($filename):

                $file->move('media/maire', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/maire/";

            $update_maire =  Maires::findOrFail($id);

            $update_maire->image = URL::to('').'/'.$path.$filename;
            $update_maire->description = $request->description;

            if($update_maire->save()):
                Alert_message::success();
                return redirect()->route('maire');
            endif;
        else:
            $update_maire = Maires::findOrFail($id);

            $update_maire->description = $request->description;

            if($update_maire->save()):
                Alert_message::success();
                return redirect()->route('maire');
            endif;
        endif;        
    }

    public function destroy_maire($id)
    {
        if(Maires::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


        ////////////////////// CONSEILLERS ///////////////////////////

    public function add_conseillers(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->full_name)):
            toast('Le champ Nom Complet est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="maire".time() .'.'.$extension;

            if($filename):

                $file->move('media/conseillers', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/conseillers/";

            $add_maire = new Conseillers();
            $add_maire->image = URL::to('').'/'.$path.$filename;
            $add_maire->full_name = $request->full_name;

            if($add_maire->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_conseillers($id)
    {

        $get_conseillers = Conseillers::findOrFail($id);
        
        if (isset($get_conseillers)):
            return view('pages.admin.conseiller', compact(
            'get_conseillers',
                
            ));
        else:
            toast('Conseiller introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_conseillers($id)
    {
        $show_conseiller = Conseillers::findOrFail($id);

        if(isset($show_conseiller)):
            return view('pages.admin.conseiller', compact('show_conseiller' ));
        endif;

    }

    public function update_conseillers(Request $request , $id)
    {
        if (empty($request->full_name)):
            toast('Le champ Nom & Prénom est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="conseiller".time() .'.'.$extension;

            if($filename):

                $file->move('media/conseillers', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/conseillers/";

            $update_conseiller =  Conseillers::findOrFail($id);

            $update_conseiller->image = URL::to('').'/'.$path.$filename;
            $update_conseiller->full_name = $request->full_name;

            if($update_conseiller->save()):
                Alert_message::success();
                return redirect()->route('conseillers');
            endif;
        else:
            $update_conseiller = Conseillers::findOrFail($id);

            $update_conseiller->full_name = $request->full_name;

            if($update_conseiller->save()):
                Alert_message::success();
                return redirect()->route('conseillers');
            endif;
        endif;        
    }

    public function destroy_conseillers($id)
    {
        if(Conseillers::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

        ////////////////////// MUNICIPALITE ///////////////////////////

    public function add_municip(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->full_name)):
            toast('Le champ Nom Complet est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="municip".time() .'.'.$extension;

            if($filename):

                $file->move('media/municipalite', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/municipalite/";

            $add_municip = new Municipalite();
            $add_municip->image = URL::to('').'/'.$path.$filename;
            $add_municip->full_name = $request->full_name;

            if($add_municip->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_municip($id)
    {

        $get_municip = Municipalite::findOrFail($id);
        
        if (isset($get_municip)):
            return view('pages.admin.municipalite', compact(
            'get_municip',
                
            ));
        else:
            toast('Maire introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_municip($id)
    {
        $show_municip = Municipalite::findOrFail($id);

        if(isset($show_municip)):
            return view('pages.admin.municipalite', compact('show_municip' ));
        endif;

    }

    public function update_municip(Request $request , $id)
    {
        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="municipalite".time() .'.'.$extension;

            if($filename):

                $file->move('media/municipalite', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/municipalite/";

            $update_municipalite =  Municipalite::findOrFail($id);

            $update_municipalite->image = URL::to('').'/'.$path.$filename;
            $update_municipalite->full_name = $request->full_name;

            if($update_municipalite->save()):
                Alert_message::success();
                return redirect()->route('municip');
            endif;
        else:
            $update_municipalite = Municipalite::findOrFail($id);

            $update_municipalite->full_name = $request->full_name;

            if($update_municipalite->save()):
                Alert_message::success();
                return redirect()->route('municip');
            endif;
        endif;        
    }

    public function destroy_municip($id)
    {
        if(Municipalite::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////// SECRETARIAT GENERAL ///////////
    public function add_secretariat(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="secretariat".time() .'.'.$extension;

            if($filename):

                $file->move('media/secretariat', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/secretariat/";

            $add_secretariat = new Secretariat();
            $add_secretariat->image = URL::to('').'/'.$path.$filename;
            $add_secretariat->responsable = $request->responsable;
            $add_secretariat->description = $request->description;

            if($add_secretariat->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_secretariat($id)
    {

        $get_secretariat = Secretariat::findOrFail($id);
        
        if (isset($get_secretariat)):
            return view('pages.admin.secretariat', compact(
            'get_secretariat',
                
            ));
        else:
            toast('Actualité introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_secretariat($id)
    {
        $show_secretariat = Secretariat::findOrFail($id);

        if(isset($show_secretariat)):
            return view('pages.admin.secretariat', compact('show_actualite' ));
        endif;

    }

    public function update_secretariat(Request $request , $id)
    {

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="secretariat".time() .'.'.$extension;

            if($filename):

                $file->move('media/secretariat', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/secretariat/";

            $update_secretariat =  Secretariat::findOrFail($id);

            $update_secretariat->responsable = $request->responsable;
            $update_secretariat->image = URL::to('').'/'.$path.$filename;
            $update_secretariat->description = $request->description;

            if($update_secretariat->save()):
                Alert_message::success();
                return redirect()->route('secretariat');
            endif;
        else:
            $update_secretariat =  Secretariat::findOrFail($id);

            $update_secretariat->responsable = $request->responsable;
            $update_secretariat->description = $request->description;

            if($update_secretariat->save()):
                Alert_message::success();
                return redirect()->route('secretariat');
            endif;
        endif;        
    }

    public function destroy_secretariat($id)
    {
        if(Secretariat::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    // ////////// ADMINISTRATIF FINANCIER ///////////
    public function add_ad_financier(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="administratif_financier".time() .'.'.$extension;

            if($filename):

                $file->move('media/administratif_financier', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/administratif_financier/";

            $add_administratif_financiers = new Administratif_financiers();
            $add_administratif_financiers->image = URL::to('').'/'.$path.$filename;
            $add_administratif_financiers->responsable = $request->responsable;
            $add_administratif_financiers->description = $request->description;

            if($add_administratif_financiers->save()):
                Alert_message::success();
                return back();
            endif;
        else:
            toast('image non enregistré','error');
            return back();
        endif;


    }

    public function edit_ad_financier($id)
    {

        $get_administratif_financiers = Administratif_financiers::findOrFail($id);
        
        if (isset($get_administratif_financiers)):
            return view('pages.admin.ad_financier', compact(
            'get_administratif_financiers',
                
            ));
        else:
            toast('Administratif financier introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_ad_financier(Request $request , $id)
    {

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="administratif_financier".time() .'.'.$extension;

            if($filename):

                $file->move('media/administratif_financier', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/administratif_financier/";

            $update_ad_financier =  Administratif_financiers::findOrFail($id);

            $update_ad_financier->responsable = $request->responsable;
            $update_ad_financier->image = URL::to('').'/'.$path.$filename;
            $update_ad_financier->description = $request->description;

            if($update_ad_financier->save()):
                Alert_message::success();
                return redirect()->route('ad_financier');
            endif;
        else:
            $update_ad_financier =  Administratif_financiers::findOrFail($id);

            $update_ad_financier->responsable = $request->responsable;
            $update_ad_financier->description = $request->description;

            if($update_ad_financier->save()):
                Alert_message::success();
                return redirect()->route('ad_financier');
            endif;
        endif;        
    }

    public function destroy_add_ad_financier($id)
    {
        if(Administratif_financiers::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    ////////// AGENDA ///////////
    public function add_agenda(Request $request)
    {
        if (empty($request->date) || empty($request->titre)):
            toast('Le champ date ou le titre est obligatoire', 'error');
            return back();
        else:
            $add_agenda = new Agenda;
            $add_agenda->date = $request->date;
            $add_agenda->titre = $request->titre;

            if ($add_agenda->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;

    }

    public function edit_agenda($id)
    {
        $get_agenda = Agenda::findOrFail($id);

        
        if (isset($get_agenda)):
            return view('pages.admin.agenda', compact(
                'get_agenda',                
            ));
        else:
            toast('Agenda introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_agenda(Request $request , $id)
    {

        if (empty($request->date) || empty($request->titre)):
            toast('Le champ date ou le titre sont obligatoires', 'error');
            return back();
        else:
            $update_agenda = Agenda::findOrfail($id);
            $update_agenda->date = $request->date;
            $update_agenda->titre = $request->titre;

            if ($update_agenda->save()):
                Alert_message::success();
                return back();
            else:
                Alert_message::toast_warning();
                return back();;
            endif;
        endif;
        
    }

    public function destroy_agenda($id)
    {
        if(Agenda::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    
    //////////FINANCIERS ///////////
    public function add_financier(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="financier".time() .'.'.$extension;

            if($filename):

                $file->move('media/financier', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/financier/";

            $add_financier = new Financier;
            $add_financier->image = URL::to('').'/'.$path.$filename;
            $add_financier->responsable = $request->responsable;
            $add_financier->description = $request->description;

            if($add_financier->save()):
                Alert_message::success();
                return back();
            endif;
        else:
            toast('image non enregistré','error');
            return back();
        endif;


    }

    public function edit_financier($id)
    {

        $get_financier = Financier::findOrFail($id);
        
        if (isset($get_financier)):
            return view('pages.admin.financier', compact(
            'get_financier',
                
            ));
        else:
            toast('Financier introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_financier(Request $request , $id)
    {

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="financier".time() .'.'.$extension;

            if($filename):

                $file->move('media/financier', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/financier/";

            $update_financier =  Financier::findOrFail($id);
            $update_financier->responsable = $request->responsable;
            $update_financier->image = URL::to('').'/'.$path.$filename;
            $update_financier->description = $request->description;

            if($update_financier->save()):
                Alert_message::success();
                return redirect()->route('financier');
            endif;
        else:
            $update_financier =  Financier::findOrFail($id);

            $update_financier->responsable = $request->responsable;
            $update_financier->description = $request->description;

            if($update_financier->save()):
                Alert_message::success();
                return redirect()->route('financier');
            endif;
        endif;        
    }

    public function destroy_financier($id)
    {
        if(Financier::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    //////////TECHNIQUES ///////////
    public function add_technique(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="technique".time() .'.'.$extension;

            if($filename):

                $file->move('media/technique', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/technique/";

            $add_technique = new Technique;
            $add_technique->image = URL::to('').'/'.$path.$filename;
            $add_technique->responsable = $request->responsable;
            $add_technique->description = $request->description;

            if($add_technique->save()):
                Alert_message::success();
                return back();
            endif;
        else:
            toast('image non enregistré','error');
            return back();
        endif;


    }

    public function edit_technique($id)
    {

        $get_technique = Technique::findOrFail($id);
        
        if (isset($get_technique)):
            return view('pages.admin.technique', compact(
            'get_technique',
                
            ));
        else:
            toast('Technique introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_technique(Request $request , $id)
    {

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="technique".time() .'.'.$extension;

            if($filename):

                $file->move('media/technique', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/technique/";

            $update_technique =  Technique::findOrFail($id);
            $update_technique->responsable = $request->responsable;
            $update_technique->image = URL::to('').'/'.$path.$filename;
            $update_technique->description = $request->description;

            if($update_technique->save()):
                Alert_message::success();
                return redirect()->route('technique');
            endif;
        else:
            $update_technique =  Technique::findOrFail($id);

            $update_technique->responsable = $request->responsable;
            $update_technique->description = $request->description;

            if($update_technique->save()):
                Alert_message::success();
                return redirect()->route('technique');
            endif;
        endif;        
    }

    public function destroy_technique($id)
    {
        if(Technique::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    //////////SOCIO CULTURELS ///////////
    public function add_socio_cult(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="socio".time() .'.'.$extension;

            if($filename):

                $file->move('media/socio', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/socio/";

            $add_socio = new Socio_cult;
            $add_socio->image = URL::to('').'/'.$path.$filename;
            $add_socio->responsable = $request->responsable;
            $add_socio->description = $request->description;

            if($add_socio->save()):
                Alert_message::success();
                return back();
            endif;
        else:
            toast('image non enregistré','error');
            return back();
        endif;


    }

    public function edit_socio_cult($id)
    {

        $get_socio = Socio_cult::findOrFail($id);
        
        if (isset($get_socio)):
            return view('pages.admin.socio', compact(
            'get_socio',                
            ));
        else:
            toast('socio culturel introuvable', 'error');
            return back() ;
        endif;
    }

    public function update_socio_cult(Request $request , $id)
    {

        if (empty($request->responsable)):
            toast('Le champ responsable est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="socio".time() .'.'.$extension;

            if($filename):

                $file->move('media/socio', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/socio/";

            $update_socio =  Socio_cult::findOrFail($id);
            $update_socio->responsable = $request->responsable;
            $update_socio->image = URL::to('').'/'.$path.$filename;
            $update_socio->description = $request->description;

            if($update_socio->save()):
                Alert_message::success();
                return redirect()->route('socio_cult');
            endif;
        else:
            $update_socio =  Socio_cult::findOrFail($id);

            $update_socio->responsable = $request->responsable;
            $update_socio->description = $request->description;

            if($update_socio->save()):
                Alert_message::success();
                return redirect()->route('socio_cult');
            endif;
        endif;        
    }

    public function destroy_socio_cult($id)
    {
        if(Socio_cult::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////////////////////////////////////// DECOUVERTES //////////////////////////////////////////////////////

    public function add_decouverte(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="decouverte".time() .'.'.$extension;

            if($filename):

                $file->move('media/decouverte', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/decouverte/";

            $add_decouverte = new Decouverte;
            $add_decouverte->image = URL::to('').'/'.$path.$filename;
            $add_decouverte->titre = $request->titre;
            $add_decouverte->description = $request->description;

            if($add_decouverte->save()):
                Alert_message::success();
                return back();
            endif;
        endif;


    }

    public function edit_decouverte($id)
    {

        $get_decouverte = Decouverte::findOrFail($id);
        
        if (isset($get_decouverte)):
            return view('pages.admin.decouverte', compact(
            'get_decouverte',
                
            ));
        else:
            toast('Decouverte introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_decouverte($id)
    {
        $show_decouverte = Decouverte::findOrFail($id);

        if(isset($show_decouverte)):
            return view('pages.admin.decouverte', compact('show_decouverte' ));
        endif;

    }

    public function update_decouverte(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="decouverte".time() .'.'.$extension;

            if($filename):

                $file->move('media/decouverte', $filename);
            else:
                toast('decouverte non enregistré','error');
                return back();
            endif;

            $path = "media/decouverte/";

            $update_decouverte =  Decouverte::findOrFail($id);

            $update_decouverte->titre = $request->titre;
            $update_decouverte->image = URL::to('').'/'.$path.$filename;
            $update_decouverte->description = $request->description;

            if($update_decouverte->save()):
                Alert_message::success();
                return redirect()->route('decouverte');
            endif;
        else:
            $update_decouverte = Decouverte::findOrFail($id);

            $update_decouverte->titre = $request->titre;
            $update_decouverte->description = $request->description;

            if($update_decouverte->save()):
                Alert_message::success();
                return redirect()->route('decouverte');
            endif;
        endif;        
    }

    public function destroy_decouverte($id)
    {
        if(Decouverte::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    ////////////////////////////////////////// PRESSES //////////////////////////////////////////////////////

    public function add_presse(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->url_presse)):
            toast('Le champ url est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="presse".time() .'.'.$extension;

            if($filename):

                $file->move('media/presse', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/presse/";

            $add_presse = new Presse;
            $add_presse->image = URL::to('').'/'.$path.$filename;
            $add_presse->titre = $request->titre;
            $add_presse->url_presse = $request->url_presse;

            if($add_presse->save()):
                Alert_message::success();
                return back();
            endif;
        endif;
    }

    public function edit_presse($id)
    {
        $get_presse = Presse::findOrFail($id);
        
        if (isset($get_presse)):
            return view('pages.admin.presse', compact(
            'get_presse',                
            ));
        else:
            toast('presse introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_presse($id)
    {
        $show_presse = Presse::findOrFail($id);

        if(isset($show_presse)):
            return view('pages.admin.presse', compact('show_presse' ));
        endif;

    }

    public function update_presse(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->url_presse)):
            toast('Le champ url est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="presse".time() .'.'.$extension;

            if($filename):

                $file->move('media/presse', $filename);
            else:
                toast('presse non enregistré','error');
                return back();
            endif;

            $path = "media/presse/";

            $update_presse =  Presse::findOrFail($id);

            $update_presse->titre = $request->titre;
            $update_presse->image = URL::to('').'/'.$path.$filename;
            $update_presse->url_presse = $request->url_presse;

            if($update_presse->save()):
                Alert_message::success();
                return redirect()->route('presse');
            endif;
        else:
            $update_presse = Presse::findOrFail($id);

            $update_presse->titre = $request->titre;
            $update_presse->url_presse = $request->url_presse;

            if($update_presse->save()):
                Alert_message::success();
                return redirect()->route('presse');
            endif;
        endif;        
    }

    public function destroy_presse($id)
    {
        if(Presse::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////////////////////////////////////// FAQS //////////////////////////////////////////////////////

    public function add_faq(Request $request)
    {
        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $add_faq = new faqs;
        $add_faq->titre = $request->titre;
        $add_faq->description = $request->description;

        if($add_faq->save()):
            Alert_message::success();
            return back();
        endif;
    }

    public function edit_faq($id)
    {
        $get_faq = faqs::findOrFail($id);
        
        if (isset($get_faq)):
            return view('pages.admin.faq', compact(
            'get_faq',                
            ));
        else:
            toast('faq introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_faq($id)
    {
        $show_faq = faqs::findOrFail($id);

        if(isset($show_faq)):
            return view('pages.admin.faq', compact('show_faq' ));
        endif;

    }

    public function update_faq(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $update_faq = faqs::findOrFail($id);

        $update_faq->titre = $request->titre;
        $update_faq->description = $request->description;

        if($update_faq->save()):
            Alert_message::success();
            return redirect()->route('faq');
        endif;
    }

    public function destroy_faq($id)
    {
        if(faqs::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////////////////////////////////////// CGU //////////////////////////////////////////////////////

    public function add_cgu(Request $request)
    {
        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $add_cgu = new cgus;
        $add_cgu->titre = $request->titre;
        $add_cgu->description = $request->description;

        if($add_cgu->save()):
            Alert_message::success();
            return back();
        endif;
    }

    public function edit_cgu($id)
    {
        $get_cgu = cgus::findOrFail($id);
        
        if (isset($get_cgu)):
            return view('pages.admin.cgu', compact(
            'get_cgu',                
            ));
        else:
            toast('cgu introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_cgu($id)
    {
        $show_cgu = cgus::findOrFail($id);

        if(isset($show_cgu)):
            return view('pages.admin.cgu', compact('show_cgu' ));
        endif;

    }

    public function update_cgu(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $update_cgu = cgus::findOrFail($id);

        $update_cgu->titre = $request->titre;
        $update_cgu->description = $request->description;

        if($update_cgu->save()):
            Alert_message::success();
            return redirect()->route('cgu');
        endif;
    }

    public function destroy_cgu($id)
    {
        if(cgus::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }


    ////////////////////////////////////////// CGU //////////////////////////////////////////////////////

    public function add_mention(Request $request)
    {
        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $add_mention = new mentions;
        $add_mention->titre = $request->titre;
        $add_mention->description = $request->description;

        if($add_mention->save()):
            Alert_message::success();
            return back();
        endif;
    }

    public function edit_mention($id)
    {
        $get_mention = mentions::findOrFail($id);
        
        if (isset($get_mention)):
            return view('pages.admin.mention', compact(
            'get_mention',                
            ));
        else:
            toast('mention introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_mention($id)
    {
        $show_mention = mentions::findOrFail($id);

        if(isset($show_mention)):
            return view('pages.admin.mention', compact('show_mention' ));
        endif;

    }

    public function update_mention(Request $request , $id)
    {

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        $update_mention = mentions::findOrFail($id);

        $update_mention->titre = $request->titre;
        $update_mention->description = $request->description;

        if($update_mention->save()):
            Alert_message::success();
            return redirect()->route('mention');
        endif;
    }

    public function destroy_mention($id)
    {
        if(mentions::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    ////////////////////////////////////////// BIOGRAPHIES //////////////////////////////////////////////////////

    public function add_biographie(Request $request)
    {
        if (empty($request->image)):
            toast('Le champ image est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->nom)):
            toast('Le champ nom est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="biographie".time() .'.'.$extension;

            if($filename):

                $file->move('media/biographie', $filename);
            else:
                toast('image non enregistré','error');
                return back();
            endif;

            $path = "media/biographie/";

            $add_biographie = new Bibiographies;
            $add_biographie->image = URL::to('').'/'.$path.$filename;
            $add_biographie->description = $request->description;
            $add_biographie->titre = $request->titre;
            $add_biographie->nom = $request->nom;

            if($add_biographie->save()):
                Alert_message::success();
                return back();
            endif;
        endif;
    }

    public function edit_biographie($id)
    {
        $get_biographie = Bibiographies::findOrFail($id);
        
        if (isset($get_biographie)):
            return view('pages.admin.bibiographie', compact(
            'get_biographie',
                
            ));
        else:
            toast('biographie introuvable', 'error');
            return back() ;
        endif;
    }

    public function show_biographie($id)
    {
        $show_biographie = Bibiographies::findOrFail($id);

        if(isset($show_biographie)):
            return view('pages.admin.bibiographie', compact('show_biographie' ));
        endif;

    }

    public function update_biographie(Request $request , $id)
    {
        if (empty($request->titre)):
            toast('Le champ titre est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->nom)):
            toast('Le champ nom est obligatoire', 'error');
            return back();
        endif;

        if (empty($request->description)):
            toast('Le champ description est obligatoire', 'error');
            return back();
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $extension =  $file->getClientOriginalExtension();

            $filename ="biographie".time() .'.'.$extension;

            if($filename):

                $file->move('media/biographie', $filename);
            else:
                toast('Image non enregistré','error');
                return back();
            endif;

            $path = "media/biographie/";

            $update_biographie =  Bibiographies::findOrFail($id);

            $update_biographie->image = URL::to('').'/'.$path.$filename;
            $update_biographie->description = $request->description;
            $update_biographie->titre = $request->titre;
            $update_biographie->nom = $request->nom;

            if($update_biographie->save()):
                Alert_message::success();
                return redirect()->route('biographie');
            endif;
        else:
            $update_biographie = Bibiographies::findOrFail($id);

            $update_biographie->description = $request->description;
            $update_biographie->titre = $request->titre;
            $update_biographie->nom = $request->nom;

            if($update_biographie->save()):
                Alert_message::success();
                return redirect()->route('biographie');
            endif;
        endif;        
    }

    public function destroy_biographie($id)
    {
        if(Bibiographies::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }



    ////////////////////////////////////////// CONTACTS //////////////////////////////////////////////////////

    public function show_contacts($id)
    {
        $show_contact = Contacts::findOrFail($id);

        if(isset($show_contact)):
            return view('pages.admin.contact', compact('show_contact' ));
        endif;
    }

    public function destroy_contacts($id)
    {
        if(Contacts::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }
}

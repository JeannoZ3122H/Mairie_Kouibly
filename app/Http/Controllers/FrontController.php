<?php

namespace App\Http\Controllers;

use App\Models\Maires;
use App\Models\actions;
use App\Models\Documents;
use App\Models\Actualites;
use App\Models\Arrah_bref;
use App\Models\Techniques;
use App\Models\Conseillers;
use App\Models\Secretariat;
use App\Models\Municipalite;
use Illuminate\Http\Request;
use App\Models\Lieu_livraison;
use App\Services\Alert_message;
use Illuminate\Support\Facades\DB;
use App\Models\Administratif_financiers;
use App\Models\Agenda;
use App\Models\Bibiographies;
use App\Models\cgus;
use App\Models\Decouverte;
use App\Models\faqs;
use App\Models\Financier;
use App\Models\mentions;
use App\Models\Presse;
use App\Models\Socio_cult;
use App\Models\Technique;
use phpDocumentor\Reflection\Types\Null_;
use RealRashid\SweetAlert\Facades\Alert;

class FrontController extends Controller
{

    public function index()
    {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $nombre_documents = DB::table('demandes')
        ->join('documents','demandes.document_id','=','documents.id')
        ->selectRaw('count(demandes.document_id) as total_documents, documents.name')
        ->groupBy('demandes.document_id')
        ->get();
        //dd($certificat_doc); die();

        $news = DB::table('actualites')
        ->orderBy('created_at', 'ASC')
        ->paginate(3);

        $extrait = Documents::where('name','EXTRAIT DE NAISSANCE')->first();

        $biographies = Bibiographies::all();

        return view('pages.frontend.frontend', compact(
            'liste_documents',
            'extrait',
            'nombre_documents',
            'news',
            'biographies',
        ));
    }


    public function verify_demande() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        return view('pages.frontend.verifiy_demande', compact('liste_documents'));
    }


    /////////////////////////// EXTRAIT DE NAISSANCE /////////////////////////////////

    public function verify_numero(Request $request){
        if(empty($request->q)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        $req = $request->q;

        $document_id = $request->document_id;

        $get_response = DB::table('demandes')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();

        $get_response_vie = DB::table('certificat_vies')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();

        //dd($get_response_vie); die();

        $get_response_deces = DB::table('certificat_deces')
        ->where('num_declarant',$req)
        ->where('document_id',$document_id)
        ->first();

        $get_response_auto = DB::table('autorisation_parentales')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();

        $get_response_attes = DB::table('attestation_prise_charges')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();

        $get_response_heberg = DB::table('certificat_hebergs')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();

        $get_response_decla = DB::table('declaration_procus')
        ->where('num_demandeur',$req)
        ->where('document_id',$document_id)
        ->first();


        if($get_response != Null):

            if($get_response->status_debut_traitement == 1 && $get_response->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response->status_debut_traitement == 0 && $get_response->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response->status_debut_traitement == 1 && $get_response->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_vie != Null):

            if($get_response_vie->status_debut_traitement == 1 && $get_response_vie->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_vie->status_debut_traitement == 0 && $get_response_vie->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_vie->status_debut_traitement == 1 && $get_response_vie->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_deces != Null):

            if($get_response_deces->status_debut_traitement == 1 && $get_response_deces->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_deces->status_debut_traitement == 0 && $get_response_deces->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_deces->status_debut_traitement == 1 && $get_response_deces->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_auto != Null):

            if($get_response_auto->status_debut_traitement == 1 && $get_response_auto->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_auto->status_debut_traitement == 0 && $get_response_auto->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_auto->status_debut_traitement == 1 && $get_response_auto->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_attes != Null):

            if($get_response_attes->status_debut_traitement == 1 && $get_response_attes->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_attes->status_debut_traitement == 0 && $get_response_attes->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_attes->status_debut_traitement == 1 && $get_response_attes->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_heberg != Null):

            if($get_response_heberg->status_debut_traitement == 1 && $get_response_heberg->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_heberg->status_debut_traitement == 0 && $get_response_heberg->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_heberg->status_debut_traitement == 1 && $get_response_heberg->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;

        elseif($get_response_decla != Null):

            if($get_response_decla->status_debut_traitement == 1 && $get_response_decla->status_livrable == 1):
                Alert::success('Vérification de demande de document','Votre document a été traité avec succès ! Vous pouvez passer le recupérer');
                return back();
            elseif($get_response_decla->status_debut_traitement == 0 && $get_response_decla->status_livrable == 0):
                Alert::warning('Vérification de demande de document','Aucune action sur ce document');
                return back();
            elseif($get_response_decla->status_debut_traitement == 1 && $get_response_decla->status_livrable == 0):
                Alert::info('Vérification de demande de document','Votre document est en cours de traitement traité');
                return back();
            endif;
        elseif($get_response = $get_response_vie = $get_response_deces = $get_response_auto = $get_response_attes = $get_response_heberg = $get_response_decla == Null):
            Alert::error('Vérification de demande de document','Votre numéro est introuvable ! Veillez utiliser votre numéro de demande de document');
            return back();
        endif;
    }

    public function demande_documents($rfk) {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $get_all_lieu_livraison = Lieu_livraison::all();
        $montant_timbre = DB::table('timbres')->value('montant');

        return view('pages.frontend.demande_document' , compact(
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison',
            'montant_timbre'
        ));
    }

    public function document_admin_front()
    {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        return view('pages.frontend.document_admin_front', compact('liste_documents'));
    }

    public function history() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $maire = Maires::all();

        return view('pages.frontend.history', compact('liste_documents','maire'));
    }

    public function advisers() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $conseillers = Conseillers::all();
        return view('pages.frontend.conseillers', compact('liste_documents','conseillers'));

    }
    
    public function municipalite() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $municipalite = Municipalite::all();
        return view('pages.frontend.municipalite', compact('liste_documents','municipalite'));

    }

    public function secretariat_general() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $secretariat = Secretariat::all();

        return view('pages.frontend.secretariat_general', compact('liste_documents','secretariat'));
    }

    public function administratif_financier() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $administratif_financier = Administratif_financiers::all();

        return view('pages.frontend.administratif_financier', compact('liste_documents','administratif_financier'));
    }

    public function financier_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $financier = Financier::all();

        return view('pages.frontend.financier_front', compact('liste_documents','financier'));
    }

    public function technique_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $technique = Technique::all();

        return view('pages.frontend.technique_front', compact('liste_documents','technique'));
    }

    public function socio_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $socio = Socio_cult::all();

        return view('pages.frontend.socio_front', compact('liste_documents','socio'));
    }

    public function news() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $news = Actualites::paginate(15);

        if(isset($news)):
            return view('pages.frontend.actualite', compact('liste_documents','news'));
        endif;
    }

    public function show_details($id) {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $show_details = Actualites::findOrFail($id);

        if(isset($show_details)):
            return view('pages.frontend.details_actualite', compact('liste_documents','show_details' ));
        endif;
    }

    public function agenda_front() {

        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $agendas = Agenda::paginate(15);
        return view('pages.frontend.agenda_front', compact('liste_documents','agendas'));
    }

    public function decouverte_front() {

        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $decouvertes = Decouverte::paginate(15);
        return view('pages.frontend.decouverte_front', compact('liste_documents','decouvertes'));
    }

    public function details_decouverte($id) {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $details_decouverte = Decouverte::findOrFail($id);

        if(isset($details_decouverte)):
            return view('pages.frontend.details_decouverte', compact('liste_documents','details_decouverte' ));
        endif;
    }

    public function presse_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $presse = Presse::paginate(15);
        return view('pages.frontend.presse_front', compact('liste_documents','presse'));
    }

    public function faq_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $faqs = faqs::paginate(15);
        return view('pages.frontend.faq_front', compact('liste_documents','faqs'));
    }

    public function cgu_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $cgus = cgus::paginate(15);
        return view('pages.frontend.cgu_front', compact('liste_documents','cgus'));
    }

    public function mention_front() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $mentions = mentions::paginate(15);
        return view('pages.frontend.mention_front', compact('liste_documents','mentions'));
    }
}

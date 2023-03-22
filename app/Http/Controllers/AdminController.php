<?php

namespace App\Http\Controllers;

use App\Models\Maires;
use App\Models\actions;
use App\Models\Contacts;
use App\Models\Demandes;
use App\Models\Documents;
use App\Models\Actualites;
use App\Models\Conseillers;
use App\Models\Secretariat;
use App\Models\Municipalite;
use Illuminate\Http\Request;
use App\Models\Lieu_livraison;
use App\Services\Alert_message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Administratif_financiers;
use App\Models\Agenda;
use App\Models\Attestation_prise_charge;
use App\Models\Autorisation_parentale;
use App\Models\Bibiographies;
use App\Models\Certificat_deces;
use App\Models\Certificat_heberg;
use App\Models\Certificat_vie;
use App\Models\cgus;
use App\Models\Declaration_procu;
use App\Models\Decouverte;
use App\Models\faqs;
use App\Models\Financier;
use App\Models\mentions;
use App\Models\Presse;
use App\Models\Socio_cult;
use App\Models\Technique;
use App\Models\Timbre;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function admin()
    {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $role = Session::get('role');
        
        $documents_extrait = DB::table('demandes')
        ->join('documents','demandes.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as extrait')
        ->where('documents.name','EXTRAIT D\'ACTE DE NAISSANCE')
        ->first();

        $documents_vie = DB::table('certificat_vies')
        ->join('documents','certificat_vies.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as vie')
        ->where('documents.name','CERTIFICAT DE VIE')
        ->first();

        $documents_deces = DB::table('certificat_deces')
        ->join('documents','certificat_deces.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as deces')
        ->where('documents.name','CERTIFICAT DE DECES')
        ->first();

        $documents_aut_par = DB::table('autorisation_parentales')
        ->join('documents','autorisation_parentales.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as auto')
        ->where('documents.name','AUTORISATION PARENTALE')
        ->first();

        $documents_cert_heberg = DB::table('certificat_hebergs')
        ->join('documents','certificat_hebergs.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as heberg')
        ->where('documents.name',"CERTIFICAT D'HEBERGEMENT ")
        ->first();

        $documents_attes_charg = DB::table('attestation_prise_charges')
        ->join('documents','attestation_prise_charges.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as attes')
        ->where('documents.name','ATTESTATION DE PRISE EN CHARGE')
        ->first();

        $documents_decl_pro = DB::table('declaration_procus')
        ->join('documents','declaration_procus.document_id','=','documents.id')
        ->selectRaw('count(*) as total_documents, documents.name as decla')
        ->where('documents.name','DECLARATION DE POUVOIR OU PROCURATION')
        ->first();


        $all_documents = [
            ['name' => $documents_extrait->extrait, 'value' => $documents_extrait->total_documents],
            ['name' => $documents_vie->vie, 'value' => $documents_vie->total_documents],
            ['name' => $documents_deces->deces, 'value' => $documents_deces->total_documents],
            ['name' => $documents_aut_par->auto, 'value' => $documents_aut_par->total_documents],
            ['name' => $documents_cert_heberg->heberg, 'value' => $documents_aut_par->total_documents],
            ['name' => $documents_attes_charg->attes, 'value' => $documents_attes_charg->total_documents],
            ['name' => $documents_decl_pro->decla, 'value' => $documents_decl_pro->total_documents],
        ];

        //dd($all_documents); die();
        return view('pages.admin.index', compact('liste_documents','role','all_documents'));
    }
    
    public function documents($rfk) {
        
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $role = Session::get('role');

        $documents = Documents::all();
        
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();


        /////////////////////////// DEMANDES EXTRAIT DE NAISSANCE ///////////////////////////////////

        $get_document_types = DB::table('demandes')
        ->where('document_id',$documents_info->id)
        ->get();

        $get_document_types_vie = DB::table('certificat_vies')
        ->where('document_id',$documents_info->id)
        ->get();
        

        $get_document_types_deces = DB::table('certificat_deces')
        ->where('document_id',$documents_info->id)
        ->get();

        $get_document_types_aut_par = DB::table('autorisation_parentales')
        ->where('document_id',$documents_info->id)
        ->get();

        $get_document_types_cert_heberg = DB::table('certificat_hebergs')
        ->where('document_id',$documents_info->id)
        ->get();

        $get_document_types_decl_pro = DB::table('declaration_procus')
        ->where('document_id',$documents_info->id)
        ->get();

        $get_document_types_attes_char = DB::table('attestation_prise_charges')
        ->where('document_id',$documents_info->id)
        ->get();
        
        if(count($get_document_types) > 0):
            $get_document_type = DB::table('demandes')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type',
                'role'
            ));
        elseif(count($get_document_types_vie) > 0): 
            $get_document_type_v = DB::table('certificat_vies')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_v',
                'role'
            ));
        elseif(count($get_document_types_deces) > 0):
            $get_document_type_d = DB::table('certificat_deces')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_d',
                'role'
            ));
        elseif(count($get_document_types_aut_par) > 0):
            $get_document_type_ap = DB::table('autorisation_parentales')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_ap',
                'role'
            ));
        elseif(count($get_document_types_cert_heberg) > 0):
            $get_document_type_ch = DB::table('certificat_hebergs')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_ch',
                'role'
            ));
        elseif(count($get_document_types_decl_pro) > 0):
            $get_document_type_dp = DB::table('declaration_procus')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_dp',
                'role'
            )); 
        elseif(count($get_document_types_attes_char) > 0):
            $get_document_type_ac = DB::table('attestation_prise_charges')
            ->where('document_id',$documents_info->id)
            ->paginate(10);
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'get_document_type_ac',
                'role'
            ));    
        else:
            $not_found = 1;
            return view('pages.admin.document' , compact(
                'documents_info',
                'liste_documents',
                'not_found',
                'role'
            ));
        endif;    

    } 


    //////////////////////////// EXTRAIT DE NAISSANCE ///////////////////////////////
    public function documents_edit($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info= Demandes::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details',compact(
            'data_info',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete($id)
    {
        if(Demandes::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    //////////////////////////// CERTIFICAT DE VIE ///////////////////////////////
    public function documents_edit_vie($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_vie = Certificat_vie::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_vie',compact(
            'data_info_cert_vie',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_vie($id)
    {
        if(Certificat_vie::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    //////////////////////////// CERTIFICAT DE DECES ///////////////////////////////

    public function documents_edit_deces($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_deces = Certificat_deces::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_deces',compact(
            'data_info_cert_deces',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_deces($id)
    {
        if(Certificat_deces::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    
    //////////////////////////// AUTORISATION PARENTALE ///////////////////////////////

    public function documents_edit_aut_par($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_auto_par = Autorisation_parentale::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_auto',compact(
            'data_info_auto_par',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_aut_par($id)
    {
        if(Autorisation_parentale::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    //////////////////////////// ATTESTATION DE PRISE EN CHARGE ///////////////////////////////

    public function documents_edit_attes_charg($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_attes_charg = Attestation_prise_charge::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_attes',compact(
            'data_info_attes_charg',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_attes_charg($id)
    {
        if(Attestation_prise_charge::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    //////////////////////////// CERTIFICAT D'HEBERGEMENT ///////////////////////////////

    public function documents_edit_cert_heberg($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_heberg = Certificat_heberg::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_heberg',compact(
            'data_info_cert_heberg',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_cert_heberg($id)
    {
        if(Certificat_heberg::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }

    //////////////////////////// DECLARATION OU PROCURATION ///////////////////////////////

    public function documents_edit_decl_pro($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_decl_pro = Declaration_procu::findOrFail($data);

        $keys = ['ID' => $data, 'key' => $rfk];
        
        return view('pages.admin.details_decla',compact(
            'data_info_cert_decl_pro',
            'documents_info',
            'keys',
            'liste_documents',
            
        ));
    }

    public function documents_delete_decl_pro($id)
    {
        if(Declaration_procu::destroy($id)):
            Alert_message::success();
            return back();
        else:
            Alert_message::toast_warning();
            return back();;
        endif;
    }
    ////////////////////////////////// EXTRAIT DE NAISSANCE ///////////////////////////////////////
    public function documents_processing($data, $rfk) {


        $processing = DB::table('demandes')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end($data, $rfk) {


        $processing = DB::table('demandes')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing($data, $rfk) {


        $processing = DB::table('demandes')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    ////////////////////////////////// CERTIFICAT DE VIE ///////////////////////////////////////

    public function documents_processing_vie($data, $rfk) {


        $processing = DB::table('certificat_vies')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_vie($data, $rfk) {


        $processing = DB::table('certificat_vies')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_vie($data, $rfk) {

        $processing = DB::table('certificat_vies')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }


    ////////////////////////////////// CERTIFICAT DE DECES ///////////////////////////////////////

    public function documents_processing_deces($data, $rfk) {


        $processing = DB::table('certificat_deces')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_deces($data, $rfk) {


        $processing = DB::table('certificat_deces')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_deces($data, $rfk) {

        $processing = DB::table('certificat_deces')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    ////////////////////////////////// AUTORISATION PARENTALE ///////////////////////////////////////

    public function documents_processing_auto($data, $rfk) {


        $processing = DB::table('autorisation_parentales')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_auto($data, $rfk) {


        $processing = DB::table('autorisation_parentales')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_auto($data, $rfk) {

        $processing = DB::table('autorisation_parentales')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }


    ////////////////////////////////// ATTESTATION DE PRISE EN CHARGE ///////////////////////////////////////

    public function documents_processing_attes($data, $rfk) {


        $processing = DB::table('attestation_prise_charges')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_attes($data, $rfk) {


        $processing = DB::table('attestation_prise_charges')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_attes($data, $rfk) {

        $processing = DB::table('attestation_prise_charges')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }



    ////////////////////////////////// CERTIFICAT D' HEBERGEMENT///////////////////////////////////////

    public function documents_processing_heberg($data, $rfk) {


        $processing = DB::table('certificat_hebergs')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_heberg($data, $rfk) {


        $processing = DB::table('certificat_hebergs')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_heberg($data, $rfk) {

        $processing = DB::table('certificat_hebergs')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }


    ////////////////////////////////// DECLARATION DE POUVOIR OU PROCURATION ///////////////////////////////////////

    public function documents_processing_decl($data, $rfk) {


        $processing = DB::table('declaration_procus')->where('id',$data)
        ->update(['status_debut_traitement' => 1]);

        if($processing):
            Alert_message::isProcessing();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_end_decl($data, $rfk) {


        $processing = DB::table('declaration_procus')->where('id',$data)
        ->update(['status_fin_traitement' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }

    public function processing_publishing_decl($data, $rfk) {

        $processing = DB::table('declaration_procus')->where('id',$data)
        ->update(['status_livrable' => 1]);

        if($processing):
            Alert_message::isProcessingterm();
            return redirect()->route('documents',$rfk);
        endif;
    }
    

    public function document_admin() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $documents = Documents::paginate(10);
        return view('pages.admin.document_admin', compact('documents','liste_documents'));
    }

    public function timbres() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $timbres = Timbre::paginate(10);
        return view('pages.admin.timbre', compact('timbres','liste_documents'));
    }


    public function lieu_livraison() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $lieu_livraison = Lieu_livraison::paginate(10);
        return view('pages.admin.lieu_livraison', compact('lieu_livraison','liste_documents'));
    }

    public function actualite() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $actualites = Actualites::paginate(10);

        return view('pages.admin.actualite' , compact('liste_documents', 'actualites'));
    }

    public function maire() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $maires = Maires::paginate(10);

        return view('pages.admin.maire' , compact('liste_documents', 'maires'));
    }

    public function conseillers() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $conseiller = Conseillers::all();
        return view('pages.admin.conseiller', compact('liste_documents', 'conseiller'));
    }

    public function municipalite() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $municipalite = Municipalite::all();
        return view('pages.admin.municipalite', compact('liste_documents', 'municipalite'));
    }

    public function secretariat() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $secretariat = Secretariat::all();
        return view('pages.admin.secretariat', compact('liste_documents', 'secretariat'));
    }

    public function ad_financier() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $ad_financier = Administratif_financiers::all();
        return view('pages.admin.ad_financier', compact('liste_documents', 'ad_financier'));
    }

    public function contacts() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $contacts = Contacts::paginate(10);

        return view('pages.admin.contact' , compact('liste_documents', 'contacts'));
    }

    public function history() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();
        
        return view('pages.admin.history', compact('liste_documents'));
    }

    public function agenda() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $agenda = Agenda::all();
        return view('pages.admin.agenda', compact('liste_documents', 'agenda'));
    }

    public function financier() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $financier = Financier::all();
        return view('pages.admin.financier', compact('liste_documents', 'financier'));
    }

    public function technique() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $techniques = Technique::all();
        return view('pages.admin.technique', compact('liste_documents', 'techniques'));
    }

    public function socio_cult() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $sociaux = Socio_cult::all();
        return view('pages.admin.socio', compact('liste_documents', 'sociaux'));
    }

    public function decouverte() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $decouverte = Decouverte::all();
        return view('pages.admin.decouverte', compact('liste_documents', 'decouverte'));
    }

    public function presse() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $presses = Presse::all();

        return view('pages.admin.presse', compact('liste_documents', 'presses'));
    }

    public function faq() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $faq = faqs::all();

        return view('pages.admin.faq', compact('liste_documents', 'faq'));
    }

    public function cgu() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $cgu = cgus::all();

        return view('pages.admin.cgu', compact('liste_documents', 'cgu'));
    }

    public function mention() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $mention = mentions::all();

        return view('pages.admin.mention', compact('liste_documents', 'mention'));
    }

    public function biographie() {
        $liste_documents = DB::table('documents')
        ->orderBy('name', 'ASC')
        ->get();

        $biographie = Bibiographies::all();

        return view('pages.admin.bibiographie', compact('liste_documents', 'biographie'));
    }
}

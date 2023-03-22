<?php

namespace App\Http\Controllers;

use App\Models\Demandes;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\Certificat_vie;
use App\Models\Lieu_livraison;
use App\Services\Alert_message;
use App\Models\Certificat_deces;
use App\Models\Certificat_heberg;
use App\Models\Declaration_procu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Autorisation_parentale;
use App\Models\Attestation_prise_charge;

class DemandesController extends Controller
{
    ////////////////////// EXTRAIT DE NAISSANCE ////////////////////////

    public function add_extrait(Request $request) 
    {
        if(empty($request->num_extrait)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_extrait = new Demandes;

            $add_extrait->document_id = $request->document_id;
            $add_extrait->full_name = $request->full_name;
            $add_extrait->num_extrait = $request->num_extrait;
            $add_extrait->email_demandeur = $request->email_demandeur;
            $add_extrait->num_demandeur = $request->num_demandeur;
            $add_extrait->nbre_copie = $request->nombre_copie;
            $add_extrait->adresse_livraison = $request->adresse_livraison;
            $add_extrait->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_extrait->montant_livraison = 0;
                $add_extrait->lieu_livraison = NULL;

            else:
                $add_extrait->montant_livraison = $get_lieu_livraison->montant;
                $add_extrait->lieu_livraison = $request->lieu_livraison;

            endif;
        
            if($add_extrait->save()):

                Alert_message::success();

                $data = $add_extrait->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_extr',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="extrait".$request->num_extrait . '.'.$extension;

                if($filename):

                    $file->move('media/extrait', $filename);
                else:
                    toast('extrait non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/extrait/";
                $add_extrait = new Demandes;

                $add_extrait->document_id = $request->document_id;
                $add_extrait->num_extrait = $request->num_extrait;
                $add_extrait->email_demandeur = $request->email_demandeur;
                $add_extrait->num_demandeur = $request->num_demandeur;
                $add_extrait->nbre_copie = $request->nombre_copie;
                $add_extrait->adresse_livraison = $request->adresse_livraison;
                $add_extrait->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_extrait->montant_livraison = 0;
                    $add_extrait->lieu_livraison = NULL;
    
                else:
                    $add_extrait->montant_livraison = $get_lieu_livraison->montant;
                    $add_extrait->lieu_livraison = $request->lieu_livraison;
    
                endif;
                $add_extrait->file_url = URL::to('').'/'.$path.$filename;

                if($add_extrait->save()):

                    Alert_message::success();

                    $data = $add_extrait->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_extr',compact('data', 'rfk'));
                endif;
            endif;
        endif;



    }
    
    public function demande_documents_recap_extr($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info = DB::table('demandes')->where('id', $data)->first();
        return view('pages.frontend.demande_document_recap_extr',compact(
            'data_info',
            'documents_info',
            'liste_documents',
        ));
    }

    public function demande_documents_edit_extr($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info = DB::table('demandes')->where('id', $data)->first();
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_extr(Request $request, $data)
    {
        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_extrait)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $update_extrait =  Demandes::findOrFail($data);


            $update_extrait->document_id = $request->document_id;
            $update_extrait->full_name = $request->full_name;
            $update_extrait->num_extrait = $request->num_extrait;
            $update_extrait->email_demandeur = $request->email_demandeur;
            $update_extrait->num_demandeur = $request->num_demandeur;
            $update_extrait->nbre_copie = $request->nombre_copie;
            $update_extrait->adresse_livraison = $request->adresse_livraison;
            $update_extrait->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_extrait->montant_livraison = 0;
                $update_extrait->lieu_livraison = NULL;

            else:
                $update_extrait->montant_livraison = $get_lieu_livraison->montant;
                $update_extrait->lieu_livraison = $request->lieu_livraison;

            endif;
        
            if($update_extrait->save()):

                Alert_message::success();

                $data = $update_extrait->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_extr',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="extrait".$request->num_extrait . '.'.$extension;

                if($filename):

                    $file->move('media/extrait', $filename);
                else:
                    toast('extrait non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/extrait/";
                $update_extrait = Demandes::findOrFail($data);


                $update_extrait->document_id = $request->document_id;
                $update_extrait->full_name = $request->full_name;
                $update_extrait->num_extrait = $request->num_extrait;
                $update_extrait->email_demandeur = $request->email_demandeur;
                $update_extrait->num_demandeur = $request->num_demandeur;
                $update_extrait->nbre_copie = $request->nombre_copie;
                $update_extrait->adresse_livraison = $request->adresse_livraison;
                $update_extrait->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_extrait->montant_livraison = 0;
                    $update_extrait->lieu_livraison = NULL;
    
                else:
                    $update_extrait->montant_livraison = $get_lieu_livraison->montant;
                    $update_extrait->lieu_livraison = $request->lieu_livraison;
    
                endif;
                $update_extrait->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_extrait->save()):

                    Alert_message::success();
    
                    $data = $update_extrait->id;
                    $rfk = $request->document_rfk;
    
                    return redirect()->route('demande_documents_recap_extr',compact('data', 'rfk'));
                endif;
            endif;
        endif;

    }

    ////////////////////// CERTIFICAT DE VIE ////////////////////////

    public function add_certificat_vie(Request $request) 
    {
        //dd($request->all()); die();
        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $add_certificat_vie = new Certificat_vie;

            $add_certificat_vie->document_id = $request->document_id;
            $add_certificat_vie->full_name = $request->full_name;
            $add_certificat_vie->profession = $request->profession;
            $add_certificat_vie->lieu_naissance = $request->lieu_naissance;
            $add_certificat_vie->date_naissance = $request->date_naissance;
            $add_certificat_vie->domicile = $request->domicile;
            $add_certificat_vie->name_pere = $request->name_pere;
            $add_certificat_vie->name_mere = $request->name_mere;
            $add_certificat_vie->name_demandeur = $request->name_demandeur;
            $add_certificat_vie->email_demandeur = $request->email_demandeur;
            $add_certificat_vie->num_demandeur = $request->num_demandeur;
            $add_certificat_vie->nbre_copie = $request->nombre_copie;
            $add_certificat_vie->adresse_livraison = $request->adresse_livraison;
            $add_certificat_vie->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_certificat_vie->montant_livraison = 0;
                $add_certificat_vie->lieu_livraison = NULL;
            else:
                $add_certificat_vie->montant_livraison = $get_lieu_livraison->montant;
                $add_certificat_vie->lieu_livraison = $request->lieu_livraison;
            endif;
        
            if($add_certificat_vie->save()):

                Alert_message::success();

                $data = $add_certificat_vie->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_vie".time(). '.'.$extension;

                if($filename):
                    $file->move('media/certificat_vie', $filename);
                else:
                    toast('certificat de vie non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/certificat_vie/";
                $add_certificat_vie = new Certificat_vie;

                $add_certificat_vie->document_id = $request->document_id;
                $add_certificat_vie->full_name = $request->full_name;
                $add_certificat_vie->profession = $request->profession;
                $add_certificat_vie->lieu_naissance = $request->lieu_naissance;
                $add_certificat_vie->date_naissance = $request->date_naissance;
                $add_certificat_vie->domicile = $request->domicile;
                $add_certificat_vie->name_pere = $request->name_pere;
                $add_certificat_vie->name_mere = $request->name_mere;
                $add_certificat_vie->name_demandeur = $request->name_demandeur;
                $add_certificat_vie->email_demandeur = $request->email_demandeur;
                $add_certificat_vie->num_demandeur = $request->num_demandeur;
                $add_certificat_vie->nombre_copie = $request->nombre_copie;
                $add_certificat_vie->adresse_livraison = $request->adresse_livraison;
                $add_certificat_vie->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_certificat_vie->montant_livraison = 0;
                    $add_certificat_vie->lieu_livraison = NULL;    
                else:
                    $add_certificat_vie->montant_livraison = $get_lieu_livraison->montant;
                    $add_certificat_vie->lieu_livraison = $request->lieu_livraison;    
                endif;
                $add_certificat_vie->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_certificat_vie->save()):

                    Alert_message::success();

                    $data = $add_certificat_vie->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap', compact('$data', '$rfk'));
                endif;
            endif;
        endif;



    }

    public function demande_documents_recap($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_vie = DB::table('certificat_vies')->where('id', $data)->first();
        //dd($data_info_cert_vie); die();
        
        return view('pages.frontend.demande_document_recap',compact(
            'data_info_cert_vie',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_vie = Certificat_vie::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_cert_vie',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update(Request $request, $data)
    { 
        //dd($request->all()); die();

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_certificat_vie =  Certificat_vie::findOrFail($data);


            $update_certificat_vie->document_id = $request->document_id;
            $update_certificat_vie->full_name = $request->full_name;
            $update_certificat_vie->profession = $request->profession;
            $update_certificat_vie->lieu_naissance = $request->lieu_naissance;
            $update_certificat_vie->date_naissance = $request->date_naissance;
            $update_certificat_vie->domicile = $request->domicile;
            $update_certificat_vie->name_pere = $request->name_pere;
            $update_certificat_vie->name_mere = $request->name_mere;
            $update_certificat_vie->name_demandeur = $request->name_demandeur;
            $update_certificat_vie->email_demandeur = $request->email_demandeur;
            $update_certificat_vie->num_demandeur = $request->num_demandeur;
            $update_certificat_vie->nbre_copie = $request->nombre_copie;
            $update_certificat_vie->adresse_livraison = $request->adresse_livraison;
            $update_certificat_vie->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_certificat_vie->montant_livraison = 0;
                $update_certificat_vie->lieu_livraison = NULL;
            else:
                $update_certificat_vie->montant_livraison = $get_lieu_livraison->montant;
                $update_certificat_vie->lieu_livraison = $request->lieu_livraison;

            endif;
        
            //dd($add_extrait); die();

            if($update_certificat_vie->save()):

                Alert_message::success();

                $data = $update_certificat_vie->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_vie".time(). '.'.$extension;

                if($filename):

                    $file->move('media/certificat_vie', $filename);
                else:
                    toast('certificat de vie non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/certificat_vie/";
                $update_certificat_vie = Certificat_vie::findOrFail($data);


                $update_certificat_vie->document_id = $request->document_id;
                $update_certificat_vie->full_name = $request->full_name;
                $update_certificat_vie->profession = $request->profession;
                $update_certificat_vie->lieu_naissance = $request->lieu_naissance;
                $update_certificat_vie->date_naissance = $request->date_naissance;
                $update_certificat_vie->domicile = $request->domicile;
                $update_certificat_vie->name_pere = $request->name_pere;
                $update_certificat_vie->name_mere = $request->name_mere;
                $update_certificat_vie->name_demandeur = $request->name_demandeur;
                $update_certificat_vie->email_demandeur = $request->email_demandeur;
                $update_certificat_vie->num_demandeur = $request->num_demandeur;
                $update_certificat_vie->nbre_copie = $request->nombre_copie;
                $update_certificat_vie->adresse_livraison = $request->adresse_livraison;
                $update_certificat_vie->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_certificat_vie->montant_livraison = 0;
                    $update_certificat_vie->lieu_livraison = NULL;
                else:
                    $update_certificat_vie->montant_livraison = $get_lieu_livraison->montant;
                    $update_certificat_vie->lieu_livraison = $request->lieu_livraison;    
                endif;

                $update_certificat_vie->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_certificat_vie->save()):
                    Alert_message::success();

                    $data = $update_certificat_vie->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap',compact('data', 'rfk'));
                endif;
            endif;
        endif;

    }


    ////////////////////// CERTIFICAT DE DECES ////////////////////////

    public function add_certificat_deces(Request $request) 
    {
        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession_defunt)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_deces)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_deces)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_declarant)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_declarant)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_certificat_deces = new Certificat_deces;

            $add_certificat_deces->document_id = $request->document_id;
            $add_certificat_deces->full_name = $request->full_name;
            $add_certificat_deces->profession_defunt = $request->profession_defunt;
            $add_certificat_deces->lieu_naissance = $request->lieu_naissance;
            $add_certificat_deces->date_deces = $request->date_deces;
            $add_certificat_deces->lieu_deces = $request->lieu_deces;
            $add_certificat_deces->name_pere = $request->name_pere;
            $add_certificat_deces->domicile_pere = $request->domicile_pere;
            $add_certificat_deces->name_mere = $request->name_mere;
            $add_certificat_deces->domicile_mere = $request->domicile_mere;
            $add_certificat_deces->name_declarant = $request->name_declarant;
            $add_certificat_deces->email_declarant = $request->email_declarant;
            $add_certificat_deces->num_declarant = $request->num_declarant;
            $add_certificat_deces->nbre_copie = $request->nombre_copie;
            $add_certificat_deces->adresse_livraison = $request->adresse_livraison;
            $add_certificat_deces->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_certificat_deces->montant_livraison = 0;
                $add_certificat_deces->lieu_livraison = NULL;

            else:
                $add_certificat_deces->montant_livraison = $get_lieu_livraison->montant;
                $add_certificat_deces->lieu_livraison = $request->lieu_livraison;

            endif;
        
            if($add_certificat_deces->save()):

                Alert_message::success();

                $data = $add_certificat_deces->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_deces',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_deces".time(). '.'.$extension;

                if($filename):

                    $file->move('media/certificat_deces', $filename);
                else:
                    toast('certificat de deces non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/certificat_deces/";
                $add_certificat_deces = new Certificat_deces;

                $add_certificat_deces->document_id = $request->document_id;
                $add_certificat_deces->full_name = $request->full_name;
                $add_certificat_deces->profession_defunt = $request->profession_defunt;
                $add_certificat_deces->lieu_naissance = $request->lieu_naissance;
                $add_certificat_deces->date_deces = $request->date_deces;
                $add_certificat_deces->lieu_deces = $request->lieu_deces;
                $add_certificat_deces->name_pere = $request->name_pere;
                $add_certificat_deces->domicile_pere = $request->domicile_pere;
                $add_certificat_deces->name_mere = $request->name_mere;
                $add_certificat_deces->domicile_mere = $request->domicile_mere;
                $add_certificat_deces->name_declarant = $request->name_declarant;
                $add_certificat_deces->email_declarant = $request->email_declarant;
                $add_certificat_deces->num_declarant = $request->num_declarant;
                $add_certificat_deces->nombre_copie = $request->nombre_copie;
                $add_certificat_deces->adresse_livraison = $request->adresse_livraison;
                $add_certificat_deces->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                $add_certificat_deces->lieu_livraison = $get_lieu_livraison->lieu;
                if($get_lieu_livraison == null):
                    $add_certificat_deces->montant_livraison = 0;
                    $add_certificat_deces->lieu_livraison = NULL;
    
                else:
                    $add_certificat_deces->montant_livraison = $get_lieu_livraison->montant;
                    $add_certificat_deces->lieu_livraison = $request->lieu_livraison;
    
                endif;
                $add_certificat_deces->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_certificat_deces->save()):

                    Alert_message::success();

                    $data = $add_certificat_deces->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_deces', compact('$data', '$rfk'));
                endif;
            endif;
        endif;
    }

    public function demande_documents_recap_deces($data, $rfk)
    {
        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_deces = DB::table('certificat_deces')->where('id', $data)->first();
        
        return view('pages.frontend.demande_document_recap_deces',compact(
            'data_info_cert_deces',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit_deces($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_cert_deces = Certificat_deces::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_cert_deces',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_deces(Request $request, $data)
    { 
        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession_defunt)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_deces)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_deces)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile_pere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile_mere)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->name_declarant)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_declarant)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_certificat_deces =  Certificat_deces::findOrFail($data);


            $update_certificat_deces->document_id = $request->document_id;
            $update_certificat_deces->full_name = $request->full_name;
            $update_certificat_deces->profession_defunt = $request->profession_defunt;
            $update_certificat_deces->lieu_naissance = $request->lieu_naissance;
            $update_certificat_deces->date_deces = $request->date_deces;
            $update_certificat_deces->lieu_deces = $request->lieu_deces;
            $update_certificat_deces->name_pere = $request->name_pere;
            $update_certificat_deces->domicile_pere = $request->domicile_pere;
            $update_certificat_deces->name_mere = $request->name_mere;
            $update_certificat_deces->domicile_mere = $request->domicile_mere;
            $update_certificat_deces->name_declarant = $request->name_declarant;
            $update_certificat_deces->email_declarant = $request->email_declarant;
            $update_certificat_deces->num_declarant = $request->num_declarant;
            $update_certificat_deces->nbre_copie = $request->nombre_copie;
            $update_certificat_deces->adresse_livraison = $request->adresse_livraison;
            $update_certificat_deces->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_certificat_deces->montant_livraison = 0;
                $update_certificat_deces->lieu_livraison = NULL;
            else:
                $update_certificat_deces->montant_livraison = $get_lieu_livraison->montant;
                $update_certificat_deces->lieu_livraison = $request->lieu_livraison;

            endif;
        
            //dd($add_extrait); die();

            if($update_certificat_deces->save()):

                Alert_message::success();

                $data = $update_certificat_deces->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_deces',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_deces".time(). '.'.$extension;

                if($filename):

                    $file->move('media/certificat_deces', $filename);
                else:
                    toast('certificat de deces non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/certificat_deces/";
                $update_certificat_deces = Certificat_deces::findOrFail($data);


                $update_certificat_deces->document_id = $request->document_id;
                $update_certificat_deces->full_name = $request->full_name;
                $update_certificat_deces->profession_defunt = $request->profession_defunt;
                $update_certificat_deces->lieu_naissance = $request->lieu_naissance;
                $update_certificat_deces->date_deces = $request->date_deces;
                $update_certificat_deces->lieu_deces = $request->lieu_deces;
                $update_certificat_deces->name_pere = $request->name_pere;
                $update_certificat_deces->domicile_pere = $request->domicile_pere;
                $update_certificat_deces->name_mere = $request->name_mere;
                $update_certificat_deces->domicile_mere = $request->domicile_mere;
                $update_certificat_deces->name_declarant = $request->name_declarant;
                $update_certificat_deces->email_declarant = $request->email_declarant;
                $update_certificat_deces->num_declarant = $request->num_declarant;
                $update_certificat_deces->nbre_copie = $request->nombre_copie;
                $update_certificat_deces->adresse_livraison = $request->adresse_livraison;
                $update_certificat_deces->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_certificat_deces->montant_livraison = 0;
                    $update_certificat_deces->lieu_livraison = NULL;
                else:
                    $update_certificat_deces->montant_livraison = $get_lieu_livraison->montant;
                    $update_certificat_deces->lieu_livraison = $request->lieu_livraison;
    
                endif;

                $update_certificat_deces->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_certificat_deces->save()):
                    Alert_message::success();

                    $data = $update_certificat_deces->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap_deces',compact('data', 'rfk'));
                endif;
            endif;
        endif;

    }


    ////////////////////// AUTORISATION PARENTALE ////////////////////////
    public function add_autorisation_parentale(Request $request) 
    {
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_auto_paren = new Autorisation_parentale;

            $add_auto_paren->document_id = $request->document_id;
            $add_auto_paren->name_demandeur = $request->name_demandeur;
            $add_auto_paren->email_demandeur = $request->email_demandeur;
            $add_auto_paren->num_demandeur = $request->num_demandeur;
            $add_auto_paren->full_name = $request->full_name;
            $add_auto_paren->lieu_naissance = $request->lieu_naissance;
            $add_auto_paren->date_naissance = $request->date_naissance;
            $add_auto_paren->domicile = $request->domicile;
            $add_auto_paren->profession = $request->profession;
            $add_auto_paren->nbre_copie = $request->nombre_copie;
            $add_auto_paren->adresse_livraison = $request->adresse_livraison;
            $add_auto_paren->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_auto_paren->montant_livraison = 0;
                $add_auto_paren->lieu_livraison = NULL;
            else:
                $add_auto_paren->montant_livraison = $get_lieu_livraison->montant;
                $add_auto_paren->lieu_livraison = $request->lieu_livraison;
            endif;
        
            if($add_auto_paren->save()):

                Alert_message::success();

                $data = $add_auto_paren->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_aut_pare',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="auto_parentale".time(). '.'.$extension;

                if($filename):
                    $file->move('media/auto_parentale', $filename);
                else:
                    toast('autorisation parentale non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/auto_parentale/";
                $add_auto_paren = new Autorisation_parentale;

                $add_auto_paren->document_id = $request->document_id;
                $add_auto_paren->name_demandeur = $request->name_demandeur;
                $add_auto_paren->email_demandeur = $request->email_demandeur;
                $add_auto_paren->num_demandeur = $request->num_demandeur;
                $add_auto_paren->full_name = $request->full_name;
                $add_auto_paren->lieu_naissance = $request->lieu_naissance;
                $add_auto_paren->date_naissance = $request->date_naissance;
                $add_auto_paren->domicile = $request->domicile;
                $add_auto_paren->profession = $request->profession;
                $add_auto_paren->nbre_copie = $request->nombre_copie;
                $add_auto_paren->adresse_livraison = $request->adresse_livraison;
                $add_auto_paren->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_auto_paren->montant_livraison = 0;
                    $add_auto_paren->lieu_livraison = NULL;    
                else:
                    $add_auto_paren->montant_livraison = $get_lieu_livraison->montant;
                    $add_auto_paren->lieu_livraison = $request->lieu_livraison;    
                endif;
                $add_auto_paren->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_auto_paren->save()):

                    Alert_message::success();

                    $data = $add_auto_paren->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_aut_pare', compact('$data', '$rfk'));
                endif;
            endif;
        endif;
    }

    public function demande_documents_recap_aut_pare($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_auto_paren = DB::table('autorisation_parentales')->where('id', $data)->first();
        
        return view('pages.frontend.demande_document_recap_aut_par',compact(
            'data_info_auto_paren',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit_aut_pare($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_auto_paren = Autorisation_parentale::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_auto_paren',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_aut_pare(Request $request, $data)
    { 
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->domicile)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->profession)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;


        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_auto_paren =  Autorisation_parentale::findOrFail($data);


            $update_auto_paren->document_id = $request->document_id;
            $update_auto_paren->name_demandeur = $request->name_demandeur;
            $update_auto_paren->email_demandeur = $request->email_demandeur;
            $update_auto_paren->num_demandeur = $request->num_demandeur;
            $update_auto_paren->full_name = $request->full_name;
            $update_auto_paren->lieu_naissance = $request->lieu_naissance;
            $update_auto_paren->date_naissance = $request->date_naissance;
            $update_auto_paren->domicile = $request->domicile;
            $update_auto_paren->profession = $request->profession;
            $update_auto_paren->nbre_copie = $request->nombre_copie;
            $update_auto_paren->adresse_livraison = $request->adresse_livraison;
            $update_auto_paren->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_auto_paren->montant_livraison = 0;
                $update_auto_paren->lieu_livraison = NULL;
            else:
                $update_auto_paren->montant_livraison = $get_lieu_livraison->montant;
                $update_auto_paren->lieu_livraison = $request->lieu_livraison;
            endif;
        
            //dd($add_extrait); die();

            if($update_auto_paren->save()):

                Alert_message::success();

                $data = $update_auto_paren->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_aut_pare',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="auto_parentale".time(). '.'.$extension;

                if($filename):

                    $file->move('media/auto_parentale', $filename);
                else:
                    toast('autorisation parentale non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/auto_parentale/";
                $update_auto_paren = Autorisation_parentale::findOrFail($data);


                $update_auto_paren->document_id = $request->document_id;
                $update_auto_paren->name_demandeur = $request->name_demandeur;
                $update_auto_paren->email_demandeur = $request->email_demandeur;
                $update_auto_paren->num_demandeur = $request->num_demandeur;
                $update_auto_paren->full_name = $request->full_name;
                $update_auto_paren->lieu_naissance = $request->lieu_naissance;
                $update_auto_paren->date_naissance = $request->date_naissance;
                $update_auto_paren->domicile = $request->domicile;
                $update_auto_paren->profession = $request->profession;
                $update_auto_paren->nbre_copie = $request->nombre_copie;
                $update_auto_paren->adresse_livraison = $request->adresse_livraison;
                $update_auto_paren->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_auto_paren->montant_livraison = 0;
                    $update_auto_paren->lieu_livraison = NULL;
                else:
                    $update_auto_paren->montant_livraison = $get_lieu_livraison->montant;
                    $update_auto_paren->lieu_livraison = $request->lieu_livraison;    
                endif;

                $update_auto_paren->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_auto_paren->save()):
                    Alert_message::success();

                    $data = $update_auto_paren->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap_aut_pare',compact('data', 'rfk'));
                endif;
            endif;
        endif;

    }


    ////////////////////// ATTESTATION DE PRISE EN CHARGE ////////////////////////
    public function add_attestation_prise_charge(Request $request) 
    {
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->domicile_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_attes_prise_charge = new Attestation_prise_charge;

            $add_attes_prise_charge->document_id = $request->document_id;
            $add_attes_prise_charge->name_demandeur = $request->name_demandeur;
            $add_attes_prise_charge->email_demandeur = $request->email_demandeur;
            $add_attes_prise_charge->num_demandeur = $request->num_demandeur;
            $add_attes_prise_charge->domicile_demandeur = $request->domicile_demandeur;
            $add_attes_prise_charge->profession_demandeur = $request->profession_demandeur;
            $add_attes_prise_charge->full_name = $request->full_name;
            $add_attes_prise_charge->lieu_naissance = $request->lieu_naissance;
            $add_attes_prise_charge->date_naissance = $request->date_naissance;
            $add_attes_prise_charge->nbre_copie = $request->nombre_copie;
            $add_attes_prise_charge->adresse_livraison = $request->adresse_livraison;
            $add_attes_prise_charge->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_attes_prise_charge->montant_livraison = 0;
                $add_attes_prise_charge->lieu_livraison = NULL;
            else:
                $add_attes_prise_charge->montant_livraison = $get_lieu_livraison->montant;
                $add_attes_prise_charge->lieu_livraison = $request->lieu_livraison;
            endif;
        
            if($add_attes_prise_charge->save()):

                Alert_message::success();

                $data = $add_attes_prise_charge->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_attestation_prise_charge',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="attes_prise_charge".time(). '.'.$extension;

                if($filename):
                    $file->move('media/attes_prise_charge', $filename);
                else:
                    toast('attestation de prise en charge non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/attes_prise_charge/";
                $add_attes_prise_charge = new Attestation_prise_charge;

                $add_attes_prise_charge->document_id = $request->document_id;
                $add_attes_prise_charge->name_demandeur = $request->name_demandeur;
                $add_attes_prise_charge->email_demandeur = $request->email_demandeur;
                $add_attes_prise_charge->num_demandeur = $request->num_demandeur;
                $add_attes_prise_charge->domicile_demandeur = $request->domicile_demandeur;
                $add_attes_prise_charge->profession_demandeur = $request->profession_demandeur;
                $add_attes_prise_charge->full_name = $request->full_name;
                $add_attes_prise_charge->lieu_naissance = $request->lieu_naissance;
                $add_attes_prise_charge->date_naissance = $request->date_naissance;
                $add_attes_prise_charge->nbre_copie = $request->nombre_copie;
                $add_attes_prise_charge->adresse_livraison = $request->adresse_livraison;
                $add_attes_prise_charge->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_attes_prise_charge->montant_livraison = 0;
                    $add_attes_prise_charge->lieu_livraison = NULL;    
                else:
                    $add_attes_prise_charge->montant_livraison = $get_lieu_livraison->montant;
                    $add_attes_prise_charge->lieu_livraison = $request->lieu_livraison;    
                endif;
                $add_attes_prise_charge->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_attes_prise_charge->save()):

                    Alert_message::success();

                    $data = $add_attes_prise_charge->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_attestation_prise_charge', compact('$data', '$rfk'));
                endif;
            endif;
        endif;
    }

    public function demande_documents_recap_attestation_prise_charge($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_attes_prise_charge = DB::table('attestation_prise_charges')->where('id', $data)->first();
        
        return view('pages.frontend.demande_document_recap_attes_prise_charge',compact(
            'data_info_attes_prise_charge',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit_attestation_prise_charge($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_attes_prise_charge = Attestation_prise_charge::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_attes_prise_charge',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_attestation_prise_charge(Request $request, $data)
    { 
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->domicile_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->lieu_naissance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_attes_prise_charge =  Attestation_prise_charge::findOrFail($data);


            $update_attes_prise_charge->document_id = $request->document_id;
            $update_attes_prise_charge->name_demandeur = $request->name_demandeur;
            $update_attes_prise_charge->email_demandeur = $request->email_demandeur;
            $update_attes_prise_charge->num_demandeur = $request->num_demandeur;
            $update_attes_prise_charge->domicile_demandeur = $request->domicile_demandeur;
            $update_attes_prise_charge->profession_demandeur = $request->profession_demandeur;
            $update_attes_prise_charge->full_name = $request->full_name;
            $update_attes_prise_charge->lieu_naissance = $request->lieu_naissance;
            $update_attes_prise_charge->date_naissance = $request->date_naissance;
            $update_attes_prise_charge->nbre_copie = $request->nombre_copie;
            $update_attes_prise_charge->adresse_livraison = $request->adresse_livraison;
            $update_attes_prise_charge->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_attes_prise_charge->montant_livraison = 0;
                $update_attes_prise_charge->lieu_livraison = NULL;
            else:
                $update_attes_prise_charge->montant_livraison = $get_lieu_livraison->montant;
                $update_attes_prise_charge->lieu_livraison = $request->lieu_livraison;
            endif;
        
            //dd($add_extrait); die();

            if($update_attes_prise_charge->save()):

                Alert_message::success();

                $data = $update_attes_prise_charge->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_attestation_prise_charge',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="attes_prise_charge".time(). '.'.$extension;

                if($filename):

                    $file->move('media/attes_prise_charge', $filename);
                else:
                    toast('autorisation parentale non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/attes_prise_charge/";
                $update_attes_prise_charge = Attestation_prise_charge::findOrFail($data);


                $update_attes_prise_charge->document_id = $request->document_id;
                $update_attes_prise_charge->name_demandeur = $request->name_demandeur;
                $update_attes_prise_charge->email_demandeur = $request->email_demandeur;
                $update_attes_prise_charge->num_demandeur = $request->num_demandeur;
                $update_attes_prise_charge->domicile_demandeur = $request->domicile_demandeur;
                $update_attes_prise_charge->profession_demandeur = $request->profession_demandeur;
                $update_attes_prise_charge->full_name = $request->full_name;
                $update_attes_prise_charge->lieu_naissance = $request->lieu_naissance;
                $update_attes_prise_charge->date_naissance = $request->date_naissance;
                $update_attes_prise_charge->nbre_copie = $request->nombre_copie;
                $update_attes_prise_charge->adresse_livraison = $request->adresse_livraison;
                $update_attes_prise_charge->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_attes_prise_charge->montant_livraison = 0;
                    $update_attes_prise_charge->lieu_livraison = NULL;
                else:
                    $update_attes_prise_charge->montant_livraison = $get_lieu_livraison->montant;
                    $update_attes_prise_charge->lieu_livraison = $request->lieu_livraison;    
                endif;

                $update_attes_prise_charge->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_attes_prise_charge->save()):
                    Alert_message::success();

                    $data = $update_attes_prise_charge->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap_attestation_prise_charge',compact('data', 'rfk'));
                endif;
            endif;
        endif;

    }


    ////////////////////// ATTESTATION DE PRISE EN CHARGE ////////////////////////
    public function add_certificat_heberg(Request $request) 
    {
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->domicile_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->provenance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->dure_sejour)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_debut)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_certificat_heberg = new Certificat_heberg;

            $add_certificat_heberg->document_id = $request->document_id;
            $add_certificat_heberg->name_demandeur = $request->name_demandeur;
            $add_certificat_heberg->email_demandeur = $request->email_demandeur;
            $add_certificat_heberg->num_demandeur = $request->num_demandeur;
            $add_certificat_heberg->domicile_demandeur = $request->domicile_demandeur;
            $add_certificat_heberg->profession_demandeur = $request->profession_demandeur;
            $add_certificat_heberg->provenance = $request->provenance;
            $add_certificat_heberg->dure_sejour = $request->dure_sejour;
            $add_certificat_heberg->date_debut = $request->date_debut;
            $add_certificat_heberg->nbre_copie = $request->nombre_copie;
            $add_certificat_heberg->adresse_livraison = $request->adresse_livraison;
            $add_certificat_heberg->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_certificat_heberg->montant_livraison = 0;
                $add_certificat_heberg->lieu_livraison = NULL;
            else:
                $add_certificat_heberg->montant_livraison = $get_lieu_livraison->montant;
                $add_certificat_heberg->lieu_livraison = $request->lieu_livraison;
            endif;
        
            if($add_certificat_heberg->save()):

                Alert_message::success();

                $data = $add_certificat_heberg->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_certificat_heberg',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_heberg".time(). '.'.$extension;

                if($filename):
                    $file->move('media/certificat_heberg', $filename);
                else:
                    toast('certificat hebergement non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/certificat_heberg/";
                $add_certificat_heberg = new Certificat_heberg;

                $add_certificat_heberg->document_id = $request->document_id;
                $add_certificat_heberg->name_demandeur = $request->name_demandeur;
                $add_certificat_heberg->email_demandeur = $request->email_demandeur;
                $add_certificat_heberg->num_demandeur = $request->num_demandeur;
                $add_certificat_heberg->domicile_demandeur = $request->domicile_demandeur;
                $add_certificat_heberg->profession_demandeur = $request->profession_demandeur;
                $add_certificat_heberg->provenance = $request->provenance;
                $add_certificat_heberg->dure_sejour = $request->dure_sejour;
                $add_certificat_heberg->date_debut = $request->date_debut;
                $add_certificat_heberg->nbre_copie = $request->nombre_copie;
                $add_certificat_heberg->adresse_livraison = $request->adresse_livraison;
                $add_certificat_heberg->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_certificat_heberg->montant_livraison = 0;
                    $add_certificat_heberg->lieu_livraison = NULL;    
                else:
                    $add_certificat_heberg->montant_livraison = $get_lieu_livraison->montant;
                    $add_certificat_heberg->lieu_livraison = $request->lieu_livraison;    
                endif;
                $add_certificat_heberg->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_certificat_heberg->save()):

                    Alert_message::success();

                    $data = $add_certificat_heberg->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_certificat_heberg', compact('$data', '$rfk'));
                endif;
            endif;
        endif;
    }

    public function demande_documents_recap_certificat_heberg($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_certificat_heberg = DB::table('certificat_hebergs')->where('id', $data)->first();
        
        return view('pages.frontend.demande_document_recap_certificat_heberg',compact(
            'data_info_certificat_heberg',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit_certificat_heberg($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_certificat_heberg = Certificat_heberg::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_certificat_heberg',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_certificat_heberg(Request $request, $data)
    { 
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->domicile_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->provenance)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->dure_sejour)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->date_debut)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;
        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_certificat_heberg =  Certificat_heberg::findOrFail($data);


            $update_certificat_heberg->document_id = $request->document_id;
            $update_certificat_heberg->name_demandeur = $request->name_demandeur;
            $update_certificat_heberg->email_demandeur = $request->email_demandeur;
            $update_certificat_heberg->num_demandeur = $request->num_demandeur;
            $update_certificat_heberg->domicile_demandeur = $request->domicile_demandeur;
            $update_certificat_heberg->profession_demandeur = $request->profession_demandeur;
            $update_certificat_heberg->provenance = $request->provenance;
            $update_certificat_heberg->dure_sejour = $request->dure_sejour;
            $update_certificat_heberg->date_debut = $request->date_debut;
            $update_certificat_heberg->nbre_copie = $request->nombre_copie;
            $update_certificat_heberg->adresse_livraison = $request->adresse_livraison;
            $update_certificat_heberg->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_certificat_heberg->montant_livraison = 0;
                $update_certificat_heberg->lieu_livraison = NULL;
            else:
                $update_certificat_heberg->montant_livraison = $get_lieu_livraison->montant;
                $update_certificat_heberg->lieu_livraison = $request->lieu_livraison;
            endif;
        
            //dd($add_extrait); die();

            if($update_certificat_heberg->save()):

                Alert_message::success();

                $data = $update_certificat_heberg->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_certificat_heberg',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="certificat_heberg".time(). '.'.$extension;

                if($filename):

                    $file->move('media/certificat_heberg', $filename);
                else:
                    toast('autorisation parentale non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/certificat_heberg/";
                $update_certificat_heberg =  Certificat_heberg::findOrFail($data);

                $update_certificat_heberg->document_id = $request->document_id;
                $update_certificat_heberg->name_demandeur = $request->name_demandeur;
                $update_certificat_heberg->email_demandeur = $request->email_demandeur;
                $update_certificat_heberg->num_demandeur = $request->num_demandeur;
                $update_certificat_heberg->domicile_demandeur = $request->domicile_demandeur;
                $update_certificat_heberg->profession_demandeur = $request->profession_demandeur;
                $update_certificat_heberg->provenance = $request->provenance;
                $update_certificat_heberg->dure_sejour = $request->dure_sejour;
                $update_certificat_heberg->date_debut = $request->date_debut;
                $update_certificat_heberg->nbre_copie = $request->nombre_copie;
                $update_certificat_heberg->adresse_livraison = $request->adresse_livraison;
                $update_certificat_heberg->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_certificat_heberg->montant_livraison = 0;
                    $update_certificat_heberg->lieu_livraison = NULL;
                else:
                    $update_certificat_heberg->montant_livraison = $get_lieu_livraison->montant;
                    $update_certificat_heberg->lieu_livraison = $request->lieu_livraison;    
                endif;

                $update_certificat_heberg->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_certificat_heberg->save()):
                    Alert_message::success();

                    $data = $update_certificat_heberg->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap_certificat_heberg',compact('data', 'rfk'));
                endif;
            endif;
        endif;
    }


    ////////////////////// DECLARATION DE POUVOIR OU PROCURATION ////////////////////////
    public function add_declaration_procu(Request $request) 
    {
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->cni_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            $add_decl_pouv_procu = new Declaration_procu;

            $add_decl_pouv_procu->document_id = $request->document_id;
            $add_decl_pouv_procu->name_demandeur = $request->name_demandeur;
            $add_decl_pouv_procu->email_demandeur = $request->email_demandeur;
            $add_decl_pouv_procu->num_demandeur = $request->num_demandeur;
            $add_decl_pouv_procu->profession_demandeur = $request->profession_demandeur;
            $add_decl_pouv_procu->cni_demandeur = $request->cni_demandeur;
            $add_decl_pouv_procu->full_name = $request->full_name;
            $add_decl_pouv_procu->nbre_copie = $request->nombre_copie;
            $add_decl_pouv_procu->adresse_livraison = $request->adresse_livraison;
            $add_decl_pouv_procu->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $add_decl_pouv_procu->montant_livraison = 0;
                $add_decl_pouv_procu->lieu_livraison = NULL;
            else:
                $add_decl_pouv_procu->montant_livraison = $get_lieu_livraison->montant;
                $add_decl_pouv_procu->lieu_livraison = $request->lieu_livraison;
            endif;
        
            if($add_decl_pouv_procu->save()):

                Alert_message::success();

                $data = $add_decl_pouv_procu->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_declaration_procu',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="declaration_procuration".time(). '.'.$extension;

                if($filename):
                    $file->move('media/declaration_procuration', $filename);
                else:
                    toast('declaration ou procuration non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();
                $path = "media/declaration_procuration/";
                $add_decl_pouv_procu = new Declaration_procu;

                $add_decl_pouv_procu->document_id = $request->document_id;
                $add_decl_pouv_procu->name_demandeur = $request->name_demandeur;
                $add_decl_pouv_procu->email_demandeur = $request->email_demandeur;
                $add_decl_pouv_procu->num_demandeur = $request->num_demandeur;
                $add_decl_pouv_procu->profession_demandeur = $request->profession_demandeur;
                $add_decl_pouv_procu->cni_demandeur = $request->cni_demandeur;
                $add_decl_pouv_procu->full_name = $request->full_name;
                $add_decl_pouv_procu->nbre_copie = $request->nombre_copie;
                $add_decl_pouv_procu->adresse_livraison = $request->adresse_livraison;
                $add_decl_pouv_procu->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $add_decl_pouv_procu->montant_livraison = 0;
                    $add_decl_pouv_procu->lieu_livraison = NULL;    
                else:
                    $add_decl_pouv_procu->montant_livraison = $get_lieu_livraison->montant;
                    $add_decl_pouv_procu->lieu_livraison = $request->lieu_livraison;    
                endif;
                $add_decl_pouv_procu->extrait_file = URL::to('').'/'.$path.$filename;

                if($add_decl_pouv_procu->save()):

                    Alert_message::success();

                    $data = $add_decl_pouv_procu->id;
                    $rfk = $request->document_rfk;
                    return redirect()->route('demande_documents_recap_declaration_procu', compact('$data', '$rfk'));
                endif;
            endif;
        endif;
    }

    public function demande_documents_recap_declaration_procu($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_decl_procu = DB::table('declaration_procus')->where('id', $data)->first();
        
        return view('pages.frontend.demande_document_recap_decl_pouv_procu',compact(
            'data_info_decl_procu',
            'documents_info',
            'liste_documents'
        ));
    }

    public function demande_documents_edit_declaration_procu($data, $rfk) {

        $liste_documents = Documents::all();
        $documents_info = DB::table('documents')->where('rfk', $rfk)->first();
        $data_info_decl_procu = Declaration_procu::findOrFail($data);
        $get_all_lieu_livraison = Lieu_livraison::all();
        return view('pages.frontend.demande_document_edit',compact(
            'data_info_decl_procu',
            'documents_info',
            'liste_documents',
            'get_all_lieu_livraison'
        ));
    }

    public function demande_documents_update_declaration_procu(Request $request, $data)
    { 
        if(empty($request->name_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->num_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->profession_demandeur)):
            Alert_message::isNumberRequired();
            return back();
        endif;

        if(empty($request->cni_demandeur)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->full_name)):
            Alert_message::isExtraitRequired();
            return back();
        endif;

        if(empty($request->nombre_copie)):
            Alert_message::isNbreCopie();
            return back();
        endif;

        if(empty($request->extrait_file)):

            $get_lieu_livraison = DB::table('lieu_livraisons')
            ->where('lieu',$request->lieu_livraison)->first();
            
            //dd($get_lieu_livraison); die();
            $update_decl_pouv_procu = Declaration_procu::findOrFail($data);


            $update_decl_pouv_procu->document_id = $request->document_id;
            $update_decl_pouv_procu->name_demandeur = $request->name_demandeur;
            $update_decl_pouv_procu->email_demandeur = $request->email_demandeur;
            $update_decl_pouv_procu->num_demandeur = $request->num_demandeur;
            $update_decl_pouv_procu->profession_demandeur = $request->profession_demandeur;
            $update_decl_pouv_procu->cni_demandeur = $request->cni_demandeur;
            $update_decl_pouv_procu->full_name = $request->full_name;
            $update_decl_pouv_procu->nbre_copie = $request->nombre_copie;
            $update_decl_pouv_procu->adresse_livraison = $request->adresse_livraison;
            $update_decl_pouv_procu->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
            if($get_lieu_livraison == null):
                $update_decl_pouv_procu->montant_livraison = 0;
                $update_decl_pouv_procu->lieu_livraison = NULL;
            else:
                $update_decl_pouv_procu->montant_livraison = $get_lieu_livraison->montant;
                $update_decl_pouv_procu->lieu_livraison = $request->lieu_livraison;
            endif;
        
            //dd($add_extrait); die();

            if($update_decl_pouv_procu->save()):

                Alert_message::success();

                $data = $update_decl_pouv_procu->id;
                $rfk = $request->document_rfk;

                return redirect()->route('demande_documents_recap_declaration_procu',compact('data', 'rfk'));
            endif;

        else:
            if($request->hasFile('extrait_file')):
                $file = $request->file('extrait_file');
                $extension =  $file->getClientOriginalExtension();

                $filename ="declaration_procuration".time(). '.'.$extension;

                if($filename):

                    $file->move('media/declaration_procuration', $filename);
                else:
                    toast('declaration ou procuration non enregistré','error');
                    return back();
                endif;


                $get_lieu_livraison = DB::table('lieu_livraisons')
                ->where('lieu',$request->lieu_livraison)->first();

                //dd($get_lieu_livraison); die();
                $path = "media/declaration_procuration/";
                $update_decl_pouv_procu =  Declaration_procu::findOrFail($data);

                $update_decl_pouv_procu->document_id = $request->document_id;
                $update_decl_pouv_procu->name_demandeur = $request->name_demandeur;
                $update_decl_pouv_procu->email_demandeur = $request->email_demandeur;
                $update_decl_pouv_procu->num_demandeur = $request->num_demandeur;
                $update_decl_pouv_procu->profession_demandeur = $request->profession_demandeur;
                $update_decl_pouv_procu->cni_demandeur = $request->cni_demandeur;
                $update_decl_pouv_procu->full_name = $request->full_name;
                $update_decl_pouv_procu->nbre_copie = $request->nombre_copie;
                $update_decl_pouv_procu->adresse_livraison = $request->adresse_livraison;
                $update_decl_pouv_procu->montant_timbre = (int)$request->montant_timbre*(int)$request->nombre_copie;
                if($get_lieu_livraison == null):
                    $update_decl_pouv_procu->montant_livraison = 0;
                    $update_decl_pouv_procu->lieu_livraison = NULL;
                else:
                    $update_decl_pouv_procu->montant_livraison = $get_lieu_livraison->montant;
                    $update_decl_pouv_procu->lieu_livraison = $request->lieu_livraison;    
                endif;

                $update_decl_pouv_procu->extrait_file = URL::to('').'/'.$path.$filename;

                if($update_decl_pouv_procu->save()):
                    Alert_message::success();

                    $data = $update_decl_pouv_procu->id;
                    $rfk = $request->document_rfk;

                    return redirect()->route('demande_documents_recap_declaration_procu',compact('data', 'rfk'));
                endif;
            endif;
        endif;
    }
}

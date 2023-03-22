<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemandesController;
use App\Http\Controllers\DocumentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('front');

Route::post('/sign_in', [UserController::class, 'login'])->name('connexion');

Route::get('/accueil/verification', [FrontController::class, 'verify_demande'])->name('verify_demande');

Route::post('/accueil/verification_numero', [FrontController::class, 'verify_numero'])->name('verify_numero');


Route::get('/accueil/demande-documents/{rfk}', [FrontController::class, 'demande_documents'])->name('demande_documents');

///////////////////////////////////////////// EXTRAIT DE NAISSANCE ///////////////////////////////////////////////////

Route::post('/accueil/demande-extrait', [DemandesController::class, 'add_extrait'])->name('add_extrait');
Route::get('/accueil/demande-documents-recap_extr/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_extr'])->name('demande_documents_recap_extr');
Route::get('/accueil/demande-documents-edit_extr/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_extr'])->name('demande_documents_edit_extr');
Route::post('/accueil/demande-documents-update_extr/{data}', [DemandesController::class, 'demande_documents_update_extr'])->name('demande_documents_update_extr');


///////////////////////////////////////////// CERTIFICAT DE VIE ///////////////////////////////////////////////////

Route::post('/accueil/demande-certificat_vie', [DemandesController::class, 'add_certificat_vie'])->name('add_certificat_vie');
Route::get('/accueil/demande-documents-recap/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap'])->name('demande_documents_recap');
Route::get('/accueil/demande-documents-edit/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit'])->name('demande_documents_edit');
Route::post('/accueil/demande-documents-update/{data}', [DemandesController::class, 'demande_documents_update'])->name('demande_documents_update');

///////////////////////////////////////////// CERTIFICAT DE DECES ///////////////////////////////////////////////////

Route::post('/accueil/demande-certificat_deces', [DemandesController::class, 'add_certificat_deces'])->name('add_certificat_deces');
Route::get('/accueil/demande-documents-recap_deces/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_deces'])->name('demande_documents_recap_deces');
Route::get('/accueil/demande-documents-edit_deces/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_deces'])->name('demande_documents_edit_deces');
Route::post('/accueil/demande-documents-update_deces/{data}', [DemandesController::class, 'demande_documents_update_deces'])->name('demande_documents_update_deces');


///////////////////////////////////////////// AUTORISATION PARENTALE ///////////////////////////////////////////////////

Route::post('/accueil/demande-autorisation_parentale', [DemandesController::class, 'add_autorisation_parentale'])->name('add_autorisation_parentale');
Route::get('/accueil/demande-documents-recap_aut_pare/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_aut_pare'])->name('demande_documents_recap_aut_pare');
Route::get('/accueil/demande-documents-edit_aut_pare/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_aut_pare'])->name('demande_documents_edit_aut_pare');
Route::post('/accueil/demande-documents-update_aut_pare/{data}', [DemandesController::class, 'demande_documents_update_aut_pare'])->name('demande_documents_update_aut_pare');


///////////////////////////////////////////// ATTESTATION DE PRISE EN CHARGE ///////////////////////////////////////////////////

Route::post('/accueil/demande-attestation_prise_charge', [DemandesController::class, 'add_attestation_prise_charge'])->name('add_attestation_prise_charge');
Route::get('/accueil/demande-documents-recap_attestation_prise_charge/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_attestation_prise_charge'])->name('demande_documents_recap_attestation_prise_charge');
Route::get('/accueil/demande-documents-edit_attestation_prise_charge/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_attestation_prise_charge'])->name('demande_documents_edit_attestation_prise_charge');
Route::post('/accueil/demande-documents-update_attestation_prise_charge/{data}', [DemandesController::class, 'demande_documents_update_attestation_prise_charge'])->name('demande_documents_update_attestation_prise_charge');


///////////////////////////////////////////// CERTIFICAT D'HEBERGEMENT ///////////////////////////////////////////////////

Route::post('/accueil/demande-certificat_heberg', [DemandesController::class, 'add_certificat_heberg'])->name('add_certificat_heberg');
Route::get('/accueil/demande-documents-recap_certificat_heberg/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_certificat_heberg'])->name('demande_documents_recap_certificat_heberg');
Route::get('/accueil/demande-documents-edit_certificat_heberg/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_certificat_heberg'])->name('demande_documents_edit_certificat_heberg');
Route::post('/accueil/demande-documents-update_certificat_heberg/{data}', [DemandesController::class, 'demande_documents_update_certificat_heberg'])->name('demande_documents_update_certificat_heberg');


///////////////////////////////////////////// DECLARATION DE POUVOIR OU PROCURATION ///////////////////////////////////////////////////

Route::post('/accueil/demande-declaration_procu', [DemandesController::class, 'add_declaration_procu'])->name('add_declaration_procu');
Route::get('/accueil/demande-documents-recap_declaration_procu/{data}/{rfk}', [DemandesController::class, 'demande_documents_recap_declaration_procu'])->name('demande_documents_recap_declaration_procu');
Route::get('/accueil/demande-documents-edit_declaration_procu/{data}/{rfk}', [DemandesController::class, 'demande_documents_edit_declaration_procu'])->name('demande_documents_edit_declaration_procu');
Route::post('/accueil/demande-documents-update_declaration_procu/{data}', [DemandesController::class, 'demande_documents_update_declaration_procu'])->name('demande_documents_update_declaration_procu');



Route::get('/accueil/pay/{doc}/{m1}/{m2}', [DocumentsController::class, 'pay'])->name('pay');



Route::get('/accueil/document_admin_front', [FrontController::class, 'document_admin_front'])->name('document_admin_front');



Route::get('/accueil/history', [FrontController::class, 'history'])->name('history');
Route::get('/accueil/municipalite', [FrontController::class, 'municipalite'])->name('municipalite');
Route::get('/accueil/advisers', [FrontController::class, 'advisers'])->name('advisers');

Route::get('/accueil/secretariat_general', [FrontController::class, 'secretariat_general'])->name('secretariat_general');
Route::get('/accueil/administratif', [FrontController::class, 'administratif_financier'])->name('administratif_financier');
Route::get('/accueil/financier', [FrontController::class, 'financier_front'])->name('financier_front');
Route::get('/accueil/technique', [FrontController::class, 'technique_front'])->name('technique_front');
Route::get('/accueil/socio', [FrontController::class, 'socio_front'])->name('socio_front');

Route::get('/accueil/news', [FrontController::class, 'news'])->name('news');
Route::get('/accueil/show_details/{id}', [FrontController::class, 'show_details'])->name('show_details');

Route::get('/accueil/agenda', [FrontController::class, 'agenda_front'])->name('agenda_front');

Route::get('/accueil/decouverte-front', [FrontController::class, 'decouverte_front'])->name('decouverte_front');
Route::get('/accueil/details_decouverte/{id}', [FrontController::class, 'details_decouverte'])->name('details_decouverte');

Route::get('/accueil/presse-front', [FrontController::class, 'presse_front'])->name('presse_front');
Route::get('/accueil/faq-front', [FrontController::class, 'faq_front'])->name('faq_front');
Route::get('/accueil/cgu-front', [FrontController::class, 'cgu_front'])->name('cgu_front');
Route::get('/accueil/mention-front', [FrontController::class, 'mention_front'])->name('mention_front');
Route::get('/accueil/biographie-front', [FrontController::class, 'biographie_front'])->name('biographie_front');








Route::get('/accueil/contacts_front', [ContactController::class, 'contacts_front'])->name('contacts_front');
Route::post('/accueil/contacts', [ContactController::class, 'add_contact'])->name('add_contact');

///////////    FIN FRONT     ////////////////

Route::group(['midleware' => ['auth']], function() {

    ////////////// ESPACE ADMINISTRATION /////////////////
    Route::get('/users_list', [UserController::class, 'users_list'])->name('users_list');
    Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
    Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
    Route::post('/update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
    Route::get('/show_user/{id}', [UserController::class, 'show_user'])->name('show_user');
    Route::post('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');

    Route::get('/update_password', [UserController::class, 'update_password'])->name('update_password');
    Route::post('/init_password', [UserController::class, 'init_password'])->name('init_password');

    Route::get('/administration', [AdminController::class, 'admin'])->name('admin_front');

    Route::get('/administration/documents/{rfk}', [AdminController::class, 'documents'])->name('documents');

    ///////////////////////////////////////////// EXTRAIT DE NAISSANCE ///////////////////////////////////////////////////

    Route::get('/administration/documents-edit/{data}/{rfk}', [AdminController::class, 'documents_edit'])->name('documents_edit');
    Route::get('/administration/documents-processing/{data}/{rfk}', [AdminController::class, 'documents_processing'])->name('documents_processing');
    Route::get('/administration/processing-end/{data}/{rfk}', [AdminController::class, 'processing_end'])->name('processing_end');
    Route::get('/administration/documents-publishing/{data}/{rfk}', [AdminController::class, 'processing_publishing'])->name('processing_publishing');
    Route::post('/administration/documents-delete/{id}', [AdminController::class, 'documents_delete'])->name('documents_delete');

    ///////////////////////////////////////////// CERTIFICAT DE VIE ///////////////////////////////////////////////////

    Route::get('/administration/documents-edit_vie/{data}/{rfk}', [AdminController::class, 'documents_edit_vie'])->name('documents_edit_vie');
    Route::get('/administration/documents-processing_vie/{data}/{rfk}', [AdminController::class, 'documents_processing_vie'])->name('documents_processing_vie');
    Route::get('/administration/processing-end_vie/{data}/{rfk}', [AdminController::class, 'processing_end_vie'])->name('processing_end_vie');
    Route::get('/administration/documents-publishing_vie/{data}/{rfk}', [AdminController::class, 'processing_publishing_vie'])->name('processing_publishing_vie');
    Route::post('/administration/documents-delete_vie/{id}', [AdminController::class, 'documents_delete_vie'])->name('documents_delete_vie');
    
    ///////////////////////////////////////////// CERTIFICAT DE DECES ///////////////////////////////////////////////////
    Route::get('/administration/documents-edit_deces/{data}/{rfk}', [AdminController::class, 'documents_edit_deces'])->name('documents_edit_deces');
    Route::get('/administration/documents-processing_deces/{data}/{rfk}', [AdminController::class, 'documents_processing_deces'])->name('documents_processing_deces');
    Route::get('/administration/processing-end_deces/{data}/{rfk}', [AdminController::class, 'processing_end_deces'])->name('processing_end_deces');
    Route::get('/administration/documents-publishing_deces/{data}/{rfk}', [AdminController::class, 'processing_publishing_deces'])->name('processing_publishing_deces');
    Route::post('/administration/documents-delete_deces/{id}', [AdminController::class, 'documents_delete_deces'])->name('documents_delete_deces');


    ///////////////////////////////////////////// AUTORISATION PARENTALE ///////////////////////////////////////////////////
    Route::get('/administration/documents-edit_aut_par/{data}/{rfk}', [AdminController::class, 'documents_edit_aut_par'])->name('documents_edit_aut_par');
    Route::get('/administration/documents-processing_auto/{data}/{rfk}', [AdminController::class, 'documents_processing_auto'])->name('documents_processing_auto');
    Route::get('/administration/processing-end_auto/{data}/{rfk}', [AdminController::class, 'processing_end_auto'])->name('processing_end_auto');
    Route::get('/administration/documents-publishing_auto/{data}/{rfk}', [AdminController::class, 'processing_publishing_auto'])->name('processing_publishing_auto');
    Route::post('/administration/documents-delete_auto_par/{id}', [AdminController::class, 'documents_delete_aut_par'])->name('documents_delete_aut_par');


    ///////////////////////////////////////////// ATTESTATIONDE PRISE EN CHARGE ///////////////////////////////////////////////////
    Route::get('/administration/documents-edit_attes_charg/{data}/{rfk}', [AdminController::class, 'documents_edit_attes_charg'])->name('documents_edit_attes_charg');
    Route::get('/administration/documents-processing_attes/{data}/{rfk}', [AdminController::class, 'documents_processing_attes'])->name('documents_processing_attes');
    Route::get('/administration/processing-end_attes/{data}/{rfk}', [AdminController::class, 'processing_end_attes'])->name('processing_end_attes');
    Route::get('/administration/documents-publishing_attes/{data}/{rfk}', [AdminController::class, 'processing_publishing_attes'])->name('processing_publishing_attes');
    Route::post('/administration/documents-delete_attes_charg/{id}', [AdminController::class, 'documents_delete_attes_charg'])->name('documents_delete_attes_charg');


    ///////////////////////////////////////////// CERTIFICAT D'HEBERGEMENT ///////////////////////////////////////////////////
    Route::get('/administration/documents-edit_cert_heberg/{data}/{rfk}', [AdminController::class, 'documents_edit_cert_heberg'])->name('documents_edit_cert_heberg');
    Route::get('/administration/documents-processing_heberg/{data}/{rfk}', [AdminController::class, 'documents_processing_heberg'])->name('documents_processing_heberg');
    Route::get('/administration/processing-end_heberg/{data}/{rfk}', [AdminController::class, 'processing_end_heberg'])->name('processing_end_heberg');
    Route::get('/administration/documents-publishing_heberg/{data}/{rfk}', [AdminController::class, 'processing_publishing_heberg'])->name('processing_publishing_heberg');
    Route::post('/administration/documents-delete_cert_heberg/{id}', [AdminController::class, 'documents_delete_cert_heberg'])->name('documents_delete_cert_heberg');


    ///////////////////////////////////////////// DECLARATION OU PROCURATION ///////////////////////////////////////////////////
    Route::get('/administration/documents-edit_decl_pro/{data}/{rfk}', [AdminController::class, 'documents_edit_decl_pro'])->name('documents_edit_decl_pro');
    Route::get('/administration/documents-processing_decl/{data}/{rfk}', [AdminController::class, 'documents_processing_decl'])->name('documents_processing_decl');
    Route::get('/administration/processing-end_decl/{data}/{rfk}', [AdminController::class, 'processing_end_decl'])->name('processing_end_decl');
    Route::get('/administration/documents-publishing_decl/{data}/{rfk}', [AdminController::class, 'processing_publishing_decl'])->name('processing_publishing_decl');
    Route::post('/administration/documents-delete_decl_pro/{id}', [AdminController::class, 'documents_delete_decl_pro'])->name('documents_delete_decl_pro');



    Route::get('/logout', [UserController::class, 'logout'])->name('deconnexion');


    //////////////////////////////////////////// DOCUMENTS ///////////////////////////////////////////

    Route::get('/administration/document_admin', [AdminController::class, 'document_admin'])->name('document_admin');
    Route::post('/administration/add_document', [DocumentsController::class, 'add_document'])->name('add_document');
    Route::get('/administration/edit_document/{id}', [DocumentsController::class, 'edit_document'])->name('edit_document');
    Route::post('/administration/update_document/{id}', [DocumentsController::class, 'update_document'])->name('update_document');
    Route::get('/administration/destroy_document/{id}', [DocumentsController::class, 'destroy_document'])->name('destroy_document');


    //////////////////////////////////////////// TIMBRES ///////////////////////////////////////////

    Route::get('/administration/timbre', [AdminController::class, 'timbres'])->name('timbre');
    Route::post('/administration/add_timbre', [DocumentsController::class, 'add_timbres'])->name('add_timbre');
    Route::get('/administration/edit_timbre/{id}', [DocumentsController::class, 'edit_timbres'])->name('edit_timbre');
    Route::post('/administration/update_timbre/{id}', [DocumentsController::class, 'update_timbres'])->name('update_timbre');
    Route::get('/administration/destroy_timbre/{id}', [DocumentsController::class, 'destroy_timbres'])->name('destroy_timbre');


    //////////////////////////////////////////// LIEU DE LIVRAISON ///////////////////////////////////////////

    Route::get('/administration/lieu_livraison', [AdminController::class, 'lieu_livraison'])->name('lieu_livraison');
    Route::post('/administration/add_lieu_livraison', [DocumentsController::class, 'add_lieu_livraison'])->name('add_lieu_livraison');
    Route::get('/administration/edit_lieu_livraison/{id}', [DocumentsController::class, 'edit_lieu_livraison'])->name('edit_lieu_livraison');
    Route::post('/administration/update_lieu_livraison/{id}', [DocumentsController::class, 'update_lieu_livraison'])->name('update_lieu_livraison');
    Route::post('/administration/destroy_lieu_livraison/{id}', [DocumentsController::class, 'destroy_lieu_livraison'])->name('destroy_lieu_livraison');


    //////////////////////////////////////////// ACTUALITES ///////////////////////////////////////////

    Route::get('/administration/actualite', [AdminController::class, 'actualite'])->name('actualite');
    Route::post('/administration/add_actualite', [DocumentsController::class, 'add_actualite'])->name('add_actualite');
    Route::get('/administration/edit_actualite/{id}', [DocumentsController::class, 'edit_actualite'])->name('edit_actualite');
    Route::get('/administration/show_actualite/{id}', [DocumentsController::class, 'show_actualite'])->name('show_actualite');
    Route::post('/administration/update_actualite/{id}', [DocumentsController::class, 'update_actualite'])->name('update_actualite');
    Route::post('/administration/destroy_actualite/{id}', [DocumentsController::class, 'destroy_actualite'])->name('destroy_actualite');




    //////////////////////////////////////////// LE MAIRE ///////////////////////////////////////////

    Route::get('/administration/maire', [AdminController::class, 'maire'])->name('maire');
    Route::post('/administration/add_maire', [DocumentsController::class, 'add_maire'])->name('add_maire');
    Route::get('/administration/edit_maire/{id}', [DocumentsController::class, 'edit_maire'])->name('edit_maire');
    Route::get('/administration/show_maire/{id}', [DocumentsController::class, 'show_maire'])->name('show_maire');
    Route::post('/administration/update_maire/{id}', [DocumentsController::class, 'update_maire'])->name('update_maire');
    Route::post('/administration/destroy_maire/{id}', [DocumentsController::class, 'destroy_maire'])->name('destroy_maire');


    //////////////////////////////////////////// CONSEILLERS ///////////////////////////////////////////

    Route::get('/administration/conseillers', [AdminController::class, 'conseillers'])->name('conseillers');
    Route::post('/administration/add_conseillers', [DocumentsController::class, 'add_conseillers'])->name('add_conseillers');
    Route::get('/administration/edit_conseillers/{id}', [DocumentsController::class, 'edit_conseillers'])->name('edit_conseillers');
    Route::get('/administration/show_conseillers/{id}', [DocumentsController::class, 'show_conseillers'])->name('show_conseillers');
    Route::post('/administration/update_conseillers/{id}', [DocumentsController::class, 'update_conseillers'])->name('update_conseillers');
    Route::post('/administration/destroy_conseillers/{id}', [DocumentsController::class, 'destroy_conseillers'])->name('destroy_conseillers');


    //////////////////////////////////////////// MUNICIPALITES ///////////////////////////////////////////

    Route::get('/administration/municip', [AdminController::class, 'municipalite'])->name('municip');
    Route::post('/administration/add_municip', [DocumentsController::class, 'add_municip'])->name('add_municip');
    Route::get('/administration/edit_municip/{id}', [DocumentsController::class, 'edit_municip'])->name('edit_municip');
    Route::get('/administration/show_municip/{id}', [DocumentsController::class, 'show_municip'])->name('show_municip');
    Route::post('/administration/update_municip/{id}', [DocumentsController::class, 'update_municip'])->name('update_municip');
    Route::post('/administration/destroy_municip/{id}', [DocumentsController::class, 'destroy_municip'])->name('destroy_municip');



    //////////////////////////////////////////// SECRETARIAT GENERAL ///////////////////////////////////////////

    Route::get('/administration/secretatriat', [AdminController::class, 'secretariat'])->name('secretariat');
    Route::post('/administration/add_secretatriat', [DocumentsController::class, 'add_secretariat'])->name('add_secretariat');
    Route::get('/administration/edit_secretariat/{id}', [DocumentsController::class, 'edit_secretariat'])->name('edit_secretariat');
    Route::post('/administration/update_secretariat/{id}', [DocumentsController::class, 'update_secretariat'])->name('update_secretariat');
    Route::post('/administration/destroy_secretariat/{id}', [DocumentsController::class, 'destroy_secretariat'])->name('destroy_secretariat');



    //////////////////////////////////////////// ADMINISTTRATIF FINANCIER ///////////////////////////////////////////

    Route::get('/administration/ad_financier', [AdminController::class, 'ad_financier'])->name('ad_financier');
    Route::post('/administration/add_ad_financier', [DocumentsController::class, 'add_ad_financier'])->name('add_ad_financier');
    Route::get('/administration/edit_ad_financier/{id}', [DocumentsController::class, 'edit_ad_financier'])->name('edit_ad_financier');
    Route::post('/administration/update_ad_financier/{id}', [DocumentsController::class, 'update_ad_financier'])->name('update_ad_financier');
    Route::post('/administration/destroy_ad_financier/{id}', [DocumentsController::class, 'destroy_ad_financier'])->name('destroy_ad_financier');




    //////////////////////////////////////////// AGENDA ///////////////////////////////////////////

    Route::get('/administration/agenda', [AdminController::class, 'agenda'])->name('agenda');
    Route::post('/administration/add_agenda', [DocumentsController::class, 'add_agenda'])->name('add_agenda');
    Route::get('/administration/edit_agenda/{id}', [DocumentsController::class, 'edit_agenda'])->name('edit_agenda');
    Route::post('/administration/update_agenda/{id}', [DocumentsController::class, 'update_agenda'])->name('update_agenda');
    Route::post('/administration/destroy_agenda/{id}', [DocumentsController::class, 'destroy_agenda'])->name('destroy_agenda');


    //////////////////////////////////////////// FINANCIER ///////////////////////////////////////////

    Route::get('/administration/financier', [AdminController::class, 'financier'])->name('financier');
    Route::post('/administration/add_financier', [DocumentsController::class, 'add_financier'])->name('add_financier');
    Route::get('/administration/edit_financier/{id}', [DocumentsController::class, 'edit_financier'])->name('edit_financier');
    Route::post('/administration/update_financier/{id}', [DocumentsController::class, 'update_financier'])->name('update_financier');
    Route::post('/administration/destroy_financier/{id}', [DocumentsController::class, 'destroy_financier'])->name('destroy_financier');


    //////////////////////////////////////////// TECHNIQUE ///////////////////////////////////////////

    Route::get('/administration/technique', [AdminController::class, 'technique'])->name('technique');
    Route::post('/administration/add_technique', [DocumentsController::class, 'add_technique'])->name('add_technique');
    Route::get('/administration/edit_technique/{id}', [DocumentsController::class, 'edit_technique'])->name('edit_technique');
    Route::post('/administration/update_technique/{id}', [DocumentsController::class, 'update_technique'])->name('update_technique');
    Route::post('/administration/destroy_technique/{id}', [DocumentsController::class, 'destroy_technique'])->name('destroy_technique');


    ////////////////////////////////////////////  SOCIO CULTUREL ///////////////////////////////////////////

    Route::get('/administration/socio_cult', [AdminController::class, 'socio_cult'])->name('socio_cult');
    Route::post('/administration/add_socio_cult', [DocumentsController::class, 'add_socio_cult'])->name('add_socio_cult');
    Route::get('/administration/edit_socio_cult/{id}', [DocumentsController::class, 'edit_socio_cult'])->name('edit_socio_cult');
    Route::post('/administration/update_socio_cult/{id}', [DocumentsController::class, 'update_socio_cult'])->name('update_socio_cult');
    Route::post('/administration/destroy_socio_cult/{id}', [DocumentsController::class, 'destroy_socio_cult'])->name('destroy_socio_cult');

    ////////////////////////////////////////////  DECOUVERTE ///////////////////////////////////////////

    Route::get('/administration/decouverte', [AdminController::class, 'decouverte'])->name('decouverte');
    Route::post('/administration/add_decouverte', [DocumentsController::class, 'add_decouverte'])->name('add_decouverte');
    Route::get('/administration/edit_decouverte/{id}', [DocumentsController::class, 'edit_decouverte'])->name('edit_decouverte');
    Route::get('/administration/show_decouverte/{id}', [DocumentsController::class, 'show_decouverte'])->name('show_decouverte');
    Route::post('/administration/update_decouverte/{id}', [DocumentsController::class, 'update_decouverte'])->name('update_decouverte');
    Route::post('/administration/destroy_decouverte/{id}', [DocumentsController::class, 'destroy_decouverte'])->name('destroy_decouverte');


    ////////////////////////////////////////////  PRESSE ///////////////////////////////////////////

    Route::get('/administration/presse', [AdminController::class, 'presse'])->name('presse');
    Route::post('/administration/add_presse', [DocumentsController::class, 'add_presse'])->name('add_presse');
    Route::get('/administration/edit_presse/{id}', [DocumentsController::class, 'edit_presse'])->name('edit_presse');
    Route::get('/administration/show_presse/{id}', [DocumentsController::class, 'show_presse'])->name('show_presse');
    Route::post('/administration/update_presse/{id}', [DocumentsController::class, 'update_presse'])->name('update_presse');
    Route::post('/administration/destroy_presse/{id}', [DocumentsController::class, 'destroy_presse'])->name('destroy_presse');


    ////////////////////////////////////////////  FAQ ///////////////////////////////////////////

    Route::get('/administration/faq', [AdminController::class, 'faq'])->name('faq');
    Route::post('/administration/add_faq', [DocumentsController::class, 'add_faq'])->name('add_faq');
    Route::get('/administration/edit_faq/{id}', [DocumentsController::class, 'edit_faq'])->name('edit_faq');
    Route::get('/administration/show_faq/{id}', [DocumentsController::class, 'show_faq'])->name('show_faq');
    Route::post('/administration/update_faq/{id}', [DocumentsController::class, 'update_faq'])->name('update_faq');
    Route::post('/administration/destroy_faq/{id}', [DocumentsController::class, 'destroy_faq'])->name('destroy_faq');


    ////////////////////////////////////////////  CGU ///////////////////////////////////////////

    Route::get('/administration/cgu', [AdminController::class, 'cgu'])->name('cgu');
    Route::post('/administration/add_cgu', [DocumentsController::class, 'add_cgu'])->name('add_cgu');
    Route::get('/administration/edit_cgu/{id}', [DocumentsController::class, 'edit_cgu'])->name('edit_cgu');
    Route::get('/administration/show_cgu/{id}', [DocumentsController::class, 'show_cgu'])->name('show_cgu');
    Route::post('/administration/update_cgu/{id}', [DocumentsController::class, 'update_cgu'])->name('update_cgu');
    Route::post('/administration/destroy_cgu/{id}', [DocumentsController::class, 'destroy_cgu'])->name('destroy_cgu');


    ////////////////////////////////////////////  MENTIONS ///////////////////////////////////////////

    Route::get('/administration/mention', [AdminController::class, 'mention'])->name('mention');
    Route::post('/administration/add_mention', [DocumentsController::class, 'add_mention'])->name('add_mention');
    Route::get('/administration/edit_mention/{id}', [DocumentsController::class, 'edit_mention'])->name('edit_mention');
    Route::get('/administration/show_mention/{id}', [DocumentsController::class, 'show_mention'])->name('show_mention');
    Route::post('/administration/update_mention/{id}', [DocumentsController::class, 'update_mention'])->name('update_mention');
    Route::post('/administration/destroy_mention/{id}', [DocumentsController::class, 'destroy_mention'])->name('destroy_mention');


    ////////////////////////////////////////////  BIBIOGRAPHIE ///////////////////////////////////////////

    Route::get('/administration/biographie', [AdminController::class, 'biographie'])->name('biographie');
    Route::post('/administration/add_biographie', [DocumentsController::class, 'add_biographie'])->name('add_biographie');
    Route::get('/administration/edit_biographie/{id}', [DocumentsController::class, 'edit_biographie'])->name('edit_biographie');
    Route::get('/administration/show_biographie/{id}', [DocumentsController::class, 'show_biographie'])->name('show_biographie');
    Route::post('/administration/update_biographie/{id}', [DocumentsController::class, 'update_biographie'])->name('update_biographie');
    Route::post('/administration/destroy_biographie/{id}', [DocumentsController::class, 'destroy_biographie'])->name('destroy_biographie');



    Route::get('/administration/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/administration/show_contacts/{id}', [DocumentsController::class, 'show_contacts'])->name('show_contacts');
    Route::post('/administration/destroy_contacts/{id}', [DocumentsController::class, 'destroy_contacts'])->name('destroy_contacts');


    Route::get('/admin/parametres', [AdminController::class, 'parametres_admin'])->name('parametres_admin');
});


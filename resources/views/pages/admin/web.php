<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
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


Route::get('/accueil/demande-documents/{rfk}', [FrontController::class, 'demande_documents'])->name('demande_documents');


Route::get('/accueil/demande-documents-recap/{data}/{rfk}', [DocumentsController::class, 'demande_documents_recap'])->name('demande_documents_recap');
Route::get('/accueil/demande-documents-edit/{data}/{rfk}', [DocumentsController::class, 'demande_documents_edit'])->name('demande_documents_edit');
Route::post('/accueil/demande-documents-update/{data}', [DocumentsController::class, 'demande_documents_update'])->name('demande_documents_update');
Route::get('/accueil/pay/{doc}/{m1}/{m2}', [DocumentsController::class, 'pay'])->name('pay');

Route::get('/accueil/document_admin_front', [FrontController::class, 'document_admin_front'])->name('document_admin_front');


Route::get('/accueil/show_details/{id}', [FrontController::class, 'show_details'])->name('show_details');



Route::get('/accueil/news', [FrontController::class, 'news'])->name('news');
Route::get('/accueil/actions', [FrontController::class, 'actions'])->name('actions');


Route::get('/accueil/municipalite', [FrontController::class, 'municipalite'])->name('municipalite');
Route::get('/accueil/advisers', [FrontController::class, 'advisers'])->name('advisers');


Route::get('/accueil/secretariat_general', [FrontController::class, 'secretariat_general'])->name('secretariat_general');
Route::get('/accueil/administratif_financier', [FrontController::class, 'administratif_financier'])->name('administratif_financier');
Route::get('/accueil/technique_socio_culturelle', [FrontController::class, 'technique_socio_culturelle'])->name('technique_socio_culturelle');

Route::get('/accueil/arrah-brief', [FrontController::class, 'brief'])->name('brief');
Route::get('/accueil/history', [FrontController::class, 'history'])->name('history');



Route::get('/accueil/contact', [ContactController::class, 'contact'])->name('contact');

Route::post('/accueil/contacts', [ContactController::class, 'add_contact'])->name('add_contact');


Route::post('/accueil/demande-extrait', [DocumentsController::class, 'add_extrait'])->name('add_extrait');



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
    Route::get('/administration/documents-edit/{data}/{rfk}', [AdminController::class, 'documents_edit'])->name('documents_edit');
    Route::get('/administration/documents-processing/{data}/{rfk}', [AdminController::class, 'documents_processing'])->name('documents_processing');
    Route::get('/administration/processing-end/{data}/{rfk}', [AdminController::class, 'processing_end'])->name('processing_end');
    Route::get('/administration/documents-publishing/{data}/{rfk}', [AdminController::class, 'processing_publishing'])->name('processing_publishing');


    Route::get('/logout', [UserController::class, 'logout'])->name('deconnexion');


    //////////////////////////////////////////// DOCUMENTS ///////////////////////////////////////////

    Route::get('/administration/document_admin', [AdminController::class, 'document_admin'])->name('document_admin');
    Route::post('/administration/add_document', [DocumentsController::class, 'add_document'])->name('add_document');
    Route::get('/administration/edit_document/{id}', [DocumentsController::class, 'edit_document'])->name('edit_document');
    Route::post('/administration/update_document/{id}', [DocumentsController::class, 'update_document'])->name('update_document');
    Route::get('/administration/destroy_document/{id}', [DocumentsController::class, 'destroy_document'])->name('destroy_document');



    //////////////////////////////////////////// LIEU DE LIVRAISON ///////////////////////////////////////////

    Route::get('/administration/lieu_livraison', [AdminController::class, 'lieu_livraison'])->name('lieu_livraison');
    Route::post('/administration/add_lieu_livraison', [DocumentsController::class, 'add_lieu_livraison'])->name('add_lieu_livraison');
    Route::get('/administration/edit_lieu_livraison/{id}', [DocumentsController::class, 'edit_lieu_livraison'])->name('edit_lieu_livraison');
    Route::post('/administration/update_lieu_livraison/{id}', [DocumentsController::class, 'update_lieu_livraison'])->name('update_lieu_livraison');
    Route::post('/administration/destroy_lieu_livraison/{id}', [DocumentsController::class, 'destroy_lieu_livraison'])->name('destroy_lieu_livraison');



    //////////////////////////////////////////// ACTIONS ///////////////////////////////////////////

    Route::get('/administration/action', [AdminController::class, 'action'])->name('action');
    Route::post('/administration/add_action', [DocumentsController::class, 'add_action'])->name('add_action');
    Route::get('/administration/edit_action/{id}', [DocumentsController::class, 'edit_action'])->name('edit_action');
    Route::get('/administration/show_action/{id}', [DocumentsController::class, 'show_action'])->name('show_action');
    Route::post('/administration/update_action/{id}', [DocumentsController::class, 'update_action'])->name('update_action');
    Route::post('/administration/destroy_action/{id}', [DocumentsController::class, 'destroy_action'])->name('destroy_action');



    //////////////////////////////////////////// ARRAH EN BREF ///////////////////////////////////////////

    Route::get('/administration/arrah_bref', [AdminController::class, 'arrah_bref'])->name('arrah_bref');
    Route::post('/administration/add_arrah_bref', [DocumentsController::class, 'add_arrah_bref'])->name('add_arrah_bref');
    Route::get('/administration/edit_arrah_bref/{id}', [DocumentsController::class, 'edit_arrah_bref'])->name('edit_arrah_bref');
    Route::get('/administration/show_arrah_bref/{id}', [DocumentsController::class, 'show_arrah_bref'])->name('show_arrah_bref');
    Route::post('/administration/update_arrah_bref/{id}', [DocumentsController::class, 'update_arrah_bref'])->name('update_arrah_bref');
    Route::post('/administration/destroy_arrah_bref/{id}', [DocumentsController::class, 'destroy_arrah_bref'])->name('destroy_arrah_bref');



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


    //////////////////////////////////////////// CONSEILLERS ///////////////////////////////////////////

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



    //////////////////////////////////////////// TECHNIQUE SOCIO CULTURELLE ///////////////////////////////////////////

    Route::get('/administration/tech_socio', [AdminController::class, 'tech_socio'])->name('tech_socio');
    Route::post('/administration/add_tech_socio', [DocumentsController::class, 'add_techniques'])->name('add_tech_socio');
    Route::get('/administration/edit_tech_socio/{id}', [DocumentsController::class, 'edit_techniques'])->name('edit_tech_socio');
    Route::post('/administration/update_tech_socio/{id}', [DocumentsController::class, 'update_techniques'])->name('update_tech_socio');
    Route::post('/administration/destroy_tech_socio/{id}', [DocumentsController::class, 'destroy_techniques'])->name('destroy_tech_socio');


    Route::get('/administration/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/administration/show_contacts/{id}', [DocumentsController::class, 'show_contacts'])->name('show_contacts');
    Route::post('/administration/destroy_contacts/{id}', [DocumentsController::class, 'destroy_contacts'])->name('destroy_contacts');



    Route::get('/admin/parametres', [AdminController::class, 'parametres_admin'])->name('parametres_admin');


});


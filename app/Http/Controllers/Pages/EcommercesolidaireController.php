<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\InscriptionRequest;
use App\Repositories\InscriptionRepository;
use App\Models\Sponsor;
use App\User;

class EcommercesolidaireController extends Controller
{
    /**
     * The repository instance.
     */
    protected $repository;

    /**
     * EcommercesolidaireController constructor.
     *
     * @param InscriptionRepository $repository
     */
    public function __construct(InscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('pages/ecommerce-solidaire/index', ['sponsorlist' => Sponsor::get(), 'volonteerlist' => User::orderBy('id')->get()]);
    }

    public function legals()
    {
        return view('pages/ecommerce-solidaire/legals');
    }

    public function inscription(InscriptionRequest $request)
    {
        $this->repository->save($request);
    }
}
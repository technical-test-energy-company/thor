<?php

namespace App\Asset;

use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Http\Controllers\Controller;

class AssetController extends Controller
{
    // public function index(): string
    public function index(): Collection
    {
        // return 'ok';
        return Asset::all();
    }
}

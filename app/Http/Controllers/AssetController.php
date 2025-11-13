<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Collection;

class AssetController extends Controller
{
    // public function index(): Collection
    public function index(): string
    {
        return 'ok';
        // return Asset::all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class RedirectToURL extends Controller
{
    public function __invoke(Link $link)
    {
        abort_if(! $link->is_enabled, 403, 'This link is inactive.');

        $link->increment('clicks');

        return redirect()->to($link->url);
    }
}

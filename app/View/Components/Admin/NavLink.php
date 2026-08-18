<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href,
        public string|array $active
    ) {
        //
    }

    public function isActive(): bool
    {
        return request()->routeIs(...(array) $this->active);
    }

    public function classes(): string
    {
        $base = 'flex items-center gap-3 px-3 py-2 text-sm transition-colors rounded-l-md';

        return $this->isActive()
            ? $base . ' bg-amber-400/10 text-amber-400 font-medium border-r-2 border-amber-400 hover:bg-slate-800/50 hover:text-amber-300'
            : $base . ' text-amber-400 border-r border-slate-700 hover:bg-slate-800/50 hover:text-amber-300 hover:border-amber-400/60';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.nav-link');
    }
}

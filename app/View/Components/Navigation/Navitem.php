<?php

namespace App\View\Components\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\MenuItem;

class Navitem extends Component
{
    public MenuItem $item;

    /**
     * Create a new component instance.
     */
    public function __construct(MenuItem $item)
    {
        $this->item = $item;
    }

    public function iconClass(): ?string
    {
        if (! $this->item->icon) {
            return null;
        }

        return 'fa-solid fa-' . $this->item->icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.navitem');
    }
}

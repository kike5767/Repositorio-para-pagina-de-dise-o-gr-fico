<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render(): View
    {
        // TODO: Consider adding more logic here if needed (e.g., passing data to the view)
        return view('layouts.guest');
    }
}

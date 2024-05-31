<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ChairpersonSidebar extends Component
{
    public $user;
    public $departmentName;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->departmentName = $this->user->department ? $this->user->department->department_name : 'No Department';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chairperson-sidebar', [
            'user' => $this->user,
            'departmentName' => $this->departmentName,
        ]);
    }
}
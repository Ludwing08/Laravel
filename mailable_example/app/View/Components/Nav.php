<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $items = [];

    public function __construct()
    {
        $this->items = [
            ['name' => 'Home', 'route' => '/'],
            ['name' => 'Mail Me', 'route' => '/mail'],
            ['name' => 'Mail with Attachments', 'route' => '/attachment'],
            ['name' => 'Mail Emit - Receive', 'route' => '/emit'],
        ];
    }
    
    public function render()
    {
    
        return view('components.nav');
    }
}

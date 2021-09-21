<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestHook extends Component
{
    public function boot()
    {

        return "boot";
        //
    }

    public function mount()
    {

        return 'mount';

    }

    public function hydrateFoo($value)
    {
        dd( 'hydrateFoo');
    
    }

    public function dehydrateFoo($value)
    {
        dd('hydrateFoo');
        
    }

    public function hydrate()
    {
        return "hydrate";
    }

    public function dehydrate()
    {
        return "dehydrate";
        
    }

    public function updating($name, $value)
    {
        return "updating";
        
    }

    public function updated($name, $value)
    {
        return "updated";
        
    }

    public function updatingFoo($value)
    {
        return "updatingFoo";
        
    }

    public function updatedFoo($value)
    {
        return "updatedFoo";
        
    }
    

    public function updatingFooBar($value)
    {
        return "updatingFooBar";        
    }

    public function updatedFooBar($value)
    {
        return "updatedFooBar";
     
    }
    public function render()
    {
        return view('livewire.test-hook');
    }
}

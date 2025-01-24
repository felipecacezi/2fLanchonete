<?php
namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmDelete extends Component
{
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function delete($id)
    {
        // Lógica para deletar o item
        session()->flash('message', 'Item deleted successfully.');
    }

    public function render()
    {
        return view('livewire.confirm-delete');
    }
}
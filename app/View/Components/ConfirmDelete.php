<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ConfirmDelete extends Component
{
    public readonly string $id;

    public function __construct(
        public readonly string $action = '',
        public readonly string $message = 'Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.',
        public readonly string $label = 'Supprimer',
    ) {
        $this->id = md5($this->action);
    }

    public function render(): View
    {
        return view('components.confirm-delete');
    }
}

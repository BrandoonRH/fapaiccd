<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjects extends Component
{
    use WithPagination;
    
    public function render()
    {
        $projects = Project::where('user_id', auth()->user()->id)->paginate(5);
      
        return view('livewire.show-projects', [
            'projects' => $projects
        ]);
    }
}

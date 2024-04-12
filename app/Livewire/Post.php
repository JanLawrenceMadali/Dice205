<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{
    public $title = '';
    public $content = '';
    public $selectedUser = null;

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|min:3|max:20',
            'content' => 'required|min:3|max:1000',
        ]);

        if (!$this->selectedUser) {
            ModelsPost::create($validated);
            $this->dispatch('saved');
        } else {
            ModelsPost::where('id', $this->selectedUser->id)->update($validated);
            $this->dispatch('update');
        }
    }

    public function edit($id)
    {
        $this->selectedUser = ModelsPost::find($id);
        $this->title = $this->selectedUser->title;
        $this->content = $this->selectedUser->content;
    }

    public function delete($id)
    {
        ModelsPost::destroy($id);
    }

    function clear()
    {
        if ($this->selectedUser) {
            $this->selectedUser->title = '';
            $this->selectedUser->content = '';
        }
        $this->reset([
            'title',
            'content',
        ]);
        $this->selectedUser = null;
    }

    public function render()
    {
        return view('livewire.post', [
            'posts' => ModelsPost::all(),
        ]);
    }
}

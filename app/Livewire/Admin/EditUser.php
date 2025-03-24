<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\InteractsWithMedia;

class EditUser extends Component
{
    use WithFileUploads;

    public User $user;
    public $avatar;

    public $name, $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $this->validate([
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($this->avatar) {
            // Remove old avatar & upload new one
            $this->user->clearMediaCollection('avatars');
            $this->user->addMedia($this->avatar->getRealPath())
                ->toMediaCollection('avatars');
        }

        $this->user->save();

        session()->flash('message', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}

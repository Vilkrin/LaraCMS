<div>
    <input wire:model.live="search">
 
 
@foreach ($this->users as $user)
    <div>{{ $user->name }}</div>
@endforeach
</div>

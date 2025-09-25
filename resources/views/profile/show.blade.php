<div class="profile-header">
    <h1>{{ $user->name }}</h1>
    @if($user->photo)
        <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de perfil" class="profile-photo">
    @endif
</div> 

<style>
.profile-photo {
    width: 50px; 
    height: 50px; 
    border-radius: 50%; 
    margin-left: 10px; 
}
</style> 
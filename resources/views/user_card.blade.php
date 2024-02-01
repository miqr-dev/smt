<div class="card">
    <div class="card-header">{{ $user->getFullNameAttribute() }}</div>
    <div class="card-body">
        <p>Email: {{ $user->email }}</p>
        <p>Phone: {{ $user->tel }}</p>
        <!-- Add other user details -->
    </div>
</div>
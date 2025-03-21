<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Log Out</button>
</form>

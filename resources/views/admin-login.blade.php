<x-layout>
    <div class="admin-login">
        <form action="/admin-login" method="POST">
            @csrf
            <h3>Admin Login</h3>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Log In</button>
        </form>
    </div>
</x-layout>
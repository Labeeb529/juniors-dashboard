<x-layout>
    <div class="create-guide">
        <form action="/create-guide" method="post">
            @csrf
            <h2>Create a guide</h2>
            <input type="text" placeholder="Title" name="title">
            <input type="text" placeholder="Author" name="author">
            <textarea type="text" rows="4" placeholder="Description" name="description"></textarea>
            <textarea name="body" id="" rows="10" placeholder="Write your Guide here"></textarea>
            <button type="submit">Create</button>
        </form>
    </div>
</x-layout>
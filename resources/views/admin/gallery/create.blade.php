<x-adminlayout>

  <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Album Name:</label>
    <input type="text" name="album_name">

    <label>Description:</label>
    <textarea name="description"></textarea>

    <label>Category:</label>
    <input type="text" name="category">

    <label>Photos:</label>
    <input type="file" name="photos[]" accept="image/*" multiple>

    <button type="submit">Create Album</button>
</form>

</x-adminlayout>
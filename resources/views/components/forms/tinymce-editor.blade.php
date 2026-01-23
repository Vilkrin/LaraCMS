{{-- @props([
    'name',
    'value' => '',
    'id' => 'tinymce-editor-' . \Illuminate\Support\Str::random(5),
])

<textarea id="{{ $id }}" name="{{ $name }}">
    {!! old($name, $value) !!}
</textarea> --}}

<div>
<form method="post">
  <textarea id="myeditorinstance">Hello, World!</textarea>
</form>
</div>
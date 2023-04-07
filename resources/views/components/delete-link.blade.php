@props(['$postId' => $postId])

<form method="post" action="{{route('post.delete', [$id = ])}}">
    @csrf
    @method('delete');
    <input type="submit" name="delete" value="Delete">
</form>
<x-app-layout>
    <div class="container mx-auto">
        <form method="post" action="{{route('post.update', $post)}}">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}">
            </div>
            
            <div>
                <label for="body">Body</label>
                <textarea name="body" id="" cols="30" rows="10">
                    {{$post->body}}
                </textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <input type="text" name="tags" value="{{$post->tags}}">
            </div>
            
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
    
</x-app-layout>
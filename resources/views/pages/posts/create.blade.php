<x-app-layout>
    <div class="container mx-auto">

        <form method="post" action="{{route('post.store')}}">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{old('title')}}">
            </div>
            
            <div>
                <label for="body">Body</label>
                <textarea name="body" id="" cols="30" rows="10">
                    {{old('body')}}
                </textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <input type="text" name="tags" value="{{old('tag')}}">
            </div>
            
            <input type="submit" name="submit" value="submit">
        </form>

    </div>
    
</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto mt-10">
        @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="bg-white p-10">
                <h2 class="font-bold py-5 text-xl">{{$post->title}}</h2>
                <hr>
                <div class="flex justify-end py-3">
                    <div class="">
                        <a href="{{route('post.edit', [$id = $post->id])}}" class="px-3 hover:text-blue-400"> Edit </a> 
                        |  
                        <form action="{{route('post.delete', [$id = $post->id])}}" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <input type="submit" name="submit" value="Delete" class="cursor-pointer hover:text-blue-500 pl-3">
                        </form>
                    </div>
                   
                </div>
                <p class="py-5 text-sm">{{$post->body}}</p>
                @if($post->tags != null)
                    @foreach($tags = explode(',', $post->tags) as $tag)
                        <small class="bg-blue-600 p-1 text-white rounded-md">{{$tag}}</small>
                    @endforeach
                @endif
            </div>
            
        @endforeach
        @else
            There is no post to show
        @endif

    </div>
    
</x-app-layout>
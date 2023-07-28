@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($articles as $article)
                <div class="card-body">
                    {{-- <h2 class="card-title">{{ $article->title }}</h2> --}}
                    <div class="col-lg-12 single-content">
                        <h1 class="mb-4">
                            {{ $article->title }}
                        </h1>
                        <div class="post-meta d-flex mb-5">
                            <div class="bio-pic mr-3">
                                <img src="{{ asset('asset') }}/images/person_1.jpg" alt="Image" class="img-fluidid">
                            </div>
                            <div class="vcard">
                                <span class="d-block"><a href="#">{{ $article->user->name }}</a> in <a
                                    href="#">{{ $article->category->name }}</a></span>
                                    <span class="date-read">{{ $article->created_at->format('l, F j, Y') }}</span> <span class="mx-1">&bullet;</span> 3
                                    min
                                    read <span class="icon-star2"></span></span>
                                </div>
                            </div>
                            <p class="mb-5">
                                @if ($article->image)
                                    <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}"
                                        class="img-fluid">
                                @endif
                            </p>

                        <p>{{ $article->content }}</p>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </div>


                </div>
                <div class="pt-5">
                    
                </div>
            @endforeach
        </div>

    </div>
@endsection

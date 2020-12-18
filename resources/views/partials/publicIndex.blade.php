    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 " >

                @if(session('status'))
                    <div class="alert alert-info">{{session('status')}}</div>
                @endif

                <div class="card " style="text-align: center">
                    <div class="card-header bg-light">{{ __('پست ها') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-success">
{{--                            <th scope="col">{{'ردیف'}}</th>--}}
                            <th>{{'عنوان'}}</th>
                            <th>{{'نویسنده'}}</th>
                            <th>{{'توصیف'}}</th>
                            <th>{{'عملیات'}}</th>
                            </thead>
                            @foreach($posts as $post)
                                <tbody>
                                <td>{{$post->title}}</td>
                                <td>{{$post->author->name}}</td>
                                <td style="text-align: right">{{$post->content}}</td>

{{--                                <td>--}}
{{--                                    @foreach($post->categories as $category)--}}
{{--                                        <span class="badge badge-info">{{$category->title}}</span>--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @foreach($post->tags as $tag)--}}
{{--                                        <span class="badge badge-success">{{$tag->title}}</span>--}}
{{--                                    @endforeach--}}
{{--                                </td>--}}
                                <td>
                                    <a class="btn btn-primary" href="{{route('posts.show',$post->id)}}">نمایش</a>
                                </td>

                                </tbody>
                            @endforeach
                        </table>
                        <div dir="ltr">

                            {{$posts->links('pagination::bootstrap-4')}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@extends('layouts.app')

    @section('content')
    <div class="container">
        @if(Auth::check())

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There wear some problems whit your input. <br>
                <ul>
                    @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h3 class="jumbotron">Laravel File Upload</h3>
            <form method="post" action="{{url('form')}}" class="form-group" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="input-group control-group increment">
                    <input type="file" name="file_name" class="form-control">
                    <input type="text" name="file_info" class="form-control" placeholder="Your image information">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <!-- <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="file_name" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
                        </div>
                    </div>
                </div> -->
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
            </form>

            <div>
                @foreach($user->forms as $form)
                 <div class="container-fluid">
                    <img src="{{url('images/'.$form->file_name)}}" class="img-thumbnail">
                    <p class="text-muted">{{ $form->file_info }}</p>
                </div>
                @endforeach
            </div>
        
        @endif 

        <h1>이미지를 올리기 위해 로그인을 해주세요. 😃</h1>
    </div>

    
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-success').click(function(){
                const html = $('.clone').html();
                $('.increment').after(html);
            });

            $('body').on('click', '.btn-danger', function(){
                $(this).parents('.control-group').remove();
            })
        });
    </script> -->

@endsection

  




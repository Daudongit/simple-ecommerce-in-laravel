@if(session()->has('success_message') || session()->has('warning_message'))
    <div class="alert alert-{{session('warning_message')?'warning':'success'}} alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {{-- <strong>{{session('warning')?'!!! Warning':$sucess}} </strong>   --}}
      {{session('warning')?:session('success_message')}}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      ! @foreach($errors->all() as $error)
            {{$error}} 
        @endforeach
    </div>
@endif
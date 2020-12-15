@if(Session::has('message'))
    <div class="row mr-2 ml-2" >
        <button type="button" class="btn btn-lg btn-block btn-{{Session::get('alert-type')}} mb-2">
            {{Session::get('message')}}
        </button>
    </div>
@endif

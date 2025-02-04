<div>
    <div class="modal-body">
        <input class="form-control" id="searchModal" placeholder="Com quem deseja conversar ?">
        <br/>
        @foreach($users as $user)
            <a href="{{route('chat', ['idUser' => $user->id])}}" class="col-xl-12 p-3 row user">
                <div class="foto">
                
                </div>
                <div class="ml-2 mt-2">
                    {{$user->name}}
                </div>
            </a>
        @endforeach
    </div>
</div>

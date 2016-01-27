@if ($errors->count() > 0)
    @foreach ($errors->all('<p>:message</p>') as $error)
	    <div class="alert alert-danger alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		    {{ $error }}
	    </div>
    @endforeach
@endif
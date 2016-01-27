@if(Session::has('msgs'))
<div class="alert alert-info alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
	<i class="fa fa-check"></i>
	{{ Session::get('msgs') }}
</div>
@elseif(SESSION::has('msge'))
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
	<span class="glyphicon glyphicon-remove"></span>
	{{ Session::get('msge') }}
</div>
@endif
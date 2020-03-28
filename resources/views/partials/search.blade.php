<form action="{{route('products.search')}}" class="d-flex mr-3">
    <div class="form-group  mr-1 mb-0">
    <input type="text" name="sr" class="form-control" value="{{request()->sr ??  ''}}">
    </div>
<button type="submit" class="btn btn-info mr-1"><i class="fa fa-search" aria-hidden="true"></i></i></button>
</form>

<div class="form-row">

    @foreach($categories as $category)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>{{ Form::checkbox('categories[]',
                                $category->id,
                                in_array($category->id, $checkedResource) ? true : false,
                                ['class' => 'grey','data-id'=> $category->id]) }}
                    {{$category->name}}
                </label>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
</div>
<div class="form-row">
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-btn fa-sign-in"></i>Update
  </button>
</div>

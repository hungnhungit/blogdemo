
@php
	$parent_id = isset($category->parent_id) ? $category->parent_id : null
@endphp

<h3>
    Category {{ !isset($category->id) ? 'Create' : 'Update'}}
</h3>


<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('parent_id', 'Categories') !!}
    <select name="parent_id" id="parent_id" class="form-control">
    	<option value="">Select categories ...</option>
    	{{ subcategories(App\Models\Category::ParentIsNull(),'',$parent_id) }}
    </select>
    
</div>



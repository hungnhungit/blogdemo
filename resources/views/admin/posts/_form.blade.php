@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', 'Author') !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required','placeholder' => 'Please select ...']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('category_id', 'Categories') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''),'placeholder' => 'Please select ...']) !!}

        @if ($errors->has('category_id'))
            <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>
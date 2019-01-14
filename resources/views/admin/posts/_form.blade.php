
@php
    $image = isset($post->image) ? $post->image : null
@endphp

<h3>
    Post {{ !isset($post->id) ? 'Create' : 'Update'}}
</h3>


<div class="form-group">
    {!! Form::label('title', 'Title : ') !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-group">
        {!! Form::label('category_id', 'Categories : ') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''),'placeholder' => 'Please select ...']) !!}

        @if ($errors->has('category_id'))
            <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
        @endif
</div>

<div class="form-group">
    {!! Form::label('images', 'Image : ') !!}
    @if(isset($image))
        <img src="{{ Storage::url('images/'.$image) }}" alt="" width="50" height="50">
    @endif
        <img :src="image" />
    <input type="file" name="images" class="form-control" v-on:change="onImageChange">
</div>


<div class="form-group">
    {!! Form::label('content', 'Content : ') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>

@section('scripts')
    
    <script type="text/javascript">
        
        new Vue({
            el: '#app',
            data : {
                image : ''
            },
            methods: {
                onImageChange(e) {
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage(files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

        })

    </script>

@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.file.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.files.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ext_dates">{{ trans('cruds.file.fields.ext_dates') }}</label>
                <input class="form-control {{ $errors->has('ext_dates') ? 'is-invalid' : '' }}" type="number" name="ext_dates" id="ext_dates" value="{{ old('ext_dates', '') }}" step="1">
                @if($errors->has('ext_dates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ext_dates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.ext_dates_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.file.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="background">{{ trans('cruds.file.fields.background') }}</label>
                <input class="form-control {{ $errors->has('background') ? 'is-invalid' : '' }}" type="text" name="background" id="background" value="{{ old('background', '') }}">
                @if($errors->has('background'))
                    <div class="invalid-feedback">
                        {{ $errors->first('background') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.background_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.file.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_folios">{{ trans('cruds.file.fields.num_folios') }}</label>
                <input class="form-control {{ $errors->has('num_folios') ? 'is-invalid' : '' }}" type="text" name="num_folios" id="num_folios" value="{{ old('num_folios', '') }}">
                @if($errors->has('num_folios'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_folios') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.num_folios_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observations">{{ trans('cruds.file.fields.observations') }}</label>
                <input class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" type="text" name="observations" id="observations" value="{{ old('observations', '') }}">
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="files">{{ trans('cruds.file.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.file.fields.files_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedFilesMap = {}
Dropzone.options.filesDropzone = {
    url: '{{ route('admin.files.storeMedia') }}',
    maxFilesize: 35, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 35
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($file) && $file->files)
          var files =
            {!! json_encode($file->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection
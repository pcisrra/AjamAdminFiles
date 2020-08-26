@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.file.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.id') }}
                        </th>
                        <td>
                            {{ $file->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.ext_dates') }}
                        </th>
                        <td>
                            {{ $file->ext_dates }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.description') }}
                        </th>
                        <td>
                            {{ $file->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.background') }}
                        </th>
                        <td>
                            {{ $file->background }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.quantity') }}
                        </th>
                        <td>
                            {{ $file->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.num_folios') }}
                        </th>
                        <td>
                            {{ $file->num_folios }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.observations') }}
                        </th>
                        <td>
                            {{ $file->observations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.file.fields.files') }}
                        </th>
                        <td>
                            @foreach($file->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.files.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Resources\Admin\FileResource;
use App\Models\File;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('file_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FileResource(File::all());
    }

    public function store(StoreFileRequest $request)
    {
        $file = File::create($request->all());

        if ($request->input('files', false)) {
            $file->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new FileResource($file))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(File $file)
    {
        abort_if(Gate::denies('file_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FileResource($file);
    }

    public function update(UpdateFileRequest $request, File $file)
    {
        $file->update($request->all());

        if ($request->input('files', false)) {
            if (!$file->files || $request->input('files') !== $file->files->file_name) {
                if ($file->files) {
                    $file->files->delete();
                }

                $file->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($file->files) {
            $file->files->delete();
        }

        return (new FileResource($file))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(File $file)
    {
        abort_if(Gate::denies('file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $file->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

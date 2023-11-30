@extends('backend.layout.app')

@section('title',trans('Property Image'))
@section('page',trans('Create'))
@push('styles')
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form method="post" action="{{route('project_file.save',$id)}}" enctype="multipart/form-data" 
                    class="dropzone" id="dropzone">
                        @csrf
                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($project as $p)
<div class="existing-image"data-name="{{$p->image_name}}" data-url="{{ asset('public/uploads/project/properties/'.$p->image_name) }}"></div>
@endforeach

@endsection

@push('scripts')
<script type="text/javascript">
    
    Dropzone.options.dropzone ={
        maxFilesize: 200,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.docx,.doc,.xlsx,.xls,.ppt,.pptx",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) {
            console.log(file)
            if(file.name)
                var name = file.name
            else
                var name = file.upload.filename;
            $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    type: 'GET',
                    url: '{{ route("project_file.delete") }}',
                    data: {image_name: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
    
        success: function(file, response) {
            console.log(response);
        },
        error: function(file, response){
            return false;
        }
        // init: function() {
        //     var dzObj = this;
        //     $('.existing-image').each(function() {
        //         var mockFile = { name: $(this).data('name'), size: '', dataURL: $(this).data('url') };

        //         // Call the default addedfile event handler
        //         dzObj.emit("addedfile", mockFile);

        //         dzObj.createThumbnailFromUrl(mockFile, dzObj.options.thumbnailWidth, dzObj.options.thumbnailHeight, dzObj.options.thumbnailMethod, true, function (dataUrl) {
        //             dzObj.emit("thumbnail", mockFile, dataUrl);
        //         });

        //         // Make sure that there is no progress bar, etc...
        //         dzObj.emit("complete", mockFile);

        //         dzObj.options.maxFiles = dzObj.options.maxFiles - 1;
        //     });
        // }
    };
</script>
@endpush

@extends('admin.layouts.master')

@section('content')

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Summernote</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add new project</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">	
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="#" id="add_new_project">
                        	@csrf
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" required="" placeholder="Type something">
                            </div>

                            <div class="form-group">
                                <label>Website URL:</label>
                                <input type="text" name="website_url" class="form-control" placeholder="Enter project url">
                            </div>

                            <div class="form-group">
                                <label>Image:</label><br /> 
                                <input name="project_file" type="file" onchange="preview_image(event)">
                                <img style="width: 400px;height: 300px;display: none;" id="output_image"/>
                            </div>

                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description" rows="10"></textarea>
                            </div>

                            <div class="form-group m-b-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	 $(document).ready(function(){
        
    });
 	$( "#add_new_project" ).validate({
		rules: {
			title:{
				required: true,
			},
			project_file:{
				required: true,
      			extension: "png|jpg|jpeg"
			},
			description:{
				required: true,	
			},
            website_url:{
                required: true,  
            }
		},
        submitHandler: function(form){
            var form = $('#add_new_project')[0]; 
            var form_data = new FormData(form);
            let ajax_url = base_url + '/project';

            $.ajax({
                type: "POST",
                url: ajax_url,
                data: form_data,
                contentType: false,       
                cache: false,             
                processData:false, 
                success: response => {
                    if (response.status == 'T') {
                    	alert(response.message);location.reload();
                    } else {
                    	alert(response.message);location.reload();
                    }
                },
                error: response => {
                  	debugger ;  
                }
            });
        }
	});
	function preview_image(event) 
	{
	 	var reader = new FileReader();
	 	reader.onload = function() {
	  		var output = document.getElementById('output_image');
	  		output.src = reader.result;
	 	}
	 	$('#output_image').show();
	 	reader.readAsDataURL(event.target.files[0]);
	}
</script>
	

@endsection